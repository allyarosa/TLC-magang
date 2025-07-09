<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswerC extends Model
{
    use HasFactory;

    protected $table = 'user_answers_c';

    protected $fillable = [
        'user_id',
        'question_c_id',
        'answer',
        'score',
        'comment_asesor',
        'is_completed',
        'completed_at'
    ];

    protected $casts = [
        'completed_at' => 'datetime',
        'is_completed' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(QuestionC::class);
    }
}
