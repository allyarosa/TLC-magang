<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreRequest;
use App\Http\Requests\AsesiStoreRequest;
use App\Imports\UsersImport;
use App\Models\AdminsProfile;
use App\Models\AsesorProfile;
use App\Models\CategoryA;
use App\Models\Payment;
use App\Models\Province;
use App\Models\User;
use App\Models\UserProfile;
use App\Services\AdministratorService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;

class AdminDashboardController extends Controller
{
    protected $service;

    public function __construct(AdministratorService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $user = User::role('asesi')->get();

        $userLevelNone = $user->filter(function ($u) {
            return !$u->hasPermissionTo('access_level_A') &&
                !$u->hasPermissionTo('access_level_B') &&
                !$u->hasPermissionTo('access_level_C');
        })->count();

        $userLevelA = $user->filter(fn($u) => $u->hasPermissionTo('access_level_A'))->count();
        $userLevelB = $user->filter(fn($u) => $u->hasPermissionTo('access_level_B'))->count();
        $userLevelC = $user->filter(fn($u) => $u->hasPermissionTo('access_level_C'))->count();

        $levelCount = [
            'userLevelNone' => $userLevelNone,
            'A'             => $userLevelA,
            'B'             => $userLevelB,
            'C'             => $userLevelC,
        ];

        // Level completed counts
        $completedA = $user->filter(fn($u) => $u->hasPermissionTo('level_A_completed'))->count();
        $completedB = $user->filter(fn($u) => $u->hasPermissionTo('level_B_completed'))->count();
        $completedC = $user->filter(fn($u) => $u->hasPermissionTo('level_C_completed'))->count();

        // Payment stats
        $totalRevenue    = Payment::where('status', 'settlement')->sum('amount');
        $pendingPayments = Payment::where('status', 'pending')->count();
        $settledPayments = Payment::where('status', 'settlement')->count();

        // Monthly registrations — last 6 months
        $monthlyRegistrations = User::role('asesi')
            ->where('created_at', '>=', now()->subMonths(5)->startOfMonth())
            ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        $regLabels = [];
        $regData   = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $regLabels[] = $date->format('M Y');
            $found = $monthlyRegistrations->first(
                fn($r) => $r->year == $date->year && $r->month == $date->month
            );
            $regData[] = $found ? $found->total : 0;
        }

