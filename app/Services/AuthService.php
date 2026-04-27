<?php

namespace App\Services;

use Exception;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Events\Registered;

class AuthService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Handle user login logic.
     *
     * @param array $credentials
     * @param bool $remember
     * @return array
     * @throws Exception
     */
    public function login(array $credentials, bool $remember = false): array
    {
        try {
            if (!Auth::attempt($credentials, $remember)) {
                Log::warning('Login attempt failed', [
                    'email' => $credentials['email'],
                    'ip' => request()->ip()
                ]);
                return ['success' => false, 'message' => 'Email atau Password salah'];
            }

            $user = Auth::user();

            if ($user->status === 'suspended') {
                Auth::logout();
                Log::info('Login blocked: User is suspended', ['user_id' => $user->id]);
                return ['success' => false, 'message' => 'Akun sedang diblokir'];
            }

            request()->session()->regenerate();

            Log::info('User logged in successfully', ['user_id' => $user->id]);

            return [
                'success' => true,
                'user' => $user,
                'redirect' => $this->getRedirectRoute($user)
            ];
        } catch (Exception $e) {
            Log::error('Login process error: ' . $e->getMessage(), [
                'exception' => $e,
                'email' => $credentials['email']
            ]);
            throw $e;
        }
    }

    /**
     * Handle user registration logic.
     *
     * @param array $data
     * @return User
     * @throws Exception
     */
    public function register(array $data): User
    {
        DB::beginTransaction();
        try {
            $user = $this->userRepository->create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
                'status' => 'active'
            ]);

            $user->assignRole('asesi');

            $this->userRepository->createProfile([
                'user_id' => $user->id,
                'profile_image' => 'blankProfile.png',
            ]);

            DB::commit();

            Auth::login($user);
            event(new Registered($user));

            Log::info('User registered successfully', ['user_id' => $user->id]);

            return $user;
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Registration process error: ' . $e->getMessage(), [
                'exception' => $e,
                'data' => collect($data)->except('password')->toArray()
            ]);
            throw $e;
        }
    }

    /**
     * Handle additional registration data (step 2).
     *
     * @param int $userId
     * @param array $data
     * @return bool
     * @throws Exception
     */
    public function updateAdditionalInfo(int $userId, array $data): bool
    {
        try {
            $profileData = [
                'nama_depan'                => $data['nama'],
                'nik'                       => $data['nik'] ?? null,
                'instansi'                  => $data['instansi'],
                'custom_instansi'           => $data['custom_instansi'] ?? null,
                'profesi'                   => $data['profesi'],
                'lama_masa_kerja'           => $data['lama_masa_kerja'] ?? null,
                'latar_belakang_pendidikan' => $data['latar_belakang_pendidikan'] ?? null,
                'nama_universitas'          => $data['nama_universitas'] ?? null,
                'program_studi'             => $data['program_studi'] ?? null,
                'tahun_studi'              => $data['tahun_studi'] ?? null,
                'tempat_lahir'              => $data['tempat_lahir'],
                'tanggal_lahir'             => $data['tanggal_lahir'],
                'jenis_kelamin'             => $data['jenis_kelamin'],
                'no_wa'                     => $data['no_wa'],
                'provinsi'                  => $data['provinsi'],
                'kabupaten'                 => $data['kabupaten'],
                'kecamatan'                 => $data['kecamatan'],
                'kelurahan'                 => $data['kelurahan'],
            ];

            if (isset($data['profile_image']) && $data['profile_image'] instanceof \Illuminate\Http\UploadedFile) {
                $path = $data['profile_image']->store('img', 'public');
                $profileData['profile_image'] = $path;
            }

            $result = $this->userRepository->updateProfile($userId, $profileData);

            Log::info('User profile updated step 2', ['user_id' => $userId]);

            return $result;
        } catch (Exception $e) {
            Log::error('Update additional info error: ' . $e->getMessage(), [
                'exception' => $e,
                'user_id' => $userId
            ]);
            throw $e;
        }
    }

    /**
     * Handle user logout logic.
     */
    public function logout(): void
    {
        $userId = Auth::id();
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        Log::info('User logged out', ['user_id' => $userId]);
    }

    /**
     * Determine redirect route based on user roles.
     *
     * @param User $user
     * @return string
     */
    protected function getRedirectRoute(User $user): string
    {
        if ($user->hasRole('asesi')) {
            return route('asesi.dashboard');
        } elseif ($user->hasRole('admin')) {
            return route('admin.dashboard');
        } elseif ($user->hasRole('asesor')) {
            return route('asesor.dashboard');
        }
        return '/';
    }
}