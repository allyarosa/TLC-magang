<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\Province;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
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
        return view('auth.register');
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
            return redirect($result['redirect']);
        } catch (Exception $e) {
            Alert::error('Gagal!', 'Terjadi kesalahan pada sistem')->autoClose(3000);
            return back()->withInput($request->only('email'))->with('error', 'Terjadi kesalahan sistem');
        }
    }

    public function registerProcess(RegisterRequest $request)
    {
        try {
            $this->authService->register($request->validated());
            return redirect()->route('verification.notice');
        } catch (Exception $e) {
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
        return view('register2', compact('provinces'));
    }

    public function registeraddtionalpost(AsesiRegisterTwoRequest $request)
    {
        try {
            $this->authService->updateAdditionalInfo(Auth::id(), $request->validated());
            Alert::success('Berhasil!', 'Data profil Anda telah berhasil disimpan')->autoClose(3000);
            return redirect()->route('asesi.dashboard')->with('success', 'Data berhasil disimpan');
        } catch (Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'Terjadi kesalahan saat ingin membuat akun baru: ' . $e->getMessage()])
                ->withInput();
        }
    }
}