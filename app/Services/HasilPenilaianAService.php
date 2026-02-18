<?php

namespace App\Services;

use App\Models\User;
use App\Models\ExamA;
use App\Models\CategoryA;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HasilPenilaianAService
{
    protected int $defaultPassingScore = 70;


    public function getIndexData($request): array
    {
        $search     = $request->input('search');
        $categories = CategoryA::all();

        $users = User::with(['examsA'])
            ->whereHas('examsA', function ($q) {
                $q->where('status', 'finished');
            })
            ->when($search, function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
            })
            ->orderBy('name')
            ->paginate(10);

        return [
            'users'           => $users,
            'categories'      => $categories,
            'examResults'     => $this->buildExamResults($users, $categories),
            'search'          => $search,
            'totalResponden'  => $this->getTotalResponden(),
            'totalLulus'      => $this->getTotalLulus(),
            'totalGagal'      => $this->getTotalGagal(),
        ];
    }


    public function getUserEditData(int $userId): array
    {
        $user       = User::findOrFail($userId);
        $categories = CategoryA::all();

        $exams = ExamA::where('user_id', $userId)
            ->where('status', 'finished')
            ->get()
            ->keyBy('category_a_id');

        $scores = [];

        foreach ($categories as $category) {
            $exam = $exams->get($category->id);

            $scores[$category->id] = [
                'category_name'  => $category->name,
                'score'          => $exam?->score,
                'exam_id'        => $exam?->id,
                'passing_score'  => $category->passing_score ?? $this->defaultPassingScore,
            ];
        }

        return compact('user', 'categories', 'scores');
    }


    public function updateUserScores($request, int $userId): void
    {
        Log::info('Updating user scores', ['user_id' => $userId]);
        
        $categories = CategoryA::all();
        $updated = 0;

        foreach ($categories as $category) {
            $score = $request->input('score_' . $category->id);

            if ($score !== null && $score !== '') {
                ExamA::updateOrCreate(
                    [
                        'user_id'       => $userId,
                        'category_a_id' => $category->id,
                    ],
                    [
                        'score'     => $score,
                        'is_passed' => $score >= ($category->passing_score ?? $this->defaultPassingScore),
                        'status'    => 'finished',
                    ]
                );
                $updated++;
            }
        }

        Log::info('User scores updated successfully', ['user_id' => $userId, 'categories_updated' => $updated]);
    }


    public function updateSingleExam(array $data, int $id): void
    {
        ExamA::findOrFail($id)->update($data);
    }


    public function deleteExam(int $id): void
    {
        $exam = ExamA::findOrFail($id);
        Log::info('Deleting exam', ['exam_id' => $id, 'user_id' => $exam->user_id, 'category_id' => $exam->category_a_id]);
        $exam->delete();
        Log::info('Exam deleted successfully', ['exam_id' => $id]);
    }


    public function getExportData(): Collection
    {
        return User::with(['examsA.categoryA'])
            ->whereHas('examsA', function ($q) {
                $q->where('status', 'finished');
            })
            ->get();
    }


    private function buildExamResults($users, $categories): array
    {
        $results = [];

        foreach ($users as $user) {
            foreach ($categories as $category) {
                $exam = $user->examsA
                    ->where('category_a_id', $category->id)
                    ->first();

                $results[$user->id][$category->name] = [
                    'score'     => $exam?->score,
                    'is_passed' => $exam
                        ? $exam->score >= ($category->passing_score ?? $this->defaultPassingScore)
                        : null,
                ];
            }
        }

        return $results;
    }


    private function getTotalResponden(): int
    {
        return User::whereHas('examsA', function ($q) {
            $q->where('status', 'finished');
        })->count();
    }

    private function getTotalLulus(): int
    {
        return ExamA::where('status', 'finished')
            ->where('is_passed', true)
            ->count();
    }

    private function getTotalGagal(): int
    {
        return ExamA::where('status', 'finished')
            ->where('is_passed', false)
            ->count();
    }
}
