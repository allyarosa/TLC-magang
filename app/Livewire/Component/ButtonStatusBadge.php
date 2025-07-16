<?php

namespace App\Livewire\Component;

use Livewire\Component;

class ButtonStatusBadge extends Component
{
    public string $status = 'menunggu';

    public function render()
    {
        $statusMap = [
            'lulus' => ['text' => 'Lulus', 'bg' => 'bg-green-100', 'textColor' => 'text-green-800'],
            'menunggu' => ['text' => 'Menunggu Penilaian', 'bg' => 'bg-yellow-100', 'textColor' => 'text-yellow-800'],
            'tidak_lulus' => ['text' => 'Tidak Lulus', 'bg' => 'bg-red-100', 'textColor' => 'text-red-800'],
            'progress' => ['text' => 'Pending', 'bg' => 'bg-gray-100', 'textColor' => 'text-gray-800'],
            'belum_tersedia' => ['text' => 'Belum Tersedia', 'bg' => 'bg-gray-200', 'textColor' => 'text-gray-600'],
        ];
        
        $current = $statusMap[$this->status] ?? $statusMap['menunggu'];

        return view('livewire.component.button-status-badge', [
            'current' => $current,
        ]);
    }
}
