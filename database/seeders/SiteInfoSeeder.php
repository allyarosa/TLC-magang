<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteInfo;

class SiteInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteInfo::create([
            'payment_method' => 'midtrans',
            'bank_name' => 'Bank Contoh',
            'bank_account_number' => '1234567890',
            'bank_account_name' => 'PT Contoh Perusahaan',
            'payment_instructions' => 'Silakan transfer ke rekening ini',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
