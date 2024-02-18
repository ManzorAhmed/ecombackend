<?php

namespace App\Service;

interface EmailServiceInterface
{
    public function sendEmail($title, $templateKey, $to, $subject, $content);
}
