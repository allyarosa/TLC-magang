<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamSessionC extends Model
{
    use HasFactory;

    protected $table = 'exam_sessions_c';

    protected $fillable = [
        'user_id',
        'started_at',
        'completed_at',
        'is_completed',
        'total_score',
    ];
}
