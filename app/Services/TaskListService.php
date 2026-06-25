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
        $categoryList = ['PCK', 'HOTS', 'LITERASI', 'NUMERASI', ];
        $submittedTaskIDs = $this->submittedTask($user);

        if($user->hasPermissionTo('access_level_A')) {
            $category = $categoryList;
        } else {
            $category = $user->getPermissionNames()
                        ->intersect($categoryList)
                        ->toArray();
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
            return $submissions->filter(function($submission) {
                $task = $submission->task;
                if (!$task) return false;
                return !$submission->is_confirmed 
                    && $submission->submission_count < $task->max_submissions
                    && $task->ends_at >= now();
            });
        } elseif ($type === 'sudah_dikirim') {
            return $submissions->filter(function($submission) {
                $task = $submission->task;
                if (!$task) return false;
                return $submission->is_confirmed 
                    || $submission->submission_count >= $task->max_submissions
                    || $task->ends_at < now();
            });
        }

        return collect();
    }
}

