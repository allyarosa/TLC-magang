<?php

namespace Database\Seeders;

use App\Models\QuestionA;
use Illuminate\Database\Seeder;

class QuestionSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($categoryId = 1; $categoryId <= 4; $categoryId++) {
            for ($i = 1; $i <= 10; $i++) {
                QuestionA::create([
                    'category_a_id'    => $categoryId,
                    'question_text'    => "Apa yang akan terjadi jika kita mengulangi proses ke-$i pada kategori $categoryId dalam konteks pengembangan sistem?",
                    'image'            => rand(0, 1) ? 'contoh_img.png' : null,
                    'option_a'         => 'Proses akan menghasilkan output yang sama dengan input sebelumnya karena tidak ada perubahan pada sistem.',
                    'option_b'         => 'Proses akan gagal karena sistem tidak mendukung iterasi dalam kondisi saat ini.',
                    'option_c'         => 'Hasilnya akan berbeda tergantung pada parameter eksternal yang diberikan.',
                    'option_d'         => 'Proses tidak akan berjalan sama sekali karena telah mencapai batas maksimum.',
                    'correct_answer'   => 'C',
                ]);
            }
        }
    }
}
