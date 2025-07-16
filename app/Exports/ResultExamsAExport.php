<?php

namespace App\Exports;

use App\Models\ResultA;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ResultExamsAExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return ResultA::with('user', 'categoryA')
            ->get()
            ->map(function ($result) {
                return [
                    'user_name' => optional($result->user)->name,
                    'category_name' => optional($result->categoryA)->name,
                    'status' => $result->status,
                    'score' => $result->score,
                    'total_questions' => $result->total_questions,
                    'unanswered_questions' => $result->unanswered_questions,
                    'correct_answers' => $result->correct_answers,
                    'duration' => $result->duration,
                    'wrong_answers' => $result->wrong_answers,
                    'is_passed' => $result->is_passed,
                    'start_time' => $result->start_time,
                    'end_time' => $result->end_time,
                ];
            });
    }

    public function headings(): array
    {
        return ['Nama', 'Category', 'Status', 'Score', 'Total Questions', 'Unanswered Questions', 'Correct Answers', 'Durations', 'Wrong Answers', 'Is Passed', 'Start Time', 'End Time'];
    }
}
