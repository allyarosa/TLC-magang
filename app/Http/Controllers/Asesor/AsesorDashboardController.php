<?php

namespace App\Http\Controllers\Asesor;

use Illuminate\Support\Facades\DB;
use App\Models\LevelBSubmission;
use App\Models\LevelCSubmission;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Vinkla\Hashids\Facades\Hashids;
use App\Models\LevelBHistory;
use App\Models\LevelCHistory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use App\Models\UserAnswerC;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Exports\AsesorCExport;

class AsesorDashboardController extends Controller
{
    // Dashboard Methods
    public function index()
    {
        $users = User::role('asesi')->get();
        $levelBPendingCount = LevelBSubmission::where('status', 'pending')->count();
        $levelBReviewedCount = LevelBSubmission::where('status', 'reviewed')->count();
        $levelCPendingCount = LevelCSubmission::where('status', 'pending')->count();
        $levelCReviewedCount = LevelCSubmission::where('status', 'reviewed')->count();

        $asesiEligibleCount = $users->filter(function ($user) {
            return $user->hasPermissionTo('access_level_A') && $user->hasPermissionTo('access_level_B') && $user->hasPermissionTo('access_level_C');
        })->count();
        $levelPendingCount = $levelBPendingCount + $levelCPendingCount;
        $levelReviewedCount = $levelBReviewedCount + $levelCReviewedCount;

        return view('dashboard.asesor.dashboard', [
            'asesiEligible' => $asesiEligibleCount ?: 'Belum Ada',
            'levelPendingCount' => $levelPendingCount ?: 'Belum Ada',
            'levelReviewedCount' => $levelReviewedCount ?: 'Belum Ada',
        ]);
    }

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

    public function listAsesiC(Request $request)
    {
        $kategori = $request->input('kategori');
        $search = $request->input('search');
        $sort = $request->input('sort', 'latest'); // Default sort by latest

        $query = LevelCSubmission::with('user')
            ->when(!empty($search), function ($q) use ($search) {
                $q->whereHas('user', function ($userQuery) use ($search) {
                    $userQuery->where('name', 'like', '%' . $search . '%');
                });
            })
            ->when($kategori === 'essay', function ($q) {
                $q->where('category', 'essay');
            })
            ->when($kategori === 'video', function ($q) {
                $q->where('category', 'video');
            });

        // Apply sorting
        if ($sort === 'name_asc') {
            $query->join('users', 'level_c_submissions.user_id', '=', 'users.id')
                ->orderBy('users.name', 'asc')
                ->select('level_c_submissions.*') // Select all columns from level_c_submissions
                ->orderBy('users.name', 'asc')
                ->select('user_answers_c.*');
        } elseif ($sort === 'name_desc') {
            $query->join('users', 'level_c_submissions.user_id', '=', 'users.id')
                ->orderBy('users.name', 'desc')
                ->select('level_c_submissions.*')
                ->orderBy('users.name', 'desc')
                ->select('user_answers_c.*');
        } elseif ($sort === 'oldest') {
            $query->oldest();
        } else { // Default to latest
            $query->latest();
        }

        $levelC = $query->paginate(10)->withQueryString();

        return view('dashboard.asesor.listasesiC', [
            'levelC' => $levelC,
            'search' => $search,
            'kategori' => $kategori,
            'sort' => $sort,
        ]);
    }

    // Simple View Methods
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

    public function riwayatPenilaian(Request $request)
    {
        $search = $request->input('search');
        $query = LevelBHistory::with('user');

        if ($search) {
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });
        }

        $history = $query->latest()->paginate(10);
        return view('dashboard.asesor.riwayatpenilaian', compact('history', 'search'));
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

    public function riwayatPenilaianC(Request $request)
    {
        $search = $request->input('search');
        $query = LevelCHistory::with('user');

        if ($search) {
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });
        }

        $history = $query->latest()->paginate(10);
        return view('dashboard.asesor.riwayatpenilaianC', compact('history', 'search'));
    }

    public function exportC()
    {
        return Excel::download(new AsesorCExport, 'riwayat_penilaian_c.xlsx');
    }

    public function riwayatPenilaianCDetail(string $id)
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
        $detail = LevelCHistory::with('user')->findOrFail($id);
        return view('dashboard.asesor.riwayatpenilaiandetailC', compact('detail'));
    }


    public function downloadNilai(Request $request)
    {
        $kategori = $request->input('kategori');
        $month = $request->input('month');

        $levelBQuery = LevelBHistory::with('user');
        $levelCQuery = LevelCHistory::with('user');

        if ($kategori === 'level_b') {
            $levelCQuery->where('id', -1); // Kosongkan level C
        }
        if ($kategori === 'level_c') {
            $levelBQuery->where('id', -1); // Kosongkan level B
        }

        if ($month) {
            $year = substr($month, 0, 4);
            $mon = substr($month, 5, 2);
            $levelBQuery->whereYear('created_at', $year)->whereMonth('created_at', $mon);
            $levelCQuery->whereYear('created_at', $year)->whereMonth('created_at', $mon);
        }

        $levelB = $levelBQuery->latest()->get();
        $levelC = $levelCQuery->latest()->get();

        $history = $levelB->concat($levelC)->sortByDesc('created_at');

        // Gabungkan semua tanggal created_at lalu ambil distinct month
        $allDates = LevelBHistory::select('created_at')->get()
            ->concat(LevelCHistory::select('created_at')->get())
            ->map(function ($item) {
                return Carbon::parse($item->created_at)->format('Y-m');
            })
            ->unique()
            ->sortDesc()
            ->values();

        return view('dashboard.asesor.downloadnilai', [
            'history' => $history,
            'kategori' => $kategori,
            'months' => $allDates,
            'selectedMonth' => $month,
        ]);
    }


    // Profile Methods
    public function profileSetting()
    {
        $user = auth()->user()->load(['userProfile', 'asesorProfile']);
        return view('dashboard.asesor.profilesetting', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255'
        ]);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        $user->userProfile()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'no_wa' => $validated['phone'],
                'alamat' => $validated['address']
            ]
        );

        return redirect()->back()->with('success', 'Profil berhasil diperbarui');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai']);
        }

        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with('success', 'Password berhasil diubah');
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = auth()->user();

        if ($request->hasFile('profile_photo')) {
            if ($user->asesorProfile->profile_image && $user->asesorProfile->profile_image != 'blankProfile.png') {
                Storage::delete('public/profile_images/' . $user->asesorProfile->profile_image);
            }

            $filename = 'profile_' . $user->id . '_' . time() . '.' . $request->file('profile_photo')->getClientOriginalExtension();
            $path = $request->file('profile_photo')->storeAs('public/profile_images', $filename);

            $user->asesorProfile()->update([
                'profile_image' => $filename
            ]);

            return back()->with('success', 'Foto profil berhasil diperbarui');
        }

        return back()->withErrors(['profile_photo' => 'Gagal mengupload foto profil']);
    }
}
