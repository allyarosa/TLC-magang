<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_profiles', function (Blueprint $table) {

            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->char('nik', 20)->nullable();
            $table->string('nama_depan', 30)->nullable();
            $table->string('instansi', 50)->nullable();

            $table->string('profesi', 50)->nullable();
            $table->string('lama_masa_kerja', 50)->nullable();

            $table->string('latar_belakang_pendidikan', 50)->nullable();
            $table->string('nama_universitas', 50)->nullable();
            $table->string('program_studi', 50)->nullable();
            $table->string('tahun_studi', 50)->nullable();

            $table->string('tempat_lahir', 25)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->char('no_wa', 13)->nullable();
            $table->string('profile_image', 150)->nullable();
            $table->string('custom_instansi', 40)->nullable();

            $table->string('provinsi', 30)->nullable();
            $table->string('kecamatan', 30)->nullable();
            $table->string('kabupaten', 30)->nullable();
            $table->string('kelurahan', 30)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
