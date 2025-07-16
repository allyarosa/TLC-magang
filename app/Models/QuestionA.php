<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionA extends Model
{
    protected $table = 'questions_a';

    protected $fillable = [
        'category_a_id',
        'question_text',
        'image',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'correct_answer',
    ];

    public function categoryA()
    {
        return $this->belongsTo(CategoryA::class);
    }
}
