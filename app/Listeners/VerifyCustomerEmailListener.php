<?php

namespace App\Listeners;

use App\Events\VerifyCustomerEmail;
use App\Models\Customer;
use App\Notifications\VerifyCustomerEmailNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class VerifyCustomerEmailListener
{
    /**
     * Handle the event.
     */
    public function handle(VerifyCustomerEmail $event): void
    {
        $notification = new VerifyCustomerEmailNotification($event->customer, $event->otp);
        $event->customer->notify($notification);
    }
}
