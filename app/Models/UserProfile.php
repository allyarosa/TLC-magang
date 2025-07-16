<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserProfile extends Model
{
    use HasFactory;
    
    protected $table = 'user_profiles';

    // Menambahkan kolom yang ada dalam migrasi ke dalam $fillable
    protected $fillable = [
        'user_id',
        'nik', //
        'nama_depan', //
        'instansi', // 

        'profesi', //
        'lama_masa_kerja',

        'latar_belakang_pendidikan',
        'nama_universitas',
        'program_studi',
        'tahun_studi',

        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'no_wa',
        'profile_image',
        'custom_instansi',
        
        'provinsi',
        'kabupaten',
        'kelurahan',
        'kecamatan',
    ];

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
