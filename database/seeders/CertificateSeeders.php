<?php

namespace Database\Seeders;

use App\Models\Certificate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CertificateSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $certificateNames = [
            'Sertifikasi Keahlian Pemrograman Web',
            'Pelatihan Dasar Jaringan Komputer',
            'Workshop Manajemen Proyek Agile',
            'Sertifikasi Cloud Practitioner',
            'Pelatihan Desain UI/UX Fundamental',
            'Sertifikasi Analis Data Profesional'
        ];

        for ($i = 0; $i < 20; $i++) {
            Certificate::create([
                'user_id' => $faker->numberBetween(1, 10),

                'certificate_number' => 'CERT/' . date('Y') . '/' . $faker->unique()->randomNumber(7, true),

                'name' => $faker->randomElement($certificateNames),

                'issue_date' => $faker->dateTimeBetween('-3 years', 'now'),
                'download_count' => $faker->numberBetween(0, 100),
                'last_downloaded_at' => $faker->optional()->dateTimeBetween('-1 years', 'now'),
                'level_id' => $faker->numberBetween(1, 3),
            ]);
        }
    }
}
