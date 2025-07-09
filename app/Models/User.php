<?php

namespace App\Models;
use Laravel\Sanctum\HasApiTokens;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles, CanResetPasswordTrait, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'last_seen_at',
        'remember_token',
        'email_verified_at',
        'remember'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function userProfile()
    {
        return $this->hasOne(UserProfile::class);
    }

    // In App\Models\User

    public function asesorProfile()
    {
        return $this->hasOne(AsesorProfile::class);
    }

    public function adminsProfile()
    {
        return $this->hasOne(\App\Models\AdminsProfile::class, 'user_id', 'id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function LevelBSubmission()
    {
        return $this->hasMany(LevelBSubmission::class);
    }
    public function isProfileComplete()
    {
        if (!$this->userProfile) {
            return false;
        }

        // Define required fields
        $requiredFields = [
            'nama_depan',
            'no_wa',
            'tempat_lahir',
            'tanggal_lahir',
            'jenis_kelamin',
            // 'instansi',
            // 'profesi',
            // 'latar_belakang_pendidikan',
            // 'nama_universitas'
        ];

        foreach ($requiredFields as $field) {
            if (empty($this->userProfile->$field)) {
                return false;
            }
        }

        return true;
    }
    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }

    public function userAnswers()
    {
        return $this->hasMany(UserAnswerC::class);
    }

    public function examSessions()
    {
        return $this->hasMany(ExamSessionC::class);
    }


}
