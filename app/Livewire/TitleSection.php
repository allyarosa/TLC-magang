<?php

namespace App\Livewire;

use Livewire\Component;

class TitleSection extends Component
{

    public string $title;
    public string $subTitle;

    public function mount(string $title, string $subTitle)
    {
        $this->title = $title;
        $this->subTitle = $subTitle;
    }
    public function render()
    {
        return view('livewire.title-section');
    }
}
