<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RecipientEmailNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $subject;

    /**
     * Create a new notification instance.
     *
     * @param string $subject
     */
    public function __construct($subject)
    {
        $this->subject = $subject;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Notification: ' . $this->subject)
            ->line('This email is sent to notify the recipient about something.')
            ->line('You can customize the content and behavior of this notification as needed.');
    }
}
