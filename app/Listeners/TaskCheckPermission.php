<?php

namespace App\Listeners;

use App\Events\CheckAsesiTask;
use App\Models\TaskSubmission;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\TaskAsesiDone;

class TaskCheckPermission
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
    public function handle(CheckAsesiTask $event): void
    {
        $user = $event->user;

        // cek user apakah category(hots,pck,litnum) dikerjakan 4x sesuai modul, jika iya berikan akses permission
        $tasks = TaskSubmission::with('task')->where('user_id', $user->id)->where('is_confirmed', true)->whereHas('task')->get();

        $groupedTasks = $tasks->groupBy(fn($item) => $item->task->category);

        $taskHOTS = $groupedTasks->get('HOTS', collect())->count();
        $taskPCK = $groupedTasks->get('PCK', collect())->count();
        $taskLITNUM = $groupedTasks->get('LITERASI_NUMERASI', collect())->count();

        if ($taskHOTS === 4) {
            $user->givePermissionTo('DONE_HOTS_TASK');
            $user->notify(new TaskAsesiDone(
                'Selamat anda telah menyelesaikan Penugasan Category HOTS'
            ));
        }
        if ($taskPCK === 4) {
            $user->givePermissionTo('DONE_PCK_TASK');
               $user->notify(new TaskAsesiDone(
                'Selamat anda telah menyelesaikan Penugasan Category PCK'
            ));
        }
        if ($taskLITNUM === 4) {
            $user->givePermissionTo('DONE_NUMERASI_TASK');
            $user->givePermissionTo('DONE_LITERASI_TASK');
            $user->notify(new TaskAsesiDone(
                'Selamat anda telah menyelesaikan Penugasan Category LITERASI_NUMERASI'
            ));
        }
    }
}
