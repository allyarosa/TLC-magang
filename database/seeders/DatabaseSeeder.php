<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserAsesor;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AdminsProfile;
use App\Models\AsesorProfile;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            RolePermissionSeeders::class,
            IndoRegionSeeder::class
        ]);

        $user = User::firstOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'name' => 'user',
                'password' => bcrypt('password'),
                'status' => 'active',
                'last_seen_at' => now(),
                'email_verified_at' => now(),
            ]
        );
        $user->assignRole('asesi');
        // $user->givePermissionTo(('access_level_A'));


        $admin = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'), // password
            'last_seen_at' => now(),
            'status' => 'active',
            'email_verified_at' => now(),
        ]);
        $admin->assignRole('admin');

        AdminsProfile::create([
            'user_id' => $admin->id,
            'profile_image' => 'blankProfile.png',
        ]);


        $asesor = User::factory()->create([
            'name' => 'asesor',
            'email' => 'asesor@gmail.com',
            'password' => bcrypt('password'),
            'last_seen_at' => now(),
            'status' => 'active',
            'email_verified_at' => now(),
        ]);
        $asesor->assignRole('asesor');

        AsesorProfile::create([
            'user_id' => $asesor->id,
            'berkas_cv' => null,
            'profile_image' => 'blankProfile.png',
        ]);

        $this->call([
            UserSeeders::class,
            AsesorSeeders::class,
            CategoryASeeders::class,
            LevelSeeders::class,
            QuestionSeeders::class,
            
            // PaymentSeeders::class,
            // LevelBSeeders::class,
            LevelCQuestionSeeders::class,
        ]);
    }
}