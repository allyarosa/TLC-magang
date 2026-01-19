<?php

namespace App\Imports;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class UsersImport implements ToModel, WithHeadingRow, WithValidation, SkipsEmptyRows
{
    /**
     * Prepare data before validation
     */
    public function prepareForValidation($data, $index)
    {
        return [
            'email' => trim($data['email'] ?? ''),
            'nama' => trim($data['nama'] ?? ''),
        ];
    }

    public function model(array $row)
    {
        $user = User::where('email', $row['email'])->first();

        if (!$user) {
            $user = User::create([
                'name' => $row['nama'],
                'email' => $row['email'],
                'password' => Hash::make('password123#'),
                'status' => 'active',
                'email_verified_at' => now(),
            ]);

            $user->assignRole('asesi');

            UserProfile::create([
                'user_id' => $user->id,
                'profile_image' => 'blankProfile.png',
                'nama_depan' => $row['nama'],
            ]);
        }
        
        
        $user->givePermissionTo($this->permissions);
        return $user;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email|max:255',
            'nama' => 'required|string|max:255',
        ];
    }

    public function customValidationMessages()
    {
        return [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'nama.required' => 'Nama wajib diisi',
        ];
    }

    protected $permissions;

    public function __construct($permissions)
    {
        $this->permissions = $permissions;
    }
}