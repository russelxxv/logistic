<?php

namespace App\Notifications;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Config;

class VerifyCustomerEmailNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private Customer $customer;
    private string $otp;
    private int $expirationTimeMinutes;

    /**
     * Create a new notification instance.
     */
    public function __construct(Customer $customer, string $otp)
    {
        $this->otp = $otp;
        $this->customer = $customer;
        $this->expirationTimeMinutes = Config::get('auth.verification.expiration.email', 60);
    }

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
        $customerName = $this->customer->full_name;

        return (new MailMessage)
            ->subject('Verify your email Account')
            ->greeting("HI! {$customerName}")
            ->line('This is Bravo Zulu,')
            ->line('Your OTP for email verification is '. $this->otp)
            ->line(
                "Please note that this OTP will expire in $this->expirationTimeMinutes minutes."
            )
            ->line('Thank you for using our application!');
    }

    /** {@inheritDoc} */
    protected function getExpirationTime(): Carbon
    {
        return Carbon::now()->addMinutes($this->expirationTimeMinutes);
    }
}
