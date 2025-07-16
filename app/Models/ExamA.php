<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExamA extends Model
{

    use HasFactory;
    protected $table = 'exams_a';

    protected $fillable = [
        'user_id',
        'category_a_id',
        'status',
        'score',
        'start_time',
        'end_time',
        'is_passed',
        'duration',

        'total_questions',

        'unanswered_questions',
        'correct_answers',
        'wrong_answers',

    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categoryA()
    {
        return $this->belongsTo(CategoryA::class, 'category_a_id');
    }

    public function questionsA()
    {
        return $this->belongsToMany(QuestionA::class, 'exam_question_a')
            ->withPivot('user_answer', 'is_correct')
            ->withTimestamps();
    }

    public function calculateScore(): int
    {
        return $this->questionsA()
            ->wherePivot('is_correct', true)
            ->count();
    }

    public function examsA()
    {
        return $this->hasMany(ExamA::class, 'category_a_id');
    }
}

