<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UpdateOrderReturnNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $appName = config('app.name');
        $customerName = $notifiable->customer->full_name;

        return (new MailMessage)
                    ->subject("Bravo Zulu - {$notifiable->status} - Return of Order")
                    ->greeting('HI! '.$customerName)
                    ->line('We have received your Order Return.')
                    // ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }
}
