<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LevelCSubmission extends Model
{
    protected $table = 'level_c_submissions';

    protected $fillable = [
        'user_id',
        'question_c_id', // Added for linking to QuestionC
        'type',          // Added to differentiate essay/video
        'url_video',
        'description',
        'is_passed',
        'comment_asesor',
        'score',
        'status', // Ensure status is fillable
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function questionC()
    {
        return $this->belongsTo(QuestionC::class, 'question_c_id');
    }
}
