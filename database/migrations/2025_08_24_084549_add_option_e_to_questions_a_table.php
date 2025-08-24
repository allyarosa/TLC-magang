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
        Schema::table('questions_a', function (Blueprint $table) {
            // Tambahin kolom option_e
            $table->text('option_e')->nullable()->after('option_d');

            // Ubah enum correct_answer jadi ada 'e'
            $table->enum('correct_answer', ['a', 'b', 'c', 'd', 'e'])->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('questions_a', function (Blueprint $table) {
            $table->dropColumn('option_e');
            $table->enum('correct_answer', ['a', 'b', 'c', 'd'])->change();
        });
    }
};
