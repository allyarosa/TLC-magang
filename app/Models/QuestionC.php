<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionC extends Model
{
    use HasFactory;

    protected $table = 'questions_c';
    protected $fillable = [
        'title',
        'question',
        'order',
        'is_active',
        'image_url',
    ];

    public function userAnswers()
    {
        return $this->hasMany(UserAnswerC::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }
}
