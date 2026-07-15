<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;


class TaskSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $startDate = now()->subDay();
        $endDate = now()->addDay();

        for($i = 1; $i < 5; $i++) {
            Task::updateOrCreate([
                'batch_id' => 1,
                'category' => 'HOTS',
                'title' => 'Judul Tugas'. $i,
                'body' => 'Isi deskripsi tugas',
                'starts_at' => $startDate,
                'ends_at' => $endDate,
                'max_submissions' => 1,
                'created_by' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        };

        for($i = 0; $i < 4; $i++) {
            Task::updateOrCreate([
                'batch_id' => 1,
                'category' => 'PCK',
                'title' => 'Judul Tugas'. $i,
                'body' => 'Isi deskripsi tugas',
                'starts_at' => $startDate,
                'ends_at' => $endDate,
                'max_submissions' => 1,
                'created_by' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        };

         for($i = 0; $i < 4; $i++) {
            Task::updateOrCreate([
                'batch_id' => 1,
                'category' => 'LITERASI_NUMERASI',
                'title' => 'Judul Tugas'. $i,
                'body' => 'Isi deskripsi tugas',
                'starts_at' => $startDate,
                'ends_at' => $endDate,
                'max_submissions' => 1,
                'created_by' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        };
    }
}
