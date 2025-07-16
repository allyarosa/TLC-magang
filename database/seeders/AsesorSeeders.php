<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use App\Models\AsesorProfile;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AsesorSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('password'),
                'status' => 'active', 
            ])->assignRole('asesor');

            AsesorProfile::create([
                'user_id' => $user->id,
                'berkas_cv' => null,
                'profile_image' => 'blankProfile.png',
            ]);
        }
    }
}
