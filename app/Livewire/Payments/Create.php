<?php

namespace App\Livewire\Payments;

use App\Models\Level;
use Livewire\Component;
use Vinkla\Hashids\Facades\Hashids;

class Create extends Component
{
    public $level;
    public $viewName;

    public $mode = 'bundle';

    public function switchMode($mode)
    {
        $this->mode = $mode;
    }

    public function mount($id)
    {
        $decoded = Hashids::decode($id);

        if (empty($decoded)) {
            abort(404, 'ID Tidak Valid');
        }

        $id = $decoded[0];
        $this->level = Level::find($id);

        if (!$this->level) {
            return redirect()->back()->with('error', 'Level tidak ditemukan');
        }

        switch ($id) {
            case 1:
                $this->viewName = 'livewire.payments.create';
                break;
            case 2:
                $this->viewName = 'livewire.payments.create-b';
                break;
            case 3:
                $this->viewName = 'livewire.payments.create-c';
                break;
            case 4:
                $this->viewName = 'livewire.payments.create-all';
                break;
            default:
                $this->viewName = 'livewire.payments.create';
        }
    }

    public function render()
    {
        return view($this->viewName, [
            'level' => $this->level,
        ])->extends('layouts.asesiDashboard');
    }
}
