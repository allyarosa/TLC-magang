<?php

namespace App\Services;

use App\Models\TaskBatch;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\TaskSubmission;
use Illuminate\Support\Facades\Storage;


class TaskListService
{
    public function getUserBatch()
    {
        $user = Auth::user();
        return TaskBatch::activeForDate($user->created_at)->first();
    }

    public function getNotDoneTask() {
        $user = Auth::user();

        $batch = $this->getUserBatch();
        if(!$batch) {
            return collect();
        }
        $batchID = $batch->id;
        $category = [];
        $categoryList = ['PCK', 'HOTS', 'LITERASI_NUMERASI' ];
        $submittedTaskIDs = $this->submittedTask($user);

        if($user->hasPermissionTo('access_level_A')) {
            $category = $categoryList;
        } else {
            $category = $user->getPermissionNames()
                        ->intersect($categoryList)
                        ->toArray();
                        
            if($user->hasAnyPermission(['LITERASI', 'NUMERASI'])) {
                $category[] = 'LITERASI_NUMERASI';
            }
        }

        $task = Task::where('batch_id', $batchID)
                    ->whereIn('category', $category)
                    ->whereNotIn('id', $submittedTaskIDs)
                    ->where('starts_at', '<=', now())
                    ->where('ends_at', '>=', now())
                    ->get();

        return $task;
    }

    private function submittedTask(User $user) {
        return TaskSubmission::where('user_id', $user->id)
                        ->pluck('task_id');
    }

    public function getSubmissions($type) {
        $user = Auth::user();
        $batch = $this->getUserBatch();
        if(!$batch) {
            return collect();
        }
        $batchID = $batch->id;

        $submissions = TaskSubmission::where('user_id', $user->id)
            ->whereHas('task', function($query) use ($batchID) {
                $query->where('batch_id', $batchID);
            })
            ->with('task')
            ->get();

        if ($type === 'sudah_dikerjakan') {
            // Hanya task yang sudah dikonfirmasi oleh admin
            return $submissions->filter(function($submission) {
                return $submission->is_confirmed === true;
            });
        } elseif ($type === 'sudah_dikirim') {
            // Semua submission yang belum dikonfirmasi admin
            return $submissions->filter(function($submission) {
                return !$submission->is_confirmed;
            });
        }

        return collect();
    }

    public function getCompletionStats()
    {
        $user = Auth::user();
        if (!$user) {
            return [
                'hasAccess' => false,
                'completedCount' => 0,
                'maxCount' => 0,
                'percentage' => 0,
            ];
        }

        $permissions = config('AccessPermission.permissions') ?? [];
        $hasAccess = false;
        try {
            $hasAccess = $user->hasAnyPermission($permissions);
        } catch (\Exception $e) {
            $hasAccess = false;
        }

        $maxCount = 0;
        if ($hasAccess) {
            if ($this->checkPermission($user, 'access_level_A')) {
                $maxCount = 12;
            } else {
                if ($this->checkPermission($user, 'HOTS')) {
                    $maxCount += 4;
                }
                if ($this->checkPermission($user, 'LITERASI')) {
                    $maxCount += 4;
                }
                if ($this->checkPermission($user, 'NUMERASI')) {
                    $maxCount += 4;
                }
                if ($this->checkPermission($user, 'PCK')) {
                    $maxCount += 4;
                }
            }
        }

        $completedCount = TaskSubmission::where('user_id', $user->id)
            ->where('is_confirmed', true)
            ->count();

        $percentage = $maxCount > 0 ? round(($completedCount / $maxCount) * 100) : 0;

        return [
            'hasAccess' => $hasAccess,
            'completedCount' => $completedCount,
            'maxCount' => $maxCount,
            'percentage' => $percentage,
        ];
    }

    private function checkPermission(User $user, $permissionName)
    {
        try {
            return $user->hasPermissionTo($permissionName);
        } catch (\Exception $e) {
            return false;
        }
    }
}