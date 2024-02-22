<?php

namespace App\Service;

use Illuminate\Support\Facades\Mail;
use App\Mail\DynamicEmail;

class EmailService implements EmailServiceInterface
{
    protected $emailCreateService;

    public function __construct(EmailCreateService $emailCreateService)
    {
        $this->emailCreateService = $emailCreateService;
    }
    public function sendEmail($title, $templateKey, $to, $subject, $content)
    {
        // If $to contains a single email address, send the email directly to that address
        if (is_string($to)) {
            Mail::to($to)->send(new DynamicEmail($subject, $content));
        } else {
            // If $to contains multiple recipient email addresses, send the email to each recipient
            foreach ($to as $recipientEmail) {
                Mail::to($recipientEmail)->send(new DynamicEmail($subject, $content));
            }
        }

    }
    public function createEmail(array $data)
    {
        return $this->emailCreateService->createEmail($data);
    }

}
