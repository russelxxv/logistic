<?php

namespace App\Listeners;

use App\Events\CreatedOrderReturn;
use App\Notifications\CreatedOrderReturnNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreatedOrderReturnListener
{
    /**
     * Handle the event.
     */
    public function handle(CreatedOrderReturn $event): void
    {
        $notification = new CreatedOrderReturnNotification();
        $event->orderReturn->notify($notification);
    }
}
