<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class LoginForm extends Component
{
    public $email = '';
    public $password = '';
    public $showPassword = false;
    public $remember = false;
    public $errorMessage;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    protected $messages = [
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'password.required' => 'Password wajib diisi.',
    ];

    public function login()
    {
        $this->validate();

        $credentials = [
            'email' => $this->email,
            'password' => $this->password
        ];

        if (Auth::attempt($credentials, $this->remember)) {
            request()->session()->regenerate();

            // Cek status user
            if(Auth::user()->status === 'suspended') {
                Auth::logout();
                Alert::error('Login Gagal!', 'Akun sedang diblokir')->autoClose(3000);
                $this->errorMessage = 'Akun sedang diblokir';
                return;
            }

            // Redirect berdasarkan role
            if (auth()->user()->hasRole('asesi')) {
                return redirect()->route('asesi.dashboard');
            } else if (auth()->user()->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            } else if (auth()->user()->hasRole('asesor')) {
                return redirect()->route('asesor.dashboard');
            } else {
                Auth::logout();
                Alert::error('Login Gagal!', 'Akun tidak terdaftar')->autoClose(3000);
                $this->errorMessage = 'Akun tidak terdaftar';
                return;
            }
        }

        // Jika login gagal
        Alert::error('Login Gagal!', 'Email atau Password salah')->autoClose(3000);
        Log::warning('User login failed', ['email' => $this->email, 'ip' => request()->ip()]);
        $this->errorMessage = 'Email atau Password salah';
    }

    public function render()
    {
        return view('livewire.auth.login-form');
    }

    public function togglePasswordVisibility()
    {
        $this->showPassword = !$this->showPassword;
    }

}
