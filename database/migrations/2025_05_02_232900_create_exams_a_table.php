<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('exams_a', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_a_id')->constrained('categories_a')->onDelete('cascade');
            $table->enum('status', ['started', 'finished'])->default('started');

            $table->integer('score')->nullable();

            $table->integer('total_questions')->default(0); 
            $table->integer('unanswered_questions')->default(0); 
            $table->integer('correct_answers')->default(0); 
            $table->string('duration')->default(0); 
            $table->integer('wrong_answers')->default(0); 

            $table->boolean('is_passed')->default(false)->nullable();
            $table->timestamp('start_time');
            $table->timestamp('end_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams_a');
    }
};