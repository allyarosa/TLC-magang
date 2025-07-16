<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LevelBHistory extends Model
{
    //
    protected $table = 'level_b_historys';

    protected $fillable = [
        'user_id',
        'category',
        'file_ppt',
        'modul_ajar',
        'comment_asesor',
        'score',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
