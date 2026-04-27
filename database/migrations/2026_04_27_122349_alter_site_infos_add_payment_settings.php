<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_infos', function (Blueprint $table) {
            // Mode pembayaran aktif: 'midtrans' atau 'manual'
            $table->string('payment_method')->default('midtrans')->after('description');

            // Data rekening bank (hanya digunakan saat mode manual)
            $table->string('bank_name')->nullable()->after('payment_method');
            $table->string('bank_account_number')->nullable()->after('bank_name');
            $table->string('bank_account_name')->nullable()->after('bank_account_number');
            $table->text('payment_instructions')->nullable()->after('bank_account_name');
        });
    }

    public function down(): void
    {
        Schema::table('site_infos', function (Blueprint $table) {
            $table->dropColumn([
                'payment_method',
                'bank_name',
                'bank_account_number',
                'bank_account_name',
                'payment_instructions',
            ]);
        });
    }
};
