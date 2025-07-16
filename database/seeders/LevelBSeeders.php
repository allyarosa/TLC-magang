<?php

namespace Database\Seeders;

use App\Models\LevelBSubmission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelBSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = ['pending', 'reviewed', 'rejected'];
        for ($i = 1; $i <= 30; $i++) {
            LevelBSubmission::create([
                'user_id' => rand(1, 20), 
                'file_ppt' => 'file_ppt_' . $i . '.ppt',
                'modul_ajar' => 'Modul Ajar ' . $i,
                'description' => 'Deskripsi untuk submission ' . $i,
                'status' => $statuses[array_rand($statuses)],
                'comment_asesor' => $i % 2 == 0 ? 'Komentar untuk submission ' . $i : null, // Setiap submission genap memiliki komentar
                'score' => $i % 3 == 0 ? rand(60, 100) : null, // Setiap submission ketiga memiliki skor
            ]);
        }
    }
}
