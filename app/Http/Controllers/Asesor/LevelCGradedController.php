<?php

namespace App\Http\Controllers\Asesor;

use App\Events\GradingCompleted;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Models\LevelCSubmission;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Vinkla\Hashids\Facades\Hashids;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreAssessmentRequest;
use App\Models\LevelCHistory;
use App\Models\UserAnswerC;

class LevelCGradedController extends Controller
{
    public function showGradingPage(string $id)
    {
        $decoded = Hashids::decode($id);

        if (empty($decoded)) {
            Log::channel('grading')->warning('Gagal decode ID Hashids pada halaman grading.', [
                'encoded_id' => $id,
                'reason' => 'ID tidak valid atau tidak dapat didecode',
                'ip_address' => request()->ip(),
                'user_id' => auth()->id(),
                'timestamp' => now()->toDateTimeString(),
            ]);
            abort(404, 'ID Tidak Valid');
        }

        $id = $decoded[0];
        $asesi = LevelCSubmission::with('user')->find($id);
        $queryEssay = UserAnswerC::with('user')->find($id);

        if (!$asesi) {
            abort(404, 'Submission tidak ditemukan');
        }

        $userProfile = UserProfile::where('user_id', $asesi->user_id)->first();

        if ($asesi->category === 'video') {
            return view('dashboard.asesor.Grading.levelC', [
                'asesi' => $asesi,
                'userProfile' => $userProfile,
            ]);
        } else {
            return view('dashboard.asesor.Grading.levelCesay', [
                'queryEssay' => $queryEssay,
                'userProfile' => $userProfile,
            ]);
        }
    }

    public function storeAssessmentAsesi(StoreAssessmentRequest $request, string $id)
    {
        $decoded = Hashids::decode($id);

        if (empty($decoded)) {
            Log::channel('grading')->warning('Gagal decode ID Hashids pada halaman grading.', [
                'encoded_id' => $id,
                'reason' => 'ID tidak valid atau tidak dapat didecode',
                'ip_address' => request()->ip(),
                'user_id' => auth()->id(),
                'timestamp' => now()->toDateTimeString(),
            ]);
            abort(404, 'ID Tidak Valid');
        }

        $id = $decoded[0];

        return DB::transaction(function () use ($request, $id) {
            $levelC = LevelCSubmission::find($id);

            if (!$levelC) {
                abort(404, 'Submission tidak ditemukan');
            }

            $user = User::find($levelC->user_id);

            if (!$user) {
                abort(404, 'User tidak ditemukan');
            }

            // Determine final status and is_passed based on assessment
            $finalStatus = $request->status;
            $finalIsPassed = $request->assessment;

            if ($request->assessment === 'rejected') {
                $finalStatus = 'rejected';
                $finalIsPassed = 'rejected';
            }

            // Update the submission with final values
            $levelC->update([
                'score' => $request->score,
                'status' => $finalStatus,
                'is_passed' => $finalIsPassed,
                'comment_asesor' => $request->comment_asesor,
            ]);

            // Log the update for debugging
            Log::channel('grading')->info('LevelC submission updated', [
                'submission_id' => $levelC->id,
                'old_status' => $levelC->getOriginal('status'),
                'new_status' => $finalStatus,
                'old_is_passed' => $levelC->getOriginal('is_passed'),
                'new_is_passed' => $finalIsPassed,
                'assessment' => $request->assessment,
            ]);

            // Create history record
            LevelCHistory::create([
                'user_id' => $levelC->user_id,
                'url_video' => $levelC->url_video,
                'description' => $levelC->description,
                'score' => $levelC->score,
                'comment_asesor' => $request->comment_asesor,
            ]);

            // Handle permissions based on assessment
            if ($request->assessment === 'passed') {
                if ($levelC->category === 'essay') {
                    $user->givePermissionTo('ESSAY_COMPLETED');
                } elseif ($levelC->category === 'video') {
                    $user->givePermissionTo('VIDEO_COMPLETED');
                }
                $user->givePermissionTo('access_level_C');
            } elseif ($request->assessment === 'rejected') {
                if ($levelC->category === 'essay') {
                    $user->revokePermissionTo('ESSAY_UPLOAD');
                } elseif ($levelC->category === 'video') {
                    $user->revokePermissionTo('VIDEO_UPLOAD');
                }
            }

            // Fire the event
            event(new GradingCompleted($user));

            // Verify the update worked
            $updatedLevelC = LevelCSubmission::find($levelC->id);
            Log::channel('grading')->info('Final verification', [
                'submission_id' => $updatedLevelC->id,
                'final_status' => $updatedLevelC->status,
                'final_is_passed' => $updatedLevelC->is_passed,
            ]);

            Alert::success('Berhasil mengubah status assessment');
            return redirect()->route('asesor.list-asesi-c');
        });
    }
}
