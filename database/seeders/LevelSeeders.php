<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            [
                'level_name' => 'A',
                'price' => 100000,
                'discount' => 10,
                'final_price' => 90000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'level_name' => 'B',
                'price' => 150000,
                'discount' => 15,
                'final_price' => 127500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'level_name' => 'C',
                'price' => 200000,
                'discount' => 0,
                'final_price' => 200000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'level_name' => 'BUNDLING',
                'price' => 400000,
                'discount' => 20,
                'final_price' => 320000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($levels as $level) {
            Level::create($level);
        }
    }
}
