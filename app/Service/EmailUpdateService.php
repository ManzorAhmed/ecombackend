<?php

namespace App\Service;

use App\Models\Email;
use App\Models\Recipient;
use Illuminate\Support\Facades\DB;

class EmailUpdateService
{
    public function updateEmail(Email $emailTemplate, array $data): bool
    {
       if(!isset($data['title'],$data['subject'], $data['template_key'], $data['subject'], $data['email_content'], $data['recipient_emails']))
       {
           return false;
       }

        // Start a database transaction
        DB::beginTransaction();

        try {
            // Update the Email instance
            $emailTemplate->title = $data['title'];
            $emailTemplate->template_key = $data['template_key'];
            $emailTemplate->subject = $data['subject'];
            $emailTemplate->email_content = $data['email_content'];
            $emailTemplate->active = isset($data['active']) ? 1 : 0;
            $emailTemplate->save();

//            // Clear existing recipients
            $emailTemplate->recipients()->detach();

            // Store the recipient emails
            $recipientEmails = explode(',', $data['recipient_emails']);
            foreach ($recipientEmails as $recipientEmail) {
                $recipient = new Recipient();
                $recipient->email = trim($recipientEmail);
                $emailTemplate->recipients()->save($recipient);
            }

            // Commit the transaction
            DB::commit();

            return true;
        } catch (\Exception $e) {
            // Rollback the transaction in case of an exception
            DB::rollback();
            // Log or handle the error accordingly
            return false;
        }
    }
}
