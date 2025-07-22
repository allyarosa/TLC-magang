<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LevelCHistory extends Model
{
    protected $fillable = [
        'user_id',
        'url_video',
        'description',
        'score',
        'comment_asesor',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

