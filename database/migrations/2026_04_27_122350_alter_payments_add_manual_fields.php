<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            // Mode pembayaran yang digunakan saat transaksi dibuat
            $table->string('payment_method')->default('midtrans')->after('status');

            // Upload bukti transfer (path ke file di storage/public)
            $table->string('transfer_proof')->nullable()->after('payment_method');

            // Timestamp dan admin yang mengkonfirmasi pembayaran manual
            $table->timestamp('confirmed_at')->nullable()->after('transfer_proof');
            $table->foreignId('confirmed_by')->nullable()->constrained('users')->nullOnDelete()->after('confirmed_at');
        });
    }

    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign(['confirmed_by']);
            $table->dropColumn([
                'payment_method',
                'transfer_proof',
                'confirmed_at',
                'confirmed_by',
            ]);
        });
    }
};
