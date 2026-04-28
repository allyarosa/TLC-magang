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
        Schema::table('site_infos', function (Blueprint $table) {
            $table->boolean('require_ig_follow_proof')->default(false)->after('payment_instructions');
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->string('ig_follow_proof')->nullable()->after('transfer_proof');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_infos', function (Blueprint $table) {
            $table->dropColumn('require_ig_follow_proof');
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn('ig_follow_proof');
        });
    }
};
