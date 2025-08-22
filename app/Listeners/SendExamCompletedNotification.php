<?php

namespace App\Listeners;

use App\Events\ExamCompleted;
use App\Notifications\ExamCompletedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendExamCompletedNotification
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
    public function handle(ExamCompleted $event): void
    {
        $user = $event->user;
        $category = $event->category;
        $level = '';

        switch (get_class($category)) {
            case 'App\Models\CategoryA':
                $level = 'A';
                break;
            case 'App\Models\CategoryB':
                $level = 'B';
                break;
            case 'App\Models\CategoryC':
                $level = 'C';
                break;
        }

        if ($level) {
            Notification::send($user, new ExamCompletedNotification($level));
        }
    }
}
