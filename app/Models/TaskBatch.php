<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskBatch extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'start_date', 'end_date'];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class, 'batch_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'batch_user')
            ->withPivot('assignment_type', 'assigned_at')
            ->withTimestamps();
    }

    public function scopeActiveForDate($query, $date)
    {
        return $query->where('start_date', '<=', $date)->where('end_date', '>=', $date);
    }
}
