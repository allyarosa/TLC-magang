<?php

namespace App\Livewire\Component;

use Livewire\Component;

class ButtonCertificate extends Component
{

    public string $status = 'belum_tersedia';


    public function render()
    {

        $statusMap = [
            'lihat_sertifikat' => [
                'text' => 'Lihat Sertifikat',
                'class' => 'bg-gradient-to-r from-[#1D4E89] to-[#2A5AAF] hover:from-[#14406B] hover:to-[#1F4A92] text-white cursor-pointer',
                'disabled' => false,
            ],
            'belum_tersedia' => [
                'text' => 'Belum Tersedia',
                'class' => 'bg-gray-300 text-gray-500 cursor-not-allowed',
                'disabled' => true,
            ],
            'sedang_berjalan' => [
                'text' => 'Sedang Berjalan',
                'class' => 'bg-orange-100 text-[#E76F51] cursor-not-allowed',
                'disabled' => true,
            ],
        ];

        $button = $statusMap[$this->status] ?? $statusMap['belum_tersedia'];

        return view('livewire.component.button-certificate', [
            'button' => $button,
        ]);
    }
}
