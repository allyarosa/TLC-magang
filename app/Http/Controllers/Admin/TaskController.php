<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;
use Throwable;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index(Request $request)
    {
        $filters = $request->only(['batch_id', 'category']);
        $tasks = $this->taskService->getPaginatedTasks($filters);
        $batches = $this->taskService->getAllBatches();

        return view('admin.tasks.index', compact('tasks', 'batches'));
    }

    public function create()
    {
        $batches = $this->taskService->getAllBatches();
        return view('admin.tasks.create', compact('batches'));
    }

    public function store(TaskRequest $request)
    {
        try {
            $this->taskService->storeTask($request->all());

            Alert::toast('Tugas berhasil ditambahkan!', 'success')->autoClose(2500);
            return redirect()->route('admin.tasks.index');
        } catch (Throwable $e) {
            Log::error('Gagal menyimpan tugas di TaskController@store: ' . $e->getMessage());
            Alert::toast('Terjadi kesalahan saat menambahkan tugas.', 'error')->autoClose(2500);
            return back()->withInput();
        }
    }

    public function edit(Task $task)
    {
        $batches = $this->taskService->getAllBatches();
        return view('admin.tasks.edit', compact('task', 'batches'));
    }

    public function update(TaskRequest $request, Task $task)
    {
        try {
            $this->taskService->updateTask($task, $request->all());

            Alert::toast('Tugas berhasil diperbarui', 'success')->autoClose(2500);
            return redirect()->route('admin.tasks.index');
        } catch (Throwable $e) {
            Log::error('Gagal memperbarui tugas di TaskController@update: ' . $e->getMessage());
            Alert::toast('Terjadi kesalahan saat memperbarui tugas.', 'error')->autoClose(2500);
            return back()->withInput();
        }
    }

    public function destroy(Task $task)
    {
        try {
            $this->taskService->deleteTask($task);

            Alert::toast('Tugas berhasil dihapus!', 'success')->autoClose(2500);
        } catch (Throwable $e) {
            Log::error('Gagal menghapus tugas di TaskController@destroy: ' . $e->getMessage());
            Alert::toast('Terjadi kesalahan saat menghapus tugas.', 'error')->autoClose(2500);
        }
        return redirect()->route('admin.tasks.index');
    }

    public function submissions(Task $task)
    {
        $submissions = $this->taskService->getTaskSubmissions($task);
        return view('admin.tasks.submissions', compact('task', 'submissions'));
    }

    public function downloadSubmission($submissionId)
    {
        try {
            $submission = $this->taskService->getSubmissionFileForDownload($submissionId);
            return Storage::disk('local')->download($submission->file_path);
        } catch (Throwable $e) {
            Log::error('Gagal mengunduh file jawaban di TaskController@downloadSubmission: ' . $e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }

    public function toggleConfirmSubmission($submissionId)
    {
        try {
            $submission = $this->taskService->toggleConfirmSubmission($submissionId);
            
            Alert::toast($submission->is_confirmed ? 'Jawaban berhasil dikonfirmasi!' : 'Konfirmasi jawaban dibatalkan!', 'success')->autoClose(2500);
        } catch (Throwable $e) {
            Log::error('Gagal mengubah status konfirmasi di TaskController@toggleConfirmSubmission: ' . $e->getMessage());
            Alert::toast('Terjadi kesalahan saat memperbarui status konfirmasi.', 'error')->autoClose(2500);
        }
        return back();
    }
}
