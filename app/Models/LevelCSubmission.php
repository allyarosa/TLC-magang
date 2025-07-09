<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LevelCSubmission extends Model
{
    protected $table = 'level_c_submissions';

    protected $fillable = [
        'user_id',
        'category',
        'url_video',
        'description',
        'is_passed',
        'comment_asesor',
        'score',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}