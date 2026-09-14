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
        Schema::create('batch_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_batch_id')->constrained('task_batches')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->enum('assignment_type', ['manual', 'auto'])->default('manual');
            $table->timestamp('assigned_at')->nullable();
            $table->timestamps();

            $table->unique(['task_batch_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batch_user');
    }
};
