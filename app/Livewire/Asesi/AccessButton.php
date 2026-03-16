<?php

namespace App\Livewire\Asesi;

use Livewire\Component;

class AccessButton extends Component
{
    public $levels;
    public string $selectedLevel = '';
    private $viewMap = [
        'A' => 'livewire.asesi.access-button',
        'B' => 'livewire.asesi.dashboard.access-button-b',
        'C' => 'livewire.asesi.dashboard.access-button-c',
    ];

    public function mount($levels, $selectedLevel)
    {
        $this->levels = $levels;
        $this->selectedLevel = $selectedLevel;
    }

    public function render()
    {
        $view = $this->viewMap[$this->selectedLevel] ?? null;
        return $view ? view($view) : abort(404);
    }
}
