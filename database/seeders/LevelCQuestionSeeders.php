<?php

namespace Database\Seeders;

use App\Models\QuestionC;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelCQuestionSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'title' => 'Analisis Sistem Informasi',
                'question' => 'Jelaskan perbedaan antara sistem informasi berbasis web dan sistem informasi berbasis desktop. Berikan contoh masing-masing dan analisis keuntungan serta kekurangannya!',
                'order' => 1,
            ],
            [
                'title' => 'Manajemen Basis Data',
                'question' => 'Apa yang dimaksud dengan normalisasi database? Jelaskan tahapan normalisasi dari 1NF sampai 3NF beserta contoh implementasinya!',
                'order' => 2,
            ],
            [
                'title' => 'Pemrograman Web',
                'question' => 'Jelaskan konsep MVC (Model-View-Controller) dalam pengembangan aplikasi web. Berikan contoh implementasi sederhana menggunakan framework Laravel!',
                'order' => 3,
            ],
            [
                'title' => 'Keamanan Sistem',
                'question' => 'Sebutkan dan jelaskan minimal 5 jenis serangan keamanan yang dapat terjadi pada aplikasi web beserta cara pencegahannya!',
                'order' => 4,
            ],
            [
                'title' => 'Analisis Algoritma',
                'question' => 'Jelaskan perbedaan antara algoritma pencarian linear dan binary search. Berikan analisis kompleksitas waktu dan ruang untuk masing-masing algoritma!',
                'order' => 5,
            ],
            [
                'title' => 'Jaringan Komputer',
                'question' => 'Jelaskan model OSI (Open Systems Interconnection) dan fungsi dari masing-masing layer. Berikan contoh protokol yang bekerja di setiap layer!',
                'order' => 6,
            ],
            [
                'title' => 'Rekayasa Perangkat Lunak',
                'question' => 'Apa yang dimaksud dengan Software Development Life Cycle (SDLC)? Jelaskan tahapan-tahapan dalam SDLC dan metodologi pengembangan yang populer!',
                'order' => 7,
            ],
            [
                'title' => 'Teknologi Terkini',
                'question' => 'Jelaskan konsep cloud computing dan jenis-jenis layanan cloud (SaaS, PaaS, IaaS). Berikan contoh implementasi dan keuntungan menggunakan cloud computing!',
                'order' => 8,
            ],
        ];

        foreach ($questions as $question) {
            QuestionC::create($question);
        }
    }
}
