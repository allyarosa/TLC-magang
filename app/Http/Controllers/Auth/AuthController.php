<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\AsesiRegisterTwoRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Models\Province;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.loginPage');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function loginProcess(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            
            if(Auth::user()->status === 'suspended') {
                Auth::logout();
                Alert::error('Login Gagal!', 'Akun sedang diblokir')->autoClose(3000);
                return back()->withInput($request->only('email'))->with('error', 'Akun sedang diblokir');
            }

            if (auth()->user()->hasRole('asesi')) {
                return redirect()->route('asesi.dashboard')->with('success', 'Berhasil login');
            } else if (auth()->user()->hasRole('admin')) {
                return redirect()->route('admin.dashboard')->with('success', 'Berhasil login');
            } else if (auth()->user()->hasRole('asesor')) {
                return redirect()->route('asesor.dashboard')->with('success', 'Berhasil login');
            } else {
                Auth::logout();
                Alert::error('Login Gagal!', 'Akun tidak terdaftar')->autoClose(3000);
                return back()->withInput($request->only('email'))->with('error', 'Akun tidak terdaftar');
            }
        }

        // JIKA GAGAL
        Alert::error('Login Gagal!', 'Email atau Password salah')->autoClose(3000);
        Log::warning('User login failed', ['email' => $request->email, 'ip' => $request->ip()]);
        return back()->withInput($request->only('email'))->with('error', 'Email atau Password salah');
    }

    public function registerProcess(RegisterRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        $validated['status'] = 'active';

        try {
            DB::beginTransaction();

            $user = User::create($validated);
            $user->assignRole('asesi');

            UserProfile::create([
                'user_id' => $user->id,
                'profile_image' => 'blankProfile.png',
            ]);

            Alert::success('Berhasil!', 'Akun berhasil dibuat')->autoClose(3000);
            DB::commit();
            Auth::login($user);
            return redirect()->route('asesi.dashboard'); //ARAHKAN KEARAH DASHBORD

        } catch (Exception $e) {
            DB::rollBack();
            Log::error('User registration failed', ['error' => $e->getMessage()]);
            Alert::error('Gagal!', 'Akun gagal dibuat')->autoClose(3000);
            return back()->withInput($request->only('email'))->with('error', 'Akun gagal dibuat');
        }
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/')->with('success', 'Berhasil logout');
    }

    public function registerStepTwo()
    {
        $provinces = Province::all();
        return view('register2', compact('provinces'));
    }

    public function registeraddtionalpost(AsesiRegisterTwoRequest $request)
    {
        $validated = $request->validated();

        try {

            $userProfile = new UserProfile();
            $userProfile->user_id = Auth::user()->id;
            $userProfile->nama_depan = $request->nama;
            $userProfile->nik = $request->nik;

            if ($request->custom_instansi && $request->instansi) {
                $userProfile->custom_instansi = $request->custom_instansi;
                $userProfile->instansi = $request->instansi;
            } else {
                $userProfile->instansi = $request->instansi;
            }

            $userProfile->tempat_lahir = $request->tempat_lahir;
            $userProfile->tanggal_lahir = $request->tanggal_lahir;
            $userProfile->jenis_kelamin = $request->jenis_kelamin;
            $userProfile->no_wa = $request->no_wa;
            $userProfile->provinsi = $request->provinsi;
            $userProfile->kabupaten = $request->kabupaten;
            $userProfile->kecamatan = $request->kecamatan;
            $userProfile->kelurahan = $request->kelurahan;

            if ($request->profile_image) {
                $path = $request->file('profile_image')->store('img');
                $userProfile->profile_image = $path;
            } else if (!isset($request->profile_image)) {
                $userProfile->profile_image = 'img/blank_profile.png';
            }

            // if (isset($userProfile)) {
            //     if (!$user->hasRole('user')) {
            //         $user->assignRole('user');
            //     }
            //     if (!$user->hasPermissionTo('access_level_A_unpaid')) {
            //         $user->givePermissionTo('access_level_A_unpaid');
            //     }
            //     $user->givePermissionTo('access_level_A_unpaid');
            $userProfile->save();
            // }

            return redirect()->route('asesi.dashboard')->with('success', 'Data berhasil disimpan');
        } catch (Exception $e) {
            Log::error('Register Account step 2 failed: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat ingin membuat akun baru: ' . $e->getMessage()])->withInput();
        }
    }
}
