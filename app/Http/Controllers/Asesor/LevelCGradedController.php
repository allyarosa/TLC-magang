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
use App\Http\Requests\StoreAssessmentRequest;
use App\Models\LevelCHistory;

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
        $userProfile = UserProfile::where('user_id', $asesi->user_id)->first();

        return view('dashboard.asesor.Grading.levelC', [
            'asesi' => $asesi,
            'userProfile' => $userProfile,
        ]);
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
            'score' => 100,
            'comment_asesor' => $request->comment_asesor,
        ]);

        if ($request->assessment === 'passed') {
            $user->givePermissionTo('access_level_C');
        }

        event(new GradingCompleted($user));
        Alert::success('Berhasil mengubah status assessment');
        return redirect()->route('asesor.list-asesi-c');
    }
}