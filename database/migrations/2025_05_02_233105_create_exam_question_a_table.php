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
        Schema::create('exam_question_a', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_a_id')->constrained('exams_a')->onDelete('cascade');
            $table->foreignId('question_a_id')->constrained('questions_a')->onDelete('cascade');
            $table->enum('user_answer', ['a', 'b', 'c', 'd', 'e'])->nullable();
            $table->boolean('is_correct')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_question_a');
    }
};
