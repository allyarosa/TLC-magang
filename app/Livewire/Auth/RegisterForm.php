<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;

class RegisterForm extends Component
{
    public $name;
    public $email;
    public $password;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8',
    ];

    protected $messages = [
        'name.required' => 'Nama lengkap wajib diisi.',
        'name.max' => 'Nama lengkap maksimal 255 karakter.',
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'email.unique' => 'Email sudah terdaftar.',
        'password.required' => 'Password wajib diisi.',
        'password.min' => 'Password minimal 8 karakter.',
    ];

    public function register()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'status' => 'active'
            ]);

            $user->assignRole('asesi');

            UserProfile::create([
                'user_id' => $user->id,
                'profile_image' => 'blankProfile.png',
            ]);

            Alert::success('Berhasil!', 'Akun berhasil dibuat')->autoClose(3000);
            DB::commit();

            Auth::login($user);
            return redirect()->route('asesi.dashboard');

        } catch (Exception $e) {
            DB::rollBack();
            Log::error('User registration failed', ['error' => $e->getMessage()]);
            Alert::error('Gagal!', 'Akun gagal dibuat')->autoClose(3000);
            session()->flash('error', 'Akun gagal dibuat');
        }
    }

    public function render()
    {
        return view('livewire.auth.register-form');
    }
}
