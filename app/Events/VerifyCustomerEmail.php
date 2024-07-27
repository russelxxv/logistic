<?php

namespace App\Events;

use App\Models\Customer;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class VerifyCustomerEmail
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Customer $customer;
    public string $otp;

    /**
     * Create a new event instance.
     */
    public function __construct(Customer $customer, string $otp)
    {
        $this->customer = $customer;
        $this->otp = $otp;
    }
}
