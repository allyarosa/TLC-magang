<?php

namespace App\Services;

use App\Models\User;
use App\Models\ExamA;
use App\Models\CategoryA;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class HasilPenilaianAService
{
    protected int $defaultPassingScore = 70;


    public function getIndexData($request): array
    {
        $search     = $request->input('search');
        $status     = $request->input('status'); // 'lulus' atau 'tidak_lulus'
        $categories = CategoryA::all();

        // Get all users with exams first
        $allUsersQuery = User::with(['examsA'])
            ->whereHas('examsA', function ($q) {
                $q->where('status', 'finished');
            })
            ->when($search, function ($q) use ($search) {
                $q->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%$search%")
                          ->orWhere('email', 'like', "%$search%");
                });
            })
            ->orderBy('name');

        // If status filter is applied, we need to filter after getting exam results
        if ($status === 'lulus' || $status === 'tidak_lulus') {
            $allUsers = $allUsersQuery->get();
            $examResults = $this->buildExamResultsForCollection($allUsers, $categories);
            
            // Filter users based on status
            $filteredUsers = $allUsers->filter(function ($user) use ($examResults, $status) {
                $isUserPassed = $examResults[$user->id]['is_user_passed'] ?? false;
                return $status === 'lulus' ? $isUserPassed : !$isUserPassed;
            });

            // Manual pagination for filtered results
            $page = $request->input('page', 1);
            $perPage = 10;
            $total = $filteredUsers->count();
            $items = $filteredUsers->slice(($page - 1) * $perPage, $perPage)->values();
            
            $users = new \Illuminate\Pagination\LengthAwarePaginator(
                $items,
                $total,
                $perPage,
                $page,
                ['path' => route('admin.level.a.hasil-penilaian')]
            );

            // Rebuild exam results for paginated users only
            $examResultsForPage = [];
            foreach ($items as $user) {
                $examResultsForPage[$user->id] = $examResults[$user->id];
            }

            return [
                'users'           => $users,
                'categories'      => $categories,
                'examResults'     => $examResultsForPage,
                'search'          => $search,
                'status'          => $status,
                'totalResponden'  => $this->getTotalResponden(),
                'totalLulus'      => $this->getTotalLulus(),
                'totalGagal'      => $this->getTotalGagal(),
            ];
        }

        $users = $allUsersQuery->paginate(10);

        return [
            'users'           => $users,
            'categories'      => $categories,
            'examResults'     => $this->buildExamResults($users, $categories),
            'search'          => $search,
            'status'          => $status,
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
            $userPassed = true; // Asumsi awal user lulus

            foreach ($categories as $category) {
                $exam = $user->examsA
                    ->where('category_a_id', $category->id)
                    ->first();

                $score = $exam ? $exam->score : null;
                $passingScore = $category->passing_score ?? $this->defaultPassingScore;

                // Jika ada satu kategori yang tidak lulus, maka user dianggap tidak lulus
                if ($score === null || $score < $passingScore) {
                    $userPassed = false;
                }

                $results[$user->id][$category->name] = [
                    'score'     => $score,
                    'is_passed' => $score !== null ? $score >= $passingScore : null,
                ];
            }

            // Tambahkan status kelulusan user secara keseluruhan
            $results[$user->id]['is_user_passed'] = $userPassed;
        }

        return $results;
    }


    /**
     * Build exam results for a Collection (used for filtering)
     */
    private function buildExamResultsForCollection($users, $categories): array
    {
        return $this->buildExamResults($users, $categories);
    }


    private function getTotalResponden(): int
    {
        return User::whereHas('examsA', function ($q) {
            $q->where('status', 'finished');
        })->count();
    }

    private function getTotalLulus(): int
    {
        $users = User::with(['examsA'])
            ->whereHas('examsA', function ($q) {
                $q->where('status', 'finished');
            })
            ->get();

        $categories = CategoryA::all();
        $totalLulus = 0;

        foreach ($users as $user) {
            $userPassed = true;

            foreach ($categories as $category) {
                $exam = $user->examsA
                    ->where('category_a_id', $category->id)
                    ->first();

                $score = $exam ? $exam->score : null;
                $passingScore = $category->passing_score ?? $this->defaultPassingScore;

                // Jika ada satu kategori yang tidak lulus, maka user dianggap tidak lulus
                if ($score === null || $score < $passingScore) {
                    $userPassed = false;
                    break; // Tidak perlu cek kategori lain
                }
            }

            if ($userPassed) {
                $totalLulus++;
            }
        }

        return $totalLulus;
    }

    private function getTotalGagal(): int
    {
        $users = User::with(['examsA'])
            ->whereHas('examsA', function ($q) {
                $q->where('status', 'finished');
            })
            ->get();

        $categories = CategoryA::all();
        $totalGagal = 0;

        foreach ($users as $user) {
            $userPassed = true;

            foreach ($categories as $category) {
                $exam = $user->examsA
                    ->where('category_a_id', $category->id)
                    ->first();

                $score = $exam ? $exam->score : null;
                $passingScore = $category->passing_score ?? $this->defaultPassingScore;

                // Jika ada satu kategori yang tidak lulus, maka user dianggap tidak lulus
                if ($score === null || $score < $passingScore) {
                    $userPassed = false;
                    break; // Tidak perlu cek kategori lain
                }
            }

            if (!$userPassed) {
                $totalGagal++;
            }
        }

        return $totalGagal;
    }
}