        // Recent payments (latest 5)
        $recentPayments = Payment::with(['user', 'level'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard.admin.dashboard', [
            'title'           => 'Dashboard Admin',
            'asesi'           => User::role('asesi')->count(),
            'asesor'          => User::role('asesor')->count(),
            'admins'          => User::role('admin')->count(),
            'levelCount'      => $levelCount,
            'completedCount'  => ['A' => $completedA, 'B' => $completedB, 'C' => $completedC],
            'totalRevenue'    => $totalRevenue,
            'pendingPayments' => $pendingPayments,
            'settledPayments' => $settledPayments,
            'regLabels'       => $regLabels,
            'regData'         => $regData,
            'recentPayments'  => $recentPayments,
        ]);
    }

    public function asesiIndex() //MENAMPILKAN DATA ASESI KE DASHBOARD ADMIN
    {
        // Mengambil input pencarian
        $search = request()->input('search');
        $category = request()->input('category_name');


        $userProfiles = UserProfile::with('user')
            ->when($search, function ($query) use ($search) {
                $query->where('nama_depan', 'LIKE', '%' . $search . '%')
                    ->orWhere('nik', 'LIKE', '%' . $search . '%')
                    ->orWhere('tempat_lahir', 'LIKE', '%' . $search . '%')
                    ->orWhereHas('user', function ($query) use ($search) {
                        $query->where('name', 'LIKE', '%' . $search . '%')
                            ->orWhere('email', 'LIKE', '%' . $search . '%');
                    });
            })
            ->when($category && $category !== 'ALL', function ($query) use ($category) {
                $query->whereHas('user.permissions', function ($q) use ($category) {
                    $q->where('name', $category);
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $users = User::role('asesi')->get();

        $userCountAll = $userProfiles->total() ?? 0;

        $userRole = [
            'user' => $userCountAll,
        ];

        return view('admin.asesi.index', [
            'title' => 'Asesi Index',
            'users' => $users,
            'userProfile' => $userProfiles,
            'navTitle' => 'Table Asesi',
            'userCount' => $userRole
        ]);
    }

    public function asesiCreate()
    {
        $provinces = Province::all();
        return view('admin.asesi.create', [
            'title' => 'Create Asesi', //BELUM FIX
            'navTitle' => 'Table Asesi', // BELUM FIX
            'provinces' => $provinces, // BELUM DIBUAT
        ]);
    }


    public function asesiStore(AsesiStoreRequest $request)
    {
        $request->validated();

        try {
            DB::beginTransaction();
            // Create User
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'status' => 'active',
                'email_verified_at' => now(),
            ]);

            // validasi role ketika create user
            $user->assignRole('asesi');

            // jika admin mengisi form permissons
            if ($request->filled('permissions')) {
                $user->givePermissionTo(permissions: $request->permissions);
            }

            // Create User Profile
            $userProfile = new UserProfile([
                'user_id' => $user->id,
                'nama_depan' => isset($request->nama_depan) ? $request->nama_depan : $request->name,
                'nik' => $request->nik,
                'instansi' => $request->custom_instansi ?? $request->instansi,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'no_wa' => $request->no_wa,
                'provinsi' => $request->provinsi,
                'kabupaten' => $request->kabupaten,
                'kecamatan' => $request->kecamatan,
                'kelurahan' => $request->kelurahan,
                'profile_image' => $request->file('profile_image')
                    ? $request->file('profile_image')->store('asesi_images', 'public')
                    : 'blankProfile.png'
            ]);

            $userProfile->save();
            DB::commit();
            Alert::success('success', 'Data User Baru Berhasil Ditambahkan!');
            return redirect()->route('admin.asesi.index')->with('success', 'Data berhasil disimpan');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('User registration failed: ' . $e->getMessage(), [
                'name' => $request->name,
                'email' => $request->email,
            ]);
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat mendaftar: ' . $e->getMessage()])->withInput();
        }
    }

    public function asesiShow($id)
    {
        $asesi = UserProfile::findOrFail($id); // cari data berdasarkan ID
        $userPermission = [
            'level_A_completed' => $asesi->user->hasPermissionTo('level_A_completed'),
            'level_B_completed' => $asesi->user->hasPermissionTo('level_B_completed'),
            'level_C_completed' => $asesi->user->hasPermissionTo('level_C_completed'),
        ];

        return view('admin.asesi.show', [
            'title' => 'Detail Asesi',
            'asesi' => $asesi,
            'userPermission' => $userPermission,
        ]);
    }

    public function asesiEdit(string $id)
    {

        $provinces = Province::all();
        $user = UserProfile::with('user')->find($id);
        // $userPermissions = $user->permissions->pluck('')->toArray();
        return view('admin.asesi.edit', [
            'title' => 'Edit Asesi',
            'navTitle' => 'Edit Asesi',
            'user' => $user,
            'provinces' => $provinces,
        ]);
    }

    public function asesiUpdate(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'lowercase', 'max:255'],
            'password' => ['nullable', 'string'],
            'nama_depan' => 'nullable|string|max:255',
            'no_wa' => ['numeric', 'nullable', 'digits_between:1,15'],
            'nik' => ['nullable', 'string'],
            'instansi' => ['nullable', 'string'],
            'tempat_lahir' => ['nullable', 'string'],
            'jenis_kelamin' => ['nullable', 'string'],
            'tanggal_lahir' => ['nullable', 'date'],
            'provinsi' => ['nullable', 'string'],
            'kabupaten' => ['nullable', 'string'],
            'kecamatan' => ['nullable', 'string'],
            'kelurahan' => ['nullable', 'string'],
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'custom_instansi' => ['nullable', 'string'],
            'update_password' => 'nullable'
        ]);

        $userProfile = UserProfile::with('user')->find($id);

        try {
            DB::beginTransaction();
            $userProfile->update([
                'nik' => $validated['nik'] ?? $userProfile->nik,
                'nama_depan' => $validated['nama_depan'] ?? $userProfile->fullname,
                'instansi' => $validated['instansi'] ?? $userProfile->instansi,
                'tempat_lahir' => $validated['tempat_lahir'] ?? $userProfile->tempat_lahir,
                'tanggal_lahir' => $validated['tanggal_lahir'] ?? $userProfile->tanggal_lahir,
                'jenis_kelamin' => $validated['jenis_kelamin'] ?? $userProfile->jenis_kelamin,
                'no_wa' => $validated['no_wa'] ?? $userProfile->no_wa,
                'profile_image' => $validated['profile_image'] ?? $userProfile->profile_image,
                'provinsi' => $validated['provinsi'] ?? $userProfile->provinsi,
                'kabupaten' => $validated['kabupaten'] ?? $userProfile->kabupaten,
                'kecamatan' => $validated['kecamatan'] ?? $userProfile->kecamatan,
                'kelurahan' => $validated['kelurahan'] ?? $userProfile->kelurahan,
            ]);

            $userUpdateData = [];

            if ($request->filled('password')) {
                $userUpdateData['password'] = Hash::make($request->input('password'));
            }

            if ($request->filled('email')) {
                $userUpdateData['email'] = $request->input('email');
            }

            if ($request->filled('status')) {
                $userUpdateData['status'] = $request->input('status');
                
                if ($request->input('status') === 'suspended') {
                    DB::table('sessions')
                        ->where('user_id', $userProfile->user->id)
                        ->delete();
                }
            }

            if ($request->filled('name')) {
                $userUpdateData['name'] = $request->input('name');
            }

            if (!empty($userUpdateData)) {
                $userProfile->user->update($userUpdateData);
            }

            if ($request->hasFile('profile_image')) {
                if ($userProfile->profile_image && $userProfile->profile_image !== 'blankProfile.png') {
                    Storage::delete($userProfile->profile_image);
                }
                $userProfile->update([
                    'profile_image' => $request->file('profile_image')->store('asesi_images', 'public')
                ]);
            }

            DB::commit();
            Alert::success('success', 'Data User Berhasil Diperbarui!');
            return redirect()->route('admin.asesi.index')->with('success', 'Data berhasil diperbarui');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Gagal mengupdate data asesi: ' . $e->getMessage(), [
                'name' => $request->name,
                'email' => $request->email,
            ]);
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage()])->withInput();
        }
    }

    public function asesiDestroy(string $id)
    {
        try {
            DB::beginTransaction();
            $user = User::find($id);
            $userProfile = UserProfile::where('user_id', $id)->first();


            if ($userProfile->profile_image && $userProfile->profile_image !== 'blankProfile.png') {
                Storage::delete($userProfile->profile_image);
            }

            $userProfile->delete();
            $user->removeRole('asesi');
            $user->delete();
            DB::commit();
            Alert::success('Berhasil', 'Data Berhasil Dihapus!');
            return redirect()->route('admin.asesi.index');
        } catch (Exception $e) {
            DB::rollBack();
            Alert::success('Gagal', 'Terjadi Error!');
            Log::error('Error delete asesi: ', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->route('admin.asesi.index')->with('error', 'Error deleting user: ' . $e->getMessage());
        }
    }

    public function asesiLevelManagementIndex(string $id)
    {
        $userProfile = UserProfile::with('user')->findOrFail($id);
        $targetUser  = $userProfile->user;

        $groupedPermissions = [
            'User Status'      => ['fresh_user'],
            'Unpaid Access'    => ['access_level_B_unpaid', 'access_level_C_unpaid'],
            'Pending Payment'  => ['level_a_pending_payment', 'level_b_pending_payment', 'level_c_pending_payment'],
            'Active Levels'    => ['access_level_A', 'access_level_B', 'access_level_C'],
            'Completed Levels' => ['level_A_completed', 'level_B_completed', 'level_C_completed'],
            'Special Access'   => ['bundling', 'EXPIRED_LEVEL'],
            'Content Types'    => [
                'HOTS', 'PCK', 'NUMERASI', 'LITERASI',
                'HOTS_LOCK', 'PCK_LOCK', 'NUMERASI_LOCK', 'LITERASI_LOCK',
                'PPT_UPLOAD', 'PPT_COMPLETED',
                'MODUL_AJAR', 'MODUL_AJAR_COMPLETED',
                'ESSAY', 'ESSAY_COMPLETED',
                'VIDEO_UPLOAD', 'VIDEO_UPLOAD_COMPLETED',
                'YES_NO_QUESTIONS', 'EXPIRED_KATEGORY',
            ],
        ];

        return view('admin.asesi.level_management', [
            'title'              => 'Manajemen Level Asesi',
            'userProfile'        => $userProfile,
            'targetUser'         => $targetUser,
            'groupedPermissions' => $groupedPermissions,
        ]);
    }

    public function asesiLevelManagementUpdate(Request $request, string $id)
    {
        $userProfile = UserProfile::with('user')->findOrFail($id);
        $targetUser  = $userProfile->user;

        $permission = $request->input('permission');
        $action     = $request->input('action', 'assign');

        if ($action === 'revoke') {
            if ($targetUser->hasPermissionTo($permission)) {
                $targetUser->revokePermissionTo($permission);
                return back()->with('success', "Permission '{$permission}' berhasil dicabut dari {$targetUser->name}.");
            }
            return back()->with('info', "{$targetUser->name} tidak memiliki permission '{$permission}'.");
        } else {
            if (!$targetUser->hasPermissionTo($permission)) {
                $targetUser->givePermissionTo($permission);
                return back()->with('success', "Permission '{$permission}' berhasil diberikan ke {$targetUser->name}.");
            }
            return back()->with('info', "{$targetUser->name} sudah memiliki permission '{$permission}'.");
        }
    }

    public function asesorIndex()
    {
        $search = request('search'); // Ambil nilai pencarian dari input GET

        $query = AsesorProfile::with('user')->latest();

        if ($search) {
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        $asesors = $query->get();

        $userCountAll = User::role('asesor')->count();
        $userCount = ['user' => $userCountAll];

        return view('admin.asesor.index', compact('userCount', 'asesors'));
    }


    public function asesorCreate()
    {
        return view('admin.asesor.create', [
            'title' => 'Create Asesor',
            'navTitle' => 'Create Asesor'
        ]);
    }

    public function asesorStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'berkas_cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        try {
            DB::beginTransaction();

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'status' => 'active',
                'email_verified_at' => now(),
            ]);
            $user->assignRole('asesor');

            $cvPath = $request->file('berkas_cv')?->store('asesor/cv', 'public');
            $profileImagePath = $request->file('profile_image')?->store('asesor/profile_images', 'public');

            // Simpan ke tabel user_asesor
            AsesorProfile::create([
                'user_id' => $user->id,
                'berkas_cv' => $cvPath,
                'profile_image' => $profileImagePath ?? 'blankProfile.png',
            ]);
            DB::commit();
            return redirect()->route('admin.asesor.index')->with('success', 'Asesor berhasil ditambahkan!');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Gagal menambahkan asesor: ' . $e->getMessage(), [
                'name' => $request->name,
                'email' => $request->email,
            ]);
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menambahkan asesor: ' . $e->getMessage()])->withInput();
        }
    }

    public function asesorDestroy($id)
    {
        try {
            DB::beginTransaction();
            $userAsesor = AsesorProfile::findOrFail($id);
            $user = $userAsesor->user;

            // Hapus file foto profil
            if ($userAsesor->profile_image && Storage::disk('public')->exists($userAsesor->profile_image) && $userAsesor->profile_image !== 'blankProfile.png') {
                Storage::disk('public')->delete($userAsesor->profile_image);
            }

            // Hapus file CV
            if ($userAsesor->berkas_cv && Storage::disk('public')->exists($userAsesor->berkas_cv)) {
                Storage::disk('public')->delete($userAsesor->berkas_cv);
            }

            // Hapus data dari database
            $userAsesor->delete();
            $user->removeRole('asesor');
            $user->delete();
            DB::commit();

            return redirect()->route('admin.asesor.index')->with('success', 'Asesor berhasil dihapus!');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Gagal menghapus asesor: ' . $e->getMessage(), [
                'user_id' => $id ?? null,
            ]);
            return redirect()->route('admin.asesor.index')->with('error', 'Gagal menghapus asesor: ' . $e->getMessage());
        }
    }

    public function asesorShow($id)
    {
        $userAsesor = AsesorProfile::with('user')->findOrFail($id);
        return view('admin.asesor.show', compact('userAsesor'));
    }


    public function asesorEdit($id)
    {
        $userAsesor = AsesorProfile::with('user')->findOrFail($id);
        return view('admin.asesor.edit', compact('userAsesor'));
    }


    public function asesorUpdate(Request $request, $id)
    {
        $userAsesor = AsesorProfile::findOrFail($id);
        $user = $userAsesor->user;

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'berkas_cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        try {
            DB::beginTransaction();

            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->filled('password')) {
                $user->password = bcrypt($request->password);
            }
            $user->save();

            // Handle file upload
            if ($request->hasFile('berkas_cv')) {
                $userAsesor->berkas_cv = $request->file('berkas_cv')->store('cv', 'public');
            }

            if ($request->hasFile('profile_image')) {
                $userAsesor->profile_image = $request->file('profile_image')->store('profile_images', 'public');
            }

            $userAsesor->save();
            DB::commit();

            return redirect()->route('admin.asesor.index')->with('success', 'Asesor berhasil diperbarui!');
        } catch (Exception $e) {
            Log::error('Gagal memperbarui asesor: ' . $e->getMessage(), [
                'user_id' => $id,
                'name' => $request->name,
                'email' => $request->email,
            ]);
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui asesor: ' . $e->getMessage()])->withInput();
        }
    }

    public function adminsIndex()
    {
        $search = request('search');

        $query = User::role('administrator')->with('adminsProfile')->latest();

        if ($search) {
            $query->where('email', 'like', '%' . $search . '%');
        }

        $admins = $query->get();

        $userCountAll = User::role('administrator')->count();
        $userCount = ['user' => $userCountAll];

        return view('admin.admins.index', compact('userCount', 'admins'));
    }



    public function adminsCreate()
    {
        return view('admin.admins.create', [
            'title' => 'Create Admin',
            'navTitle' => 'Create Admin'
        ]);
    }

    public function adminsStore(AdminStoreRequest $request)
    {
        return $this->service->storeData($request);
    }

    public function adminsDestroy($id)
    {
        return $this->service->deleteAdminAccount($id);
    }

    public function adminsShow($id)
    {
        return $this->service->showPageAdmin($id);
    }

    public function adminsEdit($id)
    {
        return $this->service->showEditPage($id);
    }

    public function adminsUpdate(AdminStoreRequest $request, $id)
    {
        return $this->service->updateAdminAccount($request, $id);
    }

    public function showImportForm()
    {
        return view('admin.import_asesi');
    }

    public function importAsesi(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:2048',
            'permissions' => 'required|array',
            'permissions.*' => 'string|in:access_level_A,access_level_B,access_level_C,HOTS,PCK,NUMERASI,LITERASI'
        ]);
        try {
            Excel::import(new UsersImport($request->permissions), $request->file('file'));
            Alert::success('success', 'Data user berhasil diimport dan permissions terpilih telah diberikan!');
            return redirect()->back()->with('success', 'Data user berhasil diimport dan permissions terpilih telah diberikan!');
        } catch (Exception $e) {
            Alert::error('error', $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function categories()
    {
        $search = request('search');
        $kategori = CategoryA::with('level');

        if ($search) {
            $kategori->where('name', 'like', '%' . $search . '%');
        }

        $kategori = $kategori->get();
        return view('admin.categories.index', [
            'title' => 'Create Categories',
            'navTitle' => 'Create Categories',
            'kategori' => $kategori
        ]);
    }
    
    public function impersonate($id)
    {
        $user = User::findOrFail($id);

        // Prevent impersonating other admins for security
        if ($user->hasRole('admin')) {
            return redirect()->back()->with('error', 'Cannot impersonate an admin!');
        }

        Auth::login($user);

        return redirect()->route('asesi.dashboard');
    }
}
