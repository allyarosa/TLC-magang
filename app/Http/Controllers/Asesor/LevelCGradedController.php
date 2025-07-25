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
use App\Models\QuestionC;
use App\Models\UserAnswerC;
use Illuminate\Support\Facades\Auth;

class LevelCGradedController extends Controller
{
    public function showGradingPage(string $id)
{
    $decoded = Hashids::decode($id);

    if (empty($decoded)) {
        abort(404, 'ID Tidak Valid');
    }

    $id = $decoded[0];
    $asesi = LevelCSubmission::with('user')->find($id);
    $user = Auth::user();

    $questions = QuestionC::get();
    $userAnswers = UserAnswerC::where('user_id', $asesi->user_id)->get();


    if (!$asesi) {
        abort(404, 'Submission tidak ditemukan');
    }

    $userProfile = UserProfile::where('user_id', $asesi->user_id)->first();

    if ($asesi->category === "video") {
        return view('dashboard.asesor.Grading.levelC', [
            'asesi' => $asesi,
            'userProfile' => $userProfile,
        ]);
    } else {
        return view('dashboard.asesor.Grading.levelCEssay', compact(
            [
                'asesi',
                'questions',
                'userAnswers',
                'userProfile',
            ]));

    }
}


    public function storeAssessmentAsesi(StoreAssessmentRequest $request, String $id)
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

        $levelC = LevelCSubmission::find($id);
        $user = User::where('id', $levelC->user_id)->first();
        $levelC->update([
            'score' => $request->score,
            'status' => $request->status,
            'is_passed' => $request->assessment,
            'comment_asesor' => $request->comment_asesor,
        ]);

        LevelCHistory::create([
            'user_id' => $levelC->user_id,
            'url_video' => $levelC->url_video,
            'description' => $levelC->description,
            'category' => $levelC->category,
            'score' => $levelC->score,
            'comment_asesor' => $request->comment_asesor,
        ]);



        if ($request->assessment === 'passed') {
            if ($levelC->category === "video") {
                $user->givePermissionTo('VIDEO_UPLOAD_COMPLETED');
                $user->givePermissionTo('VIDEO_UPLOAD');
            } elseif ($levelC->category === "essay") {
                $user->givePermissionTo('ESSAY_COMPLETED');
                //tidak perlu memberikan izin ESSAY_UPLOAD karena sudah diberikan sebelumnya
                // $user->givePermissionTo('ESSAY_UPLOAD');
            }
        } elseif ($request->assessment === 'rejected') {
            if ($levelC->category === "video") {
                $user->revokePermissionTo('VIDEO_UPLOAD');
                $levelC->update(['status' => 'rejected', 'is_passed' => 'rejected',]);
            } elseif ($levelC->category === "essay") {
                $user->revokePermissionTo('ESSAY');
                $levelC->update(['status' => 'rejected', 'is_passed' => 'rejected',]);
            }
        }

        event(new GradingCompleted($user));
        Alert::success('Berhasil mengubah status assessment');
        return redirect()->route('asesor.list-asesi-c');
    }
}
