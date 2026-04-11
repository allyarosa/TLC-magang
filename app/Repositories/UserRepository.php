<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function create(array $data): User
    {
        return User::create([
            'name' => $data['name'] ?? null,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => $data['status'] ?? 'active',
        ]);
    }

    public function createProfile(array $data): UserProfile
    {
        return UserProfile::create($data);
    }

    public function updateProfile(int $userId, array $data): bool
    {
        return UserProfile::updateOrCreate(['user_id' => $userId], $data);
    }

    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }
}
