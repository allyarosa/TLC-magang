<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\User;
use App\Models\Province;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Models\AdminsProfile;
use App\Models\AsesorProfile;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AsesiStoreRequest;
use App\Models\Categories;
use App\Models\Level;
use App\Models\Questions;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rules\Password;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $user = User::role('asesi')->get();

        $userLevelNone = $user->filter(function ($u) {
            return !$u->hasPermissionTo('access_level_A') &&
                !$u->hasPermissionTo('access_level_B') &&
                !$u->hasPermissionTo('access_level_C');
        })->count();

        $userLevelA = $user->filter(function ($u) {
            return $u->hasPermissionTo('access_level_A');
        })->count();

        $userLevelB = $user->filter(function ($u) {
            return $u->hasPermissionTo('access_level_B');
        })->count();

        $userLevelC = $user->filter(function ($u) {
            return $u->hasPermissionTo('access_level_C');
        })->count();

        $levelCount = [
            'userLevelNone' => $userLevelNone,
            'A' => $userLevelA,
            'B' => $userLevelB,
            'C' => $userLevelC,
        ];

        return view('dashboard.admin.dashboard', [
            'title' => 'Dashboard Admin',
            'asesi' => User::role('asesi')->count(),
            'asesor' => User::role('asesor')->count(),
            'admins' => User::role('admin')->count(),
            'levelCount' => $levelCount,
        ]);
    }

    public function asesiIndex() //MENAMPILKAN DATA ASESI KE DASHBOARD ADMIN
    {
        // Mengambil input pencarian
        $search = request()->input('search');

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
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $users = User::role('asesi')->get();

        $userCountAll = User::role('asesi') ? User::role('asesi')->count() : 0;

        // $userCountLevelA = User::permission(('access_level_A'))->count() ?? 0;
        // $userCountLevelB = User::permission(('access_level_B'))->count() ?? 0;
        // $userCountLevelC = User::permission(('access_level_B'))->count() ?? 0;
        // $userCountAllUnpaid = User::permission('access_level_A_unpaid')->count() ?? 0;

        $userRole = [
            'user' => $userCountAll,
            // 'level_A' => $userCountLevelA,
            // 'level_B' => $userCountLevelB,
            // 'level_C' => $userCountLevelC,
            // 'unpaid' => $userCountAllUnpaid,
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

            $user->assignRole('asesi');

            // validasi akses level A ketika create user BELUM FIX
            // if($user->hasPermissionTo('acces_level_A')) {
            //     $user->givePermissionTo('acces_level_A');
            // }


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

        return view('admin.asesi.show', [
            'title' => 'Detail Asesi',
            'asesi' => $asesi,
        ]);
    }

    public function asesiEdit(string $id)
    {

        $provinces = Province::all();
        $user = UserProfile::with('user')->find($id);
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
            Log::error('gagal delete akun asesi di admin dashboard: ' . $e->getMessage());
            return redirect()->route('admin.asesi.index')->with('error', 'Error deleting user: ' . $e->getMessage());
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

        $query = User::role('admin')->with('adminsProfile')->latest();

        if ($search) {
            $query->where('email', 'like', '%' . $search . '%');
        }

        $admins = $query->get();

        $userCountAll = User::role('admin')->count();
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

    public function adminsStore(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
                'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $user = User::create([
                'name' => 'Admin ' . $request->email, // karena table kamu butuh name
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user->assignRole('admin');

            // $profileImagePath = null;
            // if ($request->hasFile('profile_image')) {
            //     $profileImagePath = $request->file('profile_image')->store('profile_images', 'public');
            // }
            $profileImagePath = $request->file('profile_image')?->store('profile_images', 'public');


            // Cek kalau AdminsProfile berhasil buat
            AdminsProfile::create([
                'user_id' => $user->id,
                'profile_image' => $profileImagePath ?? 'blankProfile.png',
            ]);

            DB::commit();

            return redirect()->route('admin.admins.index')->with('success', 'Admin berhasil ditambahkan.');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menambahkan admin: ' . $e->getMessage())->withInput();
        }
    }

    public function adminsDestroy($id)
    {
        try {
            DB::beginTransaction();

            $admin = User::with('adminsProfile')->findOrFail($id);

            // Hapus foto kalau ada
            if ($admin->adminsProfile->profile_image && $admin->adminsProfile->profile_imagen !== 'blankProfile.png') {
                Storage::disk('public')->delete($admin->adminsProfile->profile_image);
            }

            $admin->adminsProfile()->delete(); // hapus admin profile nya
            $admin->delete(); // hapus user nya

            DB::commit();

            return redirect()->route('admin.admins.index')->with('success', 'Admin berhasil dihapus.');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menghapus admin: ' . $e->getMessage());
        }
    }

    public function adminsShow($id)
    {
        try {
            $admin = User::with('adminsProfile')->findOrFail($id);

            return view('admin.admins.show', compact('admin'));
        } catch (Exception $e) {
            return back()->with('error', 'Data admin tidak ditemukan.');
        }
    }

    public function adminsEdit($id)
    {
        try {
            $admin = User::with('adminsProfile')->findOrFail($id);

            return view('admin.admins.edit', compact('admin'));
        } catch (Exception $e) {
            return back()->with('error', 'Data admin tidak ditemukan.');
        }
    }

    public function adminsUpdate(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $admin = AdminsProfile::with('user')->findOrFail($id);

            $request->validate([
                'email' => 'required|email|unique:users,email,' . $admin->user->id,
                'password' => 'nullable|min:8',
                'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $admin->user->update([
                'email' => $request->email,
                'password' => $request->password ? Hash::make($request->password) : $admin->user->password,
            ]);

            if ($request->hasFile('profile_image')) {
                // Cek dan hapus file lama kalau ada
                if ($admin->profile_image && $admin->profile_image !== 'blankProfile.png') {
                    Storage::disk('public')->delete($admin->profile_image);
                }

                $profileImagePath = $request->file('profile_image')->store('profile_images', 'public');
                $admin->update(['profile_image' => $profileImagePath]);
            }


            DB::commit();

            return redirect()->route('admin.admins.index')->with('success', 'Admin berhasil diperbarui.');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal memperbarui admin: ' . $e->getMessage())->withInput();
        }
    }

    // public function level()
    // {
    //     $search = request('search');
    //     $level = Level::query();

    //     if ($search) {
    //         $level->where('level_name', 'like', '%' . $search . '%');
    //     }

    //     $level = $level->get();
    //     return view('admin.level.index', [
    //         'title' => 'Create Admin',
    //         'navTitle' => 'Create Admin',
    //         'level' => $level
    //     ]);
    // }

    // public function categories()
    // {
    //     $search = request('search');
    //     $kategori = Categories::query();

    //     if ($search) {
    //         $kategori->where('name', 'like', '%' . $search . '%');
    //     }

    //     $kategori = $kategori->get();
    //     return view('admin.categories.index', [
    //         'title' => 'Create Categories',
    //         'navTitle' => 'Create Categories',
    //         'kategori' => $kategori
    //     ]);
    // }

    // public function levelCreate()
    // {

    //     return view('admin.level.create', [
    //         'title' => 'Create Level',
    //         'navTitle' => 'Create Level',

    //     ]);
    // }

    // public function categoriesCreate()
    // {
    //     $level = Level::all();
    //     return view('admin.categories.create', [
    //         'title' => 'Create Kategori',
    //         'navTitle' => 'Create Kategori',
    //         'level' => $level
    //     ]);
    // }

    // public function levelStore(Request $request)
    // {
    //     dd($request->all());
    //     $validation = $request->validate([
    //         'level_name' => 'required'
    //     ]);

    //     try {
    //         Level::create($validation);

    //         alert('success', 'Level created successfully!');
    //         return redirect()->route('admin.level.index')->with('success', 'Level created successfully!');
    //     } catch (\Throwable $th) {
    //         alert('error', 'Level created failed!');
    //         return redirect()->back()->with('error', 'Level created failed!');
    //     }
    // }
    // public function categoriesStore(Request $request)
    // {
    //     $validation = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'image_categori' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    //         'level_id' => 'required',
    //         'is_locked' => 'required',
    //     ]);

    //     $validation['image_categori'] = $request->file('image_categori')->store('categori', 'public');
    //     try {
    //         Categories::create($validation);

    //         alert('success', 'Category created successfully!');
    //         return redirect()->route('admin.categories.index')->with('success', 'Category created successfully!');
    //     } catch (\Throwable $th) {
    //         alert('error', 'Category created failed!');
    //         return redirect()->back()->with('error', 'Category created failed!');
    //     }
    // }

    // public function levelDestroy($id)
    // {
    //     try {
    //         DB::beginTransaction();

    //         $level = Level::findOrFail($id);

    //         $level->delete();

    //         DB::commit();

    //         return redirect()->route('admin.level.index')->with('success', 'Level berhasil dihapus.');
    //     } catch (Exception $e) {
    //         DB::rollBack();
    //         return back()->with('error', 'Gagal menghapus Level: ' . $e->getMessage());
    //     }
    // }
    // public function categoriesDestroy($id)
    // {
    //     try {
    //         DB::beginTransaction();

    //         $kategori = Categories::findOrFail($id);

    //         if ($kategori->image_categori && Storage::disk('public')->exists($kategori->image_categori)) {
    //             Storage::disk('public')->delete($kategori->image_categori);
    //         }

    //         $kategori->delete();

    //         DB::commit();

    //         return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil dihapus.');
    //     } catch (Exception $e) {
    //         DB::rollBack();
    //         return back()->with('error', 'Gagal menghapus kategori: ' . $e->getMessage());
    //     }
    // }

    // public function levelEdit($id)
    // {
    //     try {
    //         $level = Level::findOrFail($id);

    //         return view('admin.level.edit', [
    //             'level' => $level,
    //             'title' => 'Edit Level',
    //         ]);
    //     } catch (Exception $e) {
    //         return back()->with('error', 'Data level tidak ditemukan.');
    //     }
    // }

    // public function categoriesEdit($id)
    // {
    //     try {
    //         $kategori = Categories::findOrFail($id);
    //         $level = Level::all();

    //         return view('admin.categories.edit', [
    //             'categories' => $kategori,
    //             'level' => $level,
    //             'title' => 'Edit Categories',
    //         ]);
    //     } catch (Exception $e) {
    //         return back()->with('error', 'Data categories tidak ditemukan.');
    //     }
    // }

    // public function levelUpdate(Request $request, string $id)
    // {
    //     $level = Level::findOrfail($id);
    //     $validation = $request->validate([
    //         'level_name' => 'required'
    //     ]);

    //     try {

    //         $level->update($validation);

    //         alert('success', 'Level updated successfully!');
    //         return redirect()->route('admin.level.index')->with('success', 'Level updated successfully!');
    //     } catch (\Throwable $th) {
    //         alert('error', 'Level update failed!');
    //         return redirect()->back()->with('error', 'Level update failed!');
    //     }
    // }
    // public function categoriesUpdate(Request $request, string $id)
    // {
    //     $kategori = Categories::findOrfail($id);
    //     $validation = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'image_categori' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    //         'level_id' => 'required',
    //         'is_locked' => 'required',
    //     ]);

    //     try {
    //         if ($request->hasFile('image_categori')) {
    //             if ($kategori->image_categori) {
    //                 Storage::disk('public')->delete($kategori->image_categori);
    //             }

    //             $validation['image_categori'] = $request->file('image_categori')->store('categori', 'public');
    //         } else {
    //             $validation['image_categori'] = $kategori->image_categori;
    //         }

    //         $kategori->update($validation);

    //         alert('success', 'Category updated successfully!');
    //         return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully!');
    //     } catch (\Throwable $th) {
    //         alert('error', 'Category update failed!');
    //         return redirect()->back()->with('error', 'Category update failed!');
    //     }
    // }

    // public function questions()
    // {
    //     $search = request('search');
    //     $questions = Questions::query();

    //     if ($search) {
    //         $questions->where('name', 'like', '%' . $search . '%');
    //     }

    //     $questions = $questions->get();

    //     return view('admin.questions.index', [
    //         'title' => 'Questions',
    //         'navTitle' => 'Questions',
    //         'questions' => $questions
    //     ]);
    // }

    // public function questionsCreate()
    // {
    //     $categories = categories::all();
    //     return view('admin.questions.create', [
    //         'title' => 'Create Questions',
    //         'navTitle' => 'Create Questions',
    //         'categories' => $categories
    //     ]);
    // }

    // public function questionsStore(Request $request)
    // {
    //     $validation = $request->validate([
    //         'question' => 'required|string|max:255',
    //         'category_id' => 'required',
    //     ]);

    //     try {
    //         Questions::create($validation);

    //         alert('success', 'Questions created successfully!');
    //         return redirect()->route('admin.questions.index')->with('success', 'Questions created successfully!');
    //     } catch (\Throwable $th) {
    //         alert('error', 'Questions created failed!');
    //         return redirect()->back()->with('error', 'Questions created failed!');
    //     }
    // }

    // public function questionsDestroy($id)
    // {
    //     try {
    //         DB::beginTransaction();

    //         $questions = Questions::findOrFail($id);

    //         $questions->delete();

    //         DB::commit();

    //         return redirect()->route('admin.questions.index')->with('success', 'Questions berhasil dihapus.');
    //     } catch (Exception $e) {
    //         DB::rollBack();
    //         return back()->with('error', 'Gagal menghapus Level: ' . $e->getMessage());
    //     }
    // }

    // public function questionsEdit($id)
    // {
    //     try {
    //         $questions = questions::findOrFail($id);
    //         $categories = categories::all();

    //         return view('admin.questions.edit', [
    //             'questions' => $questions,
    //             'categories' => $categories,
    //             'title' => 'Edit questions',
    //         ]);
    //     } catch (Exception $e) {
    //         return back()->with('error', 'Data questions tidak ditemukan.');
    //     }
    // }

    // public function questionsUpdate(Request $request, string $id)
    // {
    //     $questions = questions::findOrfail($id);
    //     $validation = $request->validate([
    //         'question' => 'required|string|max:255',
    //         'category_id' => 'required',
    //     ]);

    //     try {

    //         $questions->update($validation);

    //         alert('success', 'questions updated successfully!');
    //         return redirect()->route('admin.questions.index')->with('success', 'questions updated successfully!');
    //     } catch (\Throwable $th) {
    //         alert('error', 'questions update failed!');
    //         return redirect()->back()->with('error', 'questions update failed!');
    //     }
    // }
}
