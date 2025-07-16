<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LevelBSubmission extends Model
{
    protected $table = 'level_b_submissions';

    protected $fillable = [
        'user_id',
        'file_ppt',
        'modul_ajar',
        'status',
        'comment_asesor',
        'score',
        'description',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
