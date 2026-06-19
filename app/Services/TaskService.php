<?php

namespace App\Services;

use App\Models\Task;
use App\Models\TaskBatch;
use App\Models\TaskSubmission;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class TaskService
{
    /**
     * Get paginated tasks with filters.
     */
    public function getPaginatedTasks(array $filters = [], int $perPage = 10)
    {
        $query = Task::with('batch')->latest();

        if (!empty($filters['batch_id'])) {
            $query->where('batch_id', $filters['batch_id']);
        }

        if (!empty($filters['category'])) {
            $query->where('category', $filters['category']);
        }

        return $query->paginate($perPage);
    }

    /**
     * Get all task batches ordered by name.
     */
    public function getAllBatches()
    {
        return TaskBatch::orderBy('name')->get();
    }

    /**
     * Store a new task.
     */
    public function storeTask(array $data)
    {
        DB::beginTransaction();
        try {
            $data['created_by'] = Auth::id();

            if (isset($data['image']) && $data['image'] instanceof \Illuminate\Http\UploadedFile) {
                $data['image_path'] = $data['image']->store('tasks', 'public');
            }

            // Remove the uploaded file object before saving to database
            unset($data['image']);

            $task = Task::create($data);

            DB::commit();
            return $task;
        } catch (Throwable $e) {
            DB::rollBack();
            if (isset($data['image_path'])) {
                Storage::disk('public')->delete($data['image_path']);
            }
            Log::error('TaskService@storeTask Error: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Update an existing task.
     */
    public function updateTask(Task $task, array $data)
    {
        DB::beginTransaction();
        $oldImagePath = $task->image_path;
        $newImageStored = false;
        try {
            if (isset($data['image']) && $data['image'] instanceof \Illuminate\Http\UploadedFile) {
                $data['image_path'] = $data['image']->store('tasks', 'public');
                $newImageStored = true;
            }

            unset($data['image']);

            $task->update($data);

            if ($newImageStored && $oldImagePath) {
                Storage::disk('public')->delete($oldImagePath);
            }

            DB::commit();
            return $task;
        } catch (Throwable $e) {
            DB::rollBack();
            if ($newImageStored && isset($data['image_path'])) {
                Storage::disk('public')->delete($data['image_path']);
            }
            Log::error('TaskService@updateTask Error: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Delete a task and its image.
     */
    public function deleteTask(Task $task)
    {
        DB::beginTransaction();
        try {
            $imagePath = $task->image_path;

            $task->delete();

            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }

            DB::commit();
            return true;
        } catch (Throwable $e) {
            DB::rollBack();
            Log::error('TaskService@deleteTask Error: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Get submissions for a specific task.
     */
    public function getTaskSubmissions(Task $task, int $perPage = 20)
    {
        $task->load('batch');
        return $task->submissions()
            ->with('user.userProfile')
            ->latest('submitted_at')
            ->paginate($perPage);
    }

    /**
     * Get the submission or fail, and check if file exists.
     */
    public function getSubmissionFileForDownload(int $submissionId)
    {
        try {
            $submission = TaskSubmission::findOrFail($submissionId);
            
            $filePath = 'private/' . $submission->file_path;
            if (!Storage::disk('local')->exists($filePath)) {
                throw new \Exception('File tidak ditemukan.');
            }

            return $submission;
        } catch (Throwable $e) {
            Log::error('TaskService@getSubmissionFileForDownload Error: ' . $e->getMessage());
            throw $e;
        }
    }
}
