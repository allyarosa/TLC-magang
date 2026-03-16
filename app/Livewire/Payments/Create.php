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

    // Category selection for custom mode
    public $selectedCategories = [];

    // Pricing
    public $bundlePrice = 150000;
    public $categoryPrice = 65000;

    // Available categories
    public $categories = [
        [
            'id' => 'literasi',
            'name' => 'Literasi',
            'desc' => 'Kemampuan membaca dan memahami teks secara kritis',
            'tags' => ['Membaca kritis', 'Pemahaman teks'],
            'color' => 'teal'
        ],
        [
            'id' => 'numerasi',
            'name' => 'Numerasi',
            'desc' => 'Kemampuan berhitung dan numerasi dasar kontekstual',
            'tags' => ['Numerasi dasar', 'Logika matematika'],
            'color' => 'yellow'
        ],
        [
            'id' => 'pck',
            'name' => 'PCK',
            'desc' => 'Pedagogical Content Knowledge — cara terbaik mengajarkan konten',
            'tags' => ['Strategi pedagogi', 'Konten materi', 'Metode mengajar'],
            'color' => 'emerald'
        ],
        [
            'id' => 'hots',
            'name' => 'HOTS',
            'desc' => 'Higher Order Thinking Skills — mendorong berpikir tingkat tinggi',
            'tags' => ['Berpikir kritis', 'Analisis', 'Evaluasi'],
            'color' => 'purple'
        ]
    ];

    // Expand/collapse for detail section
    public $expandDetail = false;

    public function toggleExpand()
    {
        $this->expandDetail = !$this->expandDetail;
    }

    public function switchMode($mode)
    {
        $this->mode = $mode;
        // Reset selection when switching to bundle
        if ($mode === 'bundle') {
            $this->selectedCategories = [];
        }
    }
    
    public function toggleCategory($categoryId)
    {
        if (in_array($categoryId, $this->selectedCategories)) {
            $this->selectedCategories = array_values(array_filter($this->selectedCategories, fn($id) => $id !== $categoryId));
        } else {
            $this->selectedCategories[] = $categoryId;
        }
    }
    
    public function selectAllCategories()
    {
        $this->selectedCategories = array_column($this->categories, 'id');
    }
    
    public function resetSelection()
    {
        $this->selectedCategories = [];
    }
    
    public function getTotalPriceProperty()
    {
        if ($this->mode === 'bundle') {
            return $this->bundlePrice;
        }
        return count($this->selectedCategories) * $this->categoryPrice;
    }

    public function getCategoriesByIdProperty()
    {
        $map = [];
        foreach ($this->categories as $category) {
            $map[$category['id']] = $category;
        }
        return $map;
    }
    
    public function getSavingsProperty()
    {
        $customTotal = count($this->categories) * $this->categoryPrice;
        return $customTotal - $this->bundlePrice;
    }
    
    public function getSelectedCountProperty()
    {
        return count($this->selectedCategories);
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
