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
            'instagram' => 'https://instagram.com/example',
            'linkedin' => 'https://linkedin.com/in/example',
            'facebook' => 'https://facebook.com/example',
            'youtube' => 'https://youtube.com/example',
            'whatsapp' => '81234567890',
            'email' => 'info@example.com',
            'address' => 'Jl. Contoh No. 123, Jakarta',
            'description' => 'Ini adalah deskripsi singkat perusahaan.',
        ]);
    }
}
