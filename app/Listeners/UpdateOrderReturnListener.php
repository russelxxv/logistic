<?php

namespace App\Listeners;

use App\Events\UpdateOrderReturn;
use App\Notifications\UpdateOrderReturnNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateOrderReturnListener
{
    /**
     * Handle the event.
     */
    public function handle(UpdateOrderReturn $event): void
    {
        $notification = new UpdateOrderReturnNotification();
        $event->orderReturn->notify($notification);
    }
}
