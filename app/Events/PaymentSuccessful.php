<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Spatie\Permission\Models\Role;

class PaymentSuccessful implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public $payment;

    /**
     * Create a new event instance.
     *
     * @param  $payment
     * @return void
     */
    public function __construct($payment)
    {
        $this->payment = $payment->load('user');
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('payment.' . $this->payment->user_id),  // Broadcasting on a private channel for the specific user
        ];
    }

    /**
     * Optionally, you can add logic to modify user permissions based on the payment.
     */
    // public function handlePermission()
    // {
    //     // Assuming the payment is successful, you can modify the user's permissions here

    //     $user = $this->payment->user;

    //     if ($user) {
    //         $user->givePermissionTo('access_level_A');
    //     }
    // }
}
