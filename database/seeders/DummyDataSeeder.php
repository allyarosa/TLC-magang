<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\CategoryA;
use App\Models\ExamA;
use Illuminate\Support\Facades\Hash;

class DummyDataSeeder extends Seeder
{
    public function run()
    {
        // Create categories if not exist
        $categories = ['PCK', 'HOTS', 'Literasi', 'Numerasi'];
        foreach ($categories as $categoryName) {
            CategoryA::firstOrCreate(['name' => $categoryName], [
                'name' => $categoryName,
                'passing_score' => 70,
            ]);
        }

        // Create 11 dummy users
        for ($i = 1; $i <= 11; $i++) {
            $user = User::firstOrCreate(
                ['email' => "user$i@example.com"],
                [
                    'name' => "User $i",
                    'password' => Hash::make('password'),
                ]
            );

            // Assign random scores for each category
            foreach (CategoryA::all() as $category) {
                ExamA::create([
                    'user_id' => $user->id,
                    'category_a_id' => $category->id,
                    'score' => rand(50, 100),
                    'status' => 'finished',
                    'is_passed' => rand(50, 100) >= $category->passing_score,
                    'correct_answers' => rand(5, 10),
                    'wrong_answers' => rand(0, 5),
                    'start_time' => now(), // Added default value for start_time
                    'end_time' => now()->addMinutes(rand(30, 90)),
                ]);
            }
        }
    }
}