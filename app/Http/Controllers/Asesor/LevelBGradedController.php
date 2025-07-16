<?php

namespace App\Http\Controllers\Asesor;

use App\Events\GradingCompleted;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Models\LevelBSubmission;
use Illuminate\Support\Facades\Log;
use Vinkla\Hashids\Facades\Hashids;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreAssessmentRequest;
use App\Models\LevelBHistory;

class LevelBGradedController extends Controller
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
        $asesi = LevelBSubmission::with('user')->find($id);
        $userProfile = UserProfile::where('user_id', $id)->first();

        if ($asesi->modul_ajar) {
            return view('dashboard.asesor.Grading.modulAjar', [
                'asesi' => $asesi,
                'userProfile' => $userProfile,
            ]);
        } else {
            return view('dashboard.asesor.Grading.ppt', [
                'asesi' => $asesi,
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

        $levelB = LevelBSubmission::find($id);
        $user = User::where('id', $levelB->user_id)->first();
        $levelB->update([
            'score' => $request->score,
            'status' => $request->status,
            'is_passed' => $request->assessment,
            'comment_asesor' => $request->comment_asesor,
        ]);

        $category = null;
        if ($levelB->modul_ajar) {
            $category = 'Modul Ajar';
        } else {
            $category = 'PPT';
        }

        LevelBHistory::create([
            'user_id' => $levelB->user_id,
            'category' => $category,
            'file_ppt' => $levelB->file_ppt ?? null,
            'modul_ajar' => $levelB->modul_ajar ?? null,
            'score' => 100,
            'comment_asesor' => $request->comment_asesor,
        ]);



        if ($request->assessment === 'passed') {
            if ($levelB->modul_ajar) {
                $user->givePermissionTo('MODUL_AJAR_COMPLETED');
                $user->givePermissionTo('MODUL_AJAR');
            } elseif ($levelB->file_ppt) {
                $user->givePermissionTo('PPT_COMPLETED');
                $user->givePermissionTo('PPT_UPLOAD');
            }
            
        } elseif ($request->assessment === 'rejected') {
            if ($levelB->modul_ajar) {
                $user->revokePermissionTo('MODUL_AJAR');
                $levelB->update(['status' => 'rejected', 'is_passed' => 'rejected',]);
            } elseif ($levelB->file_ppt) {
                $user->revokePermissionTo('PPT_UPLOAD');
                $levelB->update(['status' => 'rejected', 'is_passed' => 'rejected',]);
            }
        }
        
        event(new GradingCompleted($user));
        Alert::success('Berhasil mengubah status assessment');
        return redirect()->route('asesor.list-asesi');
    }
}
