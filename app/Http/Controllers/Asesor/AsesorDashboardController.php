<?php

namespace App\Http\Controllers\Asesor;

use App\Models\LevelBSubmission;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Vinkla\Hashids\Facades\Hashids;
use App\Models\LevelBHistory;

class AsesorDashboardController extends Controller
{
    public function index()
    {
        $users = User::role('asesi')->get();
        $levelBPendingCount = LevelBSubmission::where('status', 'pending')->count();
        $levelBReviewedCount = LevelBSubmission::where('status', 'reviewed')->count();

        $asesiEligibleCount = $users->filter(function ($user) {
            return $user->hasPermissionTo('access_level_A') && $user->hasPermissionTo('access_level_B');
        })->count();

        return view('dashboard.asesor.dashboard', [
            'asesiEligible' => $asesiEligibleCount ?: 'Belum Ada',
            'levelBPending' => $levelBPendingCount ?: 'Belum Ada',
            'levelBReviewed' => $levelBReviewedCount ?: 'Belum Ada',
        ]);
    }


    // public function listAsesi(Request $request)
    // {
    //     $levelB = LevelBSubmission::with('user')->paginate(10);
    //     return view('dashboard.asesor.listasesi', [
    //         'levelB' => $levelB,
    //     ]);
    // }

    public function listAsesi(Request $request)
    {
        $kategori = $request->input('kategori');
        $search = $request->input('search');

        $query = LevelBSubmission::with('user')
            ->when($kategori === 'modul_ajar', function ($q) {
                $q->whereNotNull('modul_ajar')->where('modul_ajar', '!=', '');
            })
            ->when($kategori === 'ppt', function ($q) {
                $q->whereNotNull('file_ppt')->where('file_ppt', '!=', '');
            })
            ->when(!empty($search), function ($q) use ($search) {
                $q->whereHas('user', function ($userQuery) use ($search) {
                    $userQuery->where('name', 'like', '%' . $search . '%');
                });
            });

        $levelB = $query->latest()->paginate(10)->withQueryString();

        return view('dashboard.asesor.listasesi', [
            'levelB' => $levelB,
            'kategori' => $kategori,
            'search' => $search,
        ]);
    }



    public function notifikasi()
    {
        $levelBPendingCount = LevelBSubmission::where('status', 'pending')->count();
        return view('dashboard.asesor.notifikasi', [
            'levelBPending' => $levelBPendingCount
        ]);
    }

    public function formPenilaian()
    {
        return view('dashboard.asesor.formpenilaian');
    }

    public function riwayatPenilaian()
    {
        $history = LevelBHistory::with('user')->latest()->paginate(10);
        return view('dashboard.asesor.riwayatpenilaian', compact('history'));
    }

    public function riwayatPenilaianDetail(string $id)
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
        $detail = LevelBHistory::with('user')->findOrFail($id);
        return view('dashboard.asesor.riwayatpenilaiandetail', compact('detail'));
    }

    public function riwayatAktifitas()
    {
        return view('dashboard.asesor.riwayataktifitas');
    }

    public function downloadNilai()
    {
        return view('dashboard.asesor.downloadnilai');
    }

    public function profileSetting()
    {
        return view('dashboard.asesor.profilesetting');
    }
}
