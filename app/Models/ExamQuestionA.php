<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExamQuestionA extends Model
{
     use HasFactory;
    protected $table = 'exam_question_a';

    protected $fillable = [
        'exam_a_id',
        'question_a_id',
        'user_answer',
        'is_correct',
    ];
}
