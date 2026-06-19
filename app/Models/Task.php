<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'batch_id',
        'category',
        'title',
        'body',
        'image_path',
        'starts_at',
        'ends_at',
        'max_submissions',
        'created_by',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
    ];

    public function batch()
    {
        return $this->belongsTo(TaskBatch::class, 'batch_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function submissions()
    {
        return $this->hasMany(TaskSubmission::class, 'task_id');
    }

    public function isActive()
    {
        $now = now();
        return $now->between($this->starts_at, $this->ends_at);
    }

    public function getCategoryLabelAttribute()
    {
        return [
            'LITERASI_NUMERASI' => 'Literasi & Numerasi',
            'PCK' => 'PCK',
            'HOTS' => 'HOTS',
            'ALL' => 'Semua / Level A',
        ][$this->category] ?? $this->category;
    }

    public function getCategoryColorClassAttribute()
    {
        return [
            'LITERASI_NUMERASI' => 'bg-blue-50 text-blue-500',
            'PCK' => 'bg-green-50 text-green-500',
            'HOTS' => 'bg-purple-50 text-purple-500',
            'ALL' => 'bg-gray-50 text-gray-500',
        ][$this->category] ?? 'bg-gray-50 text-gray-500';
    }
}
