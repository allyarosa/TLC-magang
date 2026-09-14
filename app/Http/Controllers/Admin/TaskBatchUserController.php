<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TaskBatch;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class TaskBatchUserController extends Controller
{
    public function manageUsers(TaskBatch $taskBatch)
    {
        $currentUsers = $taskBatch->users()->wherePivot('assignment_type', 'manual')->get();

        $availableUsers = User::role('asesi')
            ->whereDoesntHave('assignedBatches', function ($query) {
                $query->where('assignment_type', 'manual');
            })
            ->whereKeyNot($currentUsers->pluck('id'))
            ->get();

        return view('admin.task-batches.manage-users', compact('taskBatch', 'currentUsers', 'availableUsers'));
    }

    public function assignUsers(Request $request, TaskBatch $taskBatch)
    {
        $request->validate([
            'user_ids' => 'required|array|min:1',
            'user_ids.*' => 'integer|exists:users,id',
        ]);

        $userIds = array_unique($request->input('user_ids'));
        $assigned = 0;
        $skipped = [];

        foreach ($userIds as $userId) {
            $alreadyInBatch = DB::table('batch_user')
                ->where('user_id', $userId)
                ->where('task_batch_id', $taskBatch->id)
                ->exists();

            $manualInOtherBatch = DB::table('batch_user')
                ->where('user_id', $userId)
                ->where('task_batch_id', '!=', $taskBatch->id)
                ->where('assignment_type', 'manual')
                ->exists();

            if ($alreadyInBatch || $manualInOtherBatch) {
                $user = User::find($userId);
                $skipped[] = $user ? $user->name : "#$userId";

                continue;
            }

            $taskBatch->users()->attach($userId, [
                'assignment_type' => 'manual',
                'assigned_at' => now(),
            ]);
            $assigned++;
        }

        if ($assigned > 0) {
            Alert::toast("$assigned asesi berhasil ditambahkan ke batch", 'success')->autoClose(2500);
        }
        if (count($skipped) > 0) {
            Alert::warning('Beberapa asesi dilewati', 'Sudah berada di batch ini atau batch lain: '.implode(', ', $skipped))->autoClose(5000);
        }

        return redirect()->route('admin.task-batches.manage-users', $taskBatch->id);
    }

    public function removeUser(TaskBatch $taskBatch, User $user)
    {
        $taskBatch->users()->detach($user->id);

        Alert::toast('Asesi berhasil dihapus dari batch', 'success')->autoClose(2500);

        return redirect()->route('admin.task-batches.manage-users', $taskBatch->id);
    }
}
