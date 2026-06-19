<?php

namespace Database\Seeders;

use App\Models\TaskBatch;
use Illuminate\Database\Seeder;

class TaskBatchSeeder extends Seeder
{
    public function run(): void
    {
        $startDate = now()->subMonths(6); // Mulai dari 6 bulan yang lalu agar bervariasi

        for ($i = 1; $i <= 30; $i++) {
            $endDate = (clone $startDate)->addDays(7); // Durasi batch 7 hari

            TaskBatch::create([
                'name' => "Batch $i",
                'start_date' => $startDate,
                'end_date' => $endDate,
            ]);

            // Setiap batch berikutnya berjarak 2 hari dari batch sebelumnya
            $startDate = (clone $endDate)->addDays(2);
        }
    }
}
