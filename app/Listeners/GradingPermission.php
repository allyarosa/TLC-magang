<?php

namespace App\Listeners;

use App\Events\GradingCompleted;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class GradingPermission
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
    public function handle(GradingCompleted $event): void
    {
        $user = $event->user;
        if ($user->hasAllPermissions(['MODUL_AJAR_COMPLETED', 'PPT_COMPLETED'])) {
            $user->givePermissionTo('level_B_completed');
            \Log::channel('grading')->info("Permission 'level_B_completed' diberikan ke user ID {$user->id}");
        }
    }
}
