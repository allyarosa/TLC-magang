<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserAsesor;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AdminsProfile;
use App\Models\AsesorProfile;
use App\Models\UserProfile;
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

        UserProfile::updateOrCreate(
            ['user_id' => $user->id],
            [
                // Identitas Diri
                'nik' => '1234567891023456',
                'nama_depan' => 'Hamsa Akif Sanie',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1995-08-17',
                'jenis_kelamin' => 'L',
                'no_wa' => '081234567890',
                'profile_image' => 'blankProfile.png',

                // Pekerjaan
                'instansi' => 'Pemerintah Kota', 
                'custom_instansi' => null,              
                'profesi' => 'Staff Admin',     
                'lama_masa_kerja' => '3 Tahun',         

                // Pendidikan
                'latar_belakang_pendidikan' => 'S1',                    
                'nama_universitas' => 'Universitas Indonesia', 
                'program_studi' => 'Manajemen',             
                'tahun_studi' => '2018',                  

                // Alamat (string 30 semua)
                'provinsi' => 'DKI Jakarta',
                'kabupaten' => 'Jakarta Selatan',
                'kecamatan' => 'Cilandak',
                'kelurahan' => 'Cilandak Barat',
            ]
        );

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
            AdminPermissionSeeders::class,
            SiteInfoSeeder::class,
            // TaskBatchSeeder::class,
            // TaskSeeders::class,x`    
                // PaymentSeeders::class,
                // LevelBSeeders::class,
            // LevelCQuestionSeeders::class, // PRODUCTION COMMENT INI
            // CertificateSeeders::class, //PRODUCTION COMMENT INI
            // DummyDataSeeder::class, // PRODUCTION COMMENT INI
        ]);
    }
}