<?php

namespace App\Livewire\Asesi;

use App\Services\TaskListService;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Task;
use App\Models\TaskSubmission;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class TaskList extends Component
{
    use WithFileUploads;

    public string $activeTab = "belum_dikerjakan";
    public int $activeTaskID = 0;
    public $files = []; // Dynamic files list keyed by task_id
    protected $taskListService;
   
    public function boot(TaskListService $taskListService) {
        $this->taskListService = $taskListService;
    }

    public function changeTab($tab) {
        $this->activeTab = $tab;
        $this->resetValidation();
    }

    public function submitTask($taskId)
    {
        $task = Task::findOrFail($taskId);
        $user = Auth::user();

        // Validasi ketersediaan dan deadline
        if (!$task->isActive()) {
            session()->flash('error', 'Tugas ini sudah tidak aktif atau melewati tenggat waktu.');
            return;
        }

        // Cek jumlah submission
        $existingSubmission = TaskSubmission::where('task_id', $task->id)
            ->where('user_id', $user->id)
            ->first();

        $submissionCount = $existingSubmission ? $existingSubmission->submission_count : 0;

        if ($submissionCount >= $task->max_submissions) {
            session()->flash('error', 'Anda telah mencapai batas maksimal pengumpulan jawaban untuk tugas ini.');
            return;
        }

        // Validasi berkas
        $this->validate([
            'files.' . $taskId => 'required|file|mimes:pdf,doc,docx|max:10240', // Max 10MB
        ], [
            'files.' . $taskId . '.required' => 'Harap pilih berkas terlebih dahulu.',
            'files.' . $taskId . '.file' => 'Berkas tidak valid.',
            'files.' . $taskId . '.mimes' => 'Format berkas harus PDF atau Word (.doc, .docx).',
            'files.' . $taskId . '.max' => 'Ukuran berkas maksimal 10MB.',
        ]);

        $file = $this->files[$taskId];
        $filename = 'task_' . $task->id . '_user_' . $user->id . '_' . time() . '.' . $file->getClientOriginalExtension();

        // Simpan berkas di local private (non-public)
        $path = $file->storeAs('task_submissions', $filename, 'local');

        if ($existingSubmission) {
            // Hapus file lama jika ada
            if (Storage::disk('local')->exists($existingSubmission->file_path)) {
                Storage::disk('local')->delete($existingSubmission->file_path);
            }

            $existingSubmission->update([
                'file_path' => $path,
                'submission_count' => $submissionCount + 1,
                'submitted_at' => now(),
                'is_confirmed' => false, // Reset konfirmasi saat asesi update jawaban
            ]);
        } else {
            TaskSubmission::create([
                'task_id' => $task->id,
                'user_id' => $user->id,
                'file_path' => $path,
                'status' => 'submitted',
                'is_confirmed' => false,
                'submission_count' => 1,
                'submitted_at' => now(),
            ]);
        }

        // Hapus status berkas yang dipilih setelah sukses
        unset($this->files[$taskId]);

        session()->flash('success', 'Jawaban berhasil dikirim.');
    }

    public function download($submissionId)
    {
        $submission = TaskSubmission::where('user_id', Auth::id())->findOrFail($submissionId);

        if (Storage::disk('local')->exists($submission->file_path)) {
            return Storage::disk('local')->download($submission->file_path);
        }

        session()->flash('error', 'Berkas tidak ditemukan.');
    }

    public function render()
    {
        $batch = $this->taskListService->getUserBatch();
        $notDoneTask = $this->taskListService->getNotDoneTask();
        $doneTasks = $this->taskListService->getSubmissions('sudah_dikerjakan');
        $sentTasks = $this->taskListService->getSubmissions('sudah_dikirim');
        $completionStats = $this->taskListService->getCompletionStats();

        return view('livewire.asesi.task-list', compact('batch', 'notDoneTask', 'doneTasks', 'sentTasks', 'completionStats'));
    }
}
