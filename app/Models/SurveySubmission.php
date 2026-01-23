<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveySubmission extends Model
{
    protected $fillable = [
        'user_id',
        'umur_range',
        'status_pekerjaan',
        'tempat_bekerja',
        'tujuan_sertifikasi',
        'rating_materi',
        'rating_trainer',
        'rating_uji',
        'rating_peningkatan_kompetensi',
        'rating_penerapan',
        'essay_perubahan',
        'essay_manfaat',
        'essay_saran',
    ];

    protected $casts = [
        'tujuan_sertifikasi' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
