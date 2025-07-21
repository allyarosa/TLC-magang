<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LevelCSubmission;
use App\Models\User;

class LevelCSubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Find the first user with the 'asesi' role
        $asesiUser = User::whereHas('roles', function ($query) {
            $query->where('name', 'asesi');
        })->first();

        if ($asesiUser) {
            // Create a test submission for the essay category
            LevelCSubmission::create([
                'user_id' => $asesiUser->id,
                'type' => 'essay',
                'status' => 'pending',
                'category' => 'essay',
                'description' => 'Test submission for essay from seeder.',
                'url_video' => null,
                'is_passed' => 'pending',
                'comment_asesor' => null,
                'score' => null,
            ]);

            $this->command->info('Successfully seeded a test Level C essay submission.');
        } else {
            $this->command->error('Could not find an "asesi" user. Please run the UserSeeders first.');
        }
    }
}
