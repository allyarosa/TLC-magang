<?php

namespace App\Http\Controllers\Asesor;

use App\Events\GradingCompleted;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Models\LevelCSubmission;
use Illuminate\Support\Facades\Log;
use Vinkla\Hashids\Facades\Hashids;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreAssessmentRequest; // Re-using for Level C, adjust if needed
use App\Models\LevelCHistory; // Placeholder for Level C history

class LevelCGradedController extends Controller
{
    public function showGradingPage(string $id)
    {
        $decoded = Hashids::decode($id);

        if (empty($decoded)) {
            Log::channel('grading')->warning('Gagal decode ID Hashids pada halaman grading Level C.', [
                'encoded_id' => $id,
                'reason' => 'ID tidak valid atau tidak dapat didecode',
                'ip_address' => request()->ip(),
                'user_id' => auth()->id(),
                'timestamp' => now()->toDateTimeString(),
            ]);
            abort(404, 'ID Tidak Valid');
        }

        $id = $decoded[0];
        // Assuming ExamAsesi stores Level C submissions and has a relationship to User
        $asesiSubmission = LevelCSubmission::with('user')->find($id);

        if (!$asesiSubmission) {
            abort(404, 'Pengajuan Level C tidak ditemukan.');
        }

        $userProfile = UserProfile::where('user_id', $asesiSubmission->user_id)->first();

        // You need to determine if it's an essay or video submission.
        // This logic depends on how you store Level C submissions.
        // For example, if ExamAsesi has a 'type' column or specific fields.
        if ($asesiSubmission->type === 'essay') { // Example: if there's a 'type' column
            return view('dashboard.asesor.Grading.essay', [
                'asesiSubmission' => $asesiSubmission,
                'userProfile' => $userProfile,
            ]);
        } elseif ($asesiSubmission->type === 'video') { // Example: if there's a 'type' column
            return view('dashboard.asesor.Grading.video', [
                'asesiSubmission' => $asesiSubmission,
                'userProfile' => $userProfile,
            ]);
        } else {
            // Fallback or error if type is not recognized
            abort(404, 'Tipe pengajuan Level C tidak dikenal.');
        }
    }

    public function storeAssessmentAsesi(StoreAssessmentRequest $request, string $id)
    {
        $decoded = Hashids::decode($id);

        if (empty($decoded)) {
            Log::channel('grading')->warning('Gagal decode ID Hashids saat menyimpan penilaian Level C.', [
                'encoded_id' => $id,
                'reason' => 'ID tidak valid atau tidak dapat didecode',
                'ip_address' => request()->ip(),
                'user_id' => auth()->id(),
                'timestamp' => now()->toDateTimeString(),
            ]);
            abort(404, 'ID Tidak Valid');
        }
        $id = $decoded[0];

        $asesiSubmission = LevelCSubmission::find($id); // Assuming ExamAsesi stores Level C submissions

        if (!$asesiSubmission) {
            abort(404, 'Pengajuan Level C tidak ditemukan.');
        }

        $user = User::where('id', $asesiSubmission->user_id)->first();

        $asesiSubmission->update([
            'score' => $request->score,
            'status' => $request->status, // e.g., 'graded', 'pending_review'
            'is_passed' => $request->assessment, // 'passed' or 'rejected'
            'comment_asesor' => $request->comment_asesor,
        ]);

        $category = null;
        if ($asesiSubmission->type === 'essay') { // Example: if there's a 'type' column
            $category = 'Essay';
        } elseif ($asesiSubmission->type === 'video') { // Example: if there's a 'type' column
            $category = 'Video';
        }

        // Create Level C History (adjust fields as per your LevelCHistory model)
        // You might need to create a LevelCHistory model and migration if it doesn't exist.
        // LevelCHistory::create([
        //     'user_id' => $asesiSubmission->user_id,
        //     'category' => $category,
        //     'submission_id' => $asesiSubmission->id, // Link to the submission
        //     'score' => $request->score,
        //     'comment_asesor' => $request->comment_asesor,
        //     'is_passed' => $request->assessment,
        // ]);

        if ($request->assessment === 'passed') {
            if ($asesiSubmission->type === 'essay') {
                $user->givePermissionTo('ESSAY_COMPLETED');
                // Add other permissions if needed, e.g., 'ESSAY_GRADED'
            } elseif ($asesiSubmission->type === 'video') {
                $user->givePermissionTo('VIDEO_COMPLETED');
                // Add other permissions if needed, e.g., 'VIDEO_GRADED'
            }
        } elseif ($request->assessment === 'rejected') {
            if ($asesiSubmission->type === 'essay') {
                $user->revokePermissionTo('ESSAY_COMPLETED');
                $asesiSubmission->update(['status' => 'rejected', 'is_passed' => 'rejected',]);
            } elseif ($asesiSubmission->type === 'video') {
                $user->revokePermissionTo('VIDEO_COMPLETED');
                $asesiSubmission->update(['status' => 'rejected', 'is_passed' => 'rejected',]);
            }
        }

        event(new GradingCompleted($user));
        Alert::success('Berhasil mengubah status penilaian Level C.');
        return redirect()->route('asesor.gradeC.index');
    }
}
