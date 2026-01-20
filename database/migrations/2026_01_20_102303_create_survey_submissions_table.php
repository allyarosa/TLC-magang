<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('survey_submissions', function (Blueprint $table) {
            $table->id();
            
            // Relasi ke User (Data Nama, WA, Gender, Pendidikan diambil lewat relasi ini)
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

            // No. 3: Usia
            $table->string('umur_range'); 

            // No. 6: Status Pekerjaan
            $table->string('status_pekerjaan');

            // No. 7: Nama Instansi (Nullable karena jika 'Belum Bekerja', ini kosong)
            $table->string('tempat_bekerja');

            // No. 10: Tujuan (Checkbox - Disimpan sebagai JSON Array)
            $table->json('tujuan_sertifikasi'); 
            
            // --- BAGIAN B: SKALA LIKERT (No 1-5, Kolom Statis) ---
            // Menggunakan TinyInteger karena nilainya hanya 1-4
            
            $table->unsignedTinyInteger('rating_materi')->comment('Q1: Materi sesuai');
            $table->unsignedTinyInteger('rating_trainer')->comment('Q2: Trainer jelas');
            $table->unsignedTinyInteger('rating_uji')->comment('Q3: Uji adil');
            $table->unsignedTinyInteger('rating_peningkatan_kompetensi')->comment('Q4: Kompetensi meningkat');
            $table->unsignedTinyInteger('rating_penerapan')->comment('Q5: Penerapan kerja');

            // --- BAGIAN C: PERTANYAAN TERBUKA (No 6-8, Esai) ---
            
            // No. 6 (Esai)
            $table->text('essay_perubahan')->nullable();
            
            // No. 7 (Esai)
            $table->text('essay_manfaat')->nullable();
            
            // No. 8 (Esai - Saran)
            $table->text('essay_saran')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('survey_submissions');
    }
};