<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_a_id',
        'exam_a_id',
        'content',
        'rating',
        'is_approved',
        'is_featured',
        'approved_by',
        'approved_at'
    ];

    protected $casts = [
        'is_approved' => 'boolean',
        'is_featured' => 'boolean',
        'approved_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(CategoryA::class, 'category_a_id');
    }

    public function exam()
    {
        return $this->belongsTo(ExamA::class, 'exam_a_id');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}