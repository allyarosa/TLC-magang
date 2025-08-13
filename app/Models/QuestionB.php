<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionB extends Model
{
    protected $table = 'questions_b';

    protected $fillable = [
        'category_b_id',
        'question_text',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'correct_answer',
        'image',
    ];

    public function categoryB()
    {
        return $this->belongsTo(CategoryB::class);
    }
}