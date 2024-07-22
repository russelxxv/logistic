<?php

namespace App\Events;

use App\Models\OrderReturn;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpdateOrderReturn
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public OrderReturn $orderReturn;

    /**
     * Create a new event instance.
     */
    public function __construct(OrderReturn $orderReturn)
    {
        $this->orderReturn = $orderReturn;
    }
}
