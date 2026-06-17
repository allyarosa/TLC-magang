<?php

namespace App\Livewire\Auth;

use Exception;
use App\Models\User;
use Livewire\Component;
use App\Models\UserProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use RealRashid\SweetAlert\Facades\Alert;
use Throwable;

class RegisterForm extends Component
{
    public $name;
    public $email;
    public $password;
    public $no_wa;

    /** HashID of the level passed from ?checkout= URL param */
    public $checkout = null;

    protected $rules = [
        'name'     => 'required|string|max:255',
        'email'    => 'required|email|unique:users,email',
        'password' => 'required|min:8',
        'no_wa'    => 'required|string|max:20',
    ];

    protected $messages = [
        'name.required'     => 'Nama lengkap wajib diisi.',
        'name.max'          => 'Nama lengkap maksimal 255 karakter.',
        'email.required'    => 'Email wajib diisi.',
        'email.email'       => 'Format email tidak valid.',
        'email.unique'      => 'Email sudah terdaftar.',
        'password.required' => 'Password wajib diisi.',
        'password.min'      => 'Password minimal 8 karakter.',
        'no_wa.required'    => 'Nomor WhatsApp wajib diisi.',
        'no_wa.max'         => 'Nomor WhatsApp maksimal 20 digit.',
    ];

    public function mount()
    {
        // Capture ?checkout= from the URL when the register page loads
        $this->checkout = request()->query('checkout');
    }

    public function register()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            $user = User::create([
                'name'     => $this->name,
                'email'    => $this->email,
                'password' => Hash::make($this->password),
                'status'   => 'active'
            ]);

            $user->assignRole('asesi');

            UserProfile::create([
                'user_id'       => $user->id,
                'profile_image' => 'blankProfile.png',
                'no_wa'         => $this->no_wa,
            ]);

            Alert::success('Berhasil!', 'Akun berhasil dibuat')->autoClose(3000);
            Auth::login($user);

            // Email verification disabled — uncomment below to re-enable
            // try {
            //     $user->sendEmailVerificationNotification();
            // } catch (Exception $e) {
            //     Log::error('Email verification failed: ' . $e->getMessage());
            // }

            DB::commit();

            // Always go to Step 2 first; carry checkout param so Step 2 can redirect back to checkout after
            $stepTwoUrl = route('asesi.registerStepTwo') . ($this->checkout ? '?checkout=' . $this->checkout : '');
            return redirect($stepTwoUrl);

        } catch (Throwable $e) {
            DB::rollBack();
            report($e);
            Alert::error('Gagal!', 'Akun gagal dibuat')->autoClose(3000);
        }
    }

    public function render()
    {
        return view('livewire.auth.register-form');
    }
}
