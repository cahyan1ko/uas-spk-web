<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $token = $this->token;
        $resetUrl = url("/reset-password/$token");

        return (new MailMessage)
                    ->line('You are receiving this email because we received a password reset request for your account.')
                    ->action('Reset Password', $resetUrl)
                    ->line('If you did not request a password reset, no further action is required.');
    }

    public function toArray($notifiable)
    {
        return [];
    }
}