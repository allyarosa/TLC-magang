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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('batch_id')->constrained('task_batches')->onDelete('cascade');
            $table->enum('category', ['ALL', 'HOTS', 'PCK', 'LITERASI_NUMERASI']);
            $table->string('title');
            $table->text('body');
            $table->string('image_path')->nullable();
            $table->datetime('starts_at');
            $table->datetime('ends_at');
            $table->integer('max_submissions')->default(1);
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
