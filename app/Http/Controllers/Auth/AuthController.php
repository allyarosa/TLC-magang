<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\Province;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\AsesiRegisterTwoRequest;
use App\Services\AuthService;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login()
    {
        return view('auth.loginPage');
    }

    public function register()
    {
        return view('auth.register', [
            'checkout' => request('checkout'),
        ]);
    }

    public function loginProcess(LoginRequest $request)
    {
        try {
            $result = $this->authService->login(
                $request->only('email', 'password'),
                $request->has('remember')
            );
            if (!$result['success']) {
                Alert::error('Login Gagal!', $result['message'])->autoClose(3000);
                return back()->withInput($request->only('email'))->with('error', $result['message']);
            }

            // Redirect back to checkout if login was triggered from checkout page
            if ($request->filled('checkout')) {
                return redirect()->route('payments.create.public', ['id' => $request->input('checkout')]);
            }
            return redirect($result['redirect']);
        } catch (Exception $e) {
            Alert::error('Gagal!', 'Terjadi kesalahan pada sistem')->autoClose(3000);
            return back()->withInput($request->only('email'))->with('error', 'Terjadi kesalahan sistem');
        }
    }

    public function registerProcess(RegisterRequest $request)
    {
        try {
            // Log::debug('[DEBUG-REGISTER] checkout param: ' . $request->input('checkout', 'NONE'));

            $this->authService->register($request->validated());

            // Redirect back to checkout if registration came from checkout page
            if ($request->filled('checkout')) {
                // Log::debug('[DEBUG-REGISTER] Redirecting to checkout: ' . $request->input('checkout'));
                return redirect()->route('payments.create.public', ['id' => $request->input('checkout')]);
            }

            // Log::debug('[DEBUG-REGISTER] No checkout param, redirecting to verification.notice');
            return redirect()->route('verification.notice');
        } catch (Exception $e) {
            Log::error('[DEBUG-REGISTER] Exception: ' . $e->getMessage());
            Alert::error('Gagal!', 'Akun gagal dibuat')->autoClose(3000);
            return back()->withInput($request->only('email'))->with('error', 'Akun gagal dibuat');
        }
    }

    public function logout()
    {
        $this->authService->logout();
        return redirect('/')->with('success', 'Berhasil logout');
    }

    public function registerStepTwo()
    {
        $provinces = Province::all();
        $user      = Auth::user();

        // Cek apakah user sudah punya no_wa (user baru sudah punya, user lama belum)
        $hasNoWa = $user && $user->userProfile && !empty($user->userProfile->no_wa);

        return view('register2', [
            'provinces' => $provinces,
            'checkout'  => request('checkout'),
            'hasNoWa'   => $hasNoWa,
        ]);
    }

    public function registeraddtionalpost(AsesiRegisterTwoRequest $request)
    {
        try {
            $this->authService->updateAdditionalInfo(Auth::id(), $request->validated());
            Alert::success('Berhasil!', 'Data profil Anda telah berhasil disimpan')->autoClose(3000);

            // If flow came from checkout, redirect back there
            if ($request->filled('checkout')) {
                return redirect()->route('payments.create.public', ['id' => $request->input('checkout')])
                    ->with('success', 'Profil berhasil dilengkapi.');
            }

            return redirect()->route('asesi.dashboard')->with('success', 'Data berhasil disimpan');
        } catch (Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'Terjadi kesalahan saat ingin membuat akun baru: '])
                ->withInput();
        }
    }
}