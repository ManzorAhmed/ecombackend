<?php

namespace App\Service;

use App\Models\Email;
use App\Models\Recipient;
use Illuminate\Support\Facades\DB;
use Html2Text\Html2Text;

class EmailCreateService
{

    public function createEmail(array $data): ?Email
    {
        // Check if all required fields are present
        if (!isset($data['title'], $data['template_key'], $data['subject'], $data['email_content'], $data['recipient_emails'])) {
            // Log or handle the error accordingly
            return null;
        }

        // Start a database transaction
        DB::beginTransaction();

        try {
            // Create the Email instance
            $emailTemplate = new Email();
            $emailTemplate->title = $data['title'];
            $emailTemplate->template_key = $data['template_key'];
            $emailTemplate->subject = $data['subject'];

            // Convert HTML to plain text and replace &nbsp; with spaces
            $plainTextContent = str_replace('&nbsp;', ' ', strip_tags($data['email_content']));

            // Store the modified plain text content
            $emailTemplate->email_content = $plainTextContent;

            $emailTemplate->active = isset($data['active']) ? 1 : 0;
            $emailTemplate->save();

            // Store the recipient emails
            $recipientEmails = explode(',', $data['recipient_emails']);
            foreach ($recipientEmails as $recipientEmail) {
                $recipient = new Recipient();
                $recipient->email = trim($recipientEmail);
                $emailTemplate->recipients()->save($recipient);
            }

            // Commit the transaction
            DB::commit();

            return $emailTemplate;
        } catch (\Exception $e) {
            // Rollback the transaction in case of an exception
            DB::rollback();
            // Log or handle the error accordingly
            return null;
        }
    }



}
