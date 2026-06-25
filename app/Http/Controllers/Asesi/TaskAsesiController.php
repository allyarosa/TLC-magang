<?php

namespace App\Http\Controllers\Asesi;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\Task;
use App\Models\TaskBatch;
use App\Models\TaskSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TaskAsesiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $levels = Level::all();
        $userAccess = null;
        $permissions = [
            'access_level_A',
            'HOTS',
            'PCK',
            'LITERASI',
            'NUMERASI'
        ];

        if($user->hasAnyPermission($permissions)) {
            $userAccess = true;
        } else {
            $userAccess = false;
        }

        // Cari batch berdasarkan tanggal daftar user
        $batch = TaskBatch::where('start_date', '<=', $user->created_at)
            ->where('end_date', '>=', $user->created_at)
            ->first();

        $tasks = collect();

        if ($batch) {
            $baseQuery = Task::where('batch_id', $batch->id)
                ->where('starts_at', '<=', now())
                ->where('ends_at', '>=', now());

            // Pengecekan permission dengan method bantu untuk menghindari exception jika permission belum ada
            $hasLevelA = $this->checkUserPermission($user, 'access_level_A');
            $hasHots = $this->checkUserPermission($user, 'HOTS');
            $hasPck = $this->checkUserPermission($user, 'PCK');
            $hasLiterasi = $this->checkUserPermission($user, 'LITERASI_NUMERASI') || $this->checkUserPermission($user, 'LITERASI DAN NUMERASI');

            if ($hasLevelA || $user->hasRole('admin')) {
                // Jika punya access_level_A, dapatkan 12 soal (gabungan)
                $tasks = (clone $baseQuery)->limit(12)->get();
            } else {
                $allowedTasks = collect();

                if ($hasHots) {
                    $allowedTasks = $allowedTasks->merge((clone $baseQuery)->where('category', 'HOTS')->limit(4)->get());
                }

                if ($hasPck) {
                    $allowedTasks = $allowedTasks->merge((clone $baseQuery)->where('category', 'PCK')->limit(4)->get());
                }

                if ($hasLiterasi) {
                    $allowedTasks = $allowedTasks->merge((clone $baseQuery)->where('category', 'LITERASI_NUMERASI')->limit(4)->get());
                }

                $tasks = $allowedTasks;
            }
        }

        // Ambil submission user untuk tugas-tugas ini
        $submissions = TaskSubmission::where('user_id', $user->id)
            ->whereIn('task_id', $tasks->pluck('id'))
            ->get()
            ->keyBy('task_id');

        return view('asesi.tugas.index', compact('tasks', 'batch', 'submissions', 'userAccess', 'levels'));
    }

    public function submit(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $user = Auth::user();

        // Validasi ketersediaan dan deadline
        if (!$task->isActive()) {
            return back()->with('error', 'Tugas ini sudah tidak aktif atau melewati tenggat waktu.');
        }

        // Cek jumlah submission
        $existingSubmission = TaskSubmission::where('task_id', $task->id)
            ->where('user_id', $user->id)
            ->first();

        $submissionCount = $existingSubmission ? $existingSubmission->submission_count : 0;

        if ($submissionCount >= $task->max_submissions) {
            return back()->with('error', 'Anda telah mencapai batas maksimal pengumpulan jawaban untuk tugas ini.');
        }

        $request->validate([
            'file_jawaban' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png|max:8192', // Max 8MB
        ]);

        $file = $request->file('file_jawaban');
        $filename = 'task_' . $task->id . '_user_' . $user->id . '_' . time() . '.' . $file->getClientOriginalExtension();

        // Simpan file di local private (non-public)
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
            ]);
        } else {
            TaskSubmission::create([
                'task_id' => $task->id,
                'user_id' => $user->id,
                'file_path' => $path,
                'submission_count' => 1,
                'submitted_at' => now(),
            ]);
        }

        return back()->with('success', 'Jawaban berhasil dikirim.');
    }

    /**
     * Memeriksa permission dengan try-catch untuk menghindari error PermissionDoesNotExist
     */
    private function checkUserPermission($user, $permissionName)
    {
        try {
            return $user->hasPermissionTo($permissionName);
        } catch (\Exception $e) {
            return false;
        }
    }
}
