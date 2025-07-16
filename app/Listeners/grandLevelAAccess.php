<?php

namespace App\Listeners;

use App\Events\PaymentSuccessful;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class grandLevelAAccess
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PaymentSuccessful $event): void
    {
        $user = $event->payment->user;
        $user->givePermissionTo('access_level_A');
        $user->revokePermissionTo('fresh_user');

         Log::info("Level A access granted to user: {$user->id} ({$user->email})");
    }
}
