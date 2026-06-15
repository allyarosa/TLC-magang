<?php

namespace App\Livewire\Payments;

use App\Models\CategoryA;
use App\Models\Level;
use App\Models\SiteInfo;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Vinkla\Hashids\Facades\Hashids;

class Create extends Component
{
    public $level;
    public $viewName;
    public $paymentMode = 'midtrans'; // 'midtrans' | 'manual'
    public $siteInfo;

    public $mode = 'bundle';

    // Category selection for custom mode
    public $selectedCategories = [];

    // Pricing
    public $bundlePrice = 150000;
    public $categoryPrice = 65000;
    public $realPrice = [];

    // Available categories
    public $categories = [
        [
            'id' => 'hots',
            'name' => 'HOTS',
            'desc' => 'Higher Order Thinking Skills',
            'tags' => ['Berpikir kritis', 'Analisis', 'Evaluasi'],
            'color' => 'purple'
        ],
        [

            'id' => 'pck',
            'name' => 'PCK',
            'desc' => 'Pedagogical Content Knowledge',
            'tags' => ['Strategi pedagogi', 'Konten materi', 'Metode mengajar'],
            'color' => 'emerald'
        ],
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
        ]
    ];

    // Expand/collapse for detail section
    public $expandDetail = false;
    public $hasPendingManualPayment = false;
    public $pendingPaymentId = null;

    // Voucher logic
    public $voucherCode = '';
    public $discountAmount = 0;
    public $voucherError = null;
    public $voucherSuccess = null;

    public function applyVoucher()
    {
        $this->reset(['voucherError', 'voucherSuccess', 'discountAmount']);
        
        if (empty($this->voucherCode)) {
            return;
        }

        try {
            $voucherService = app(\App\Services\VoucherService::class);
            $voucher = $voucherService->validateVoucher($this->voucherCode);
            
            $this->discountAmount = $voucherService->calculateDiscount($voucher, $this->totalPrice);
            $this->voucherSuccess = 'Voucher berhasil diaplikasikan!';
        } catch (\Exception $e) {
            $this->voucherError = $e->getMessage();
            $this->voucherCode = '';
            $this->discountAmount = 0;
        }
    }

    public function removeVoucher()
    {
        $this->reset(['voucherCode', 'discountAmount', 'voucherError', 'voucherSuccess']);
    }

    public function getFinalPriceProperty()
    {
        return max(0, $this->totalPrice - $this->discountAmount);
    }

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
        $total = 0;
        foreach ($this->categories as $category) {
            if (in_array($category['id'], $this->selectedCategories)) {
                $total += $category['price'] ?? $this->categoryPrice;
            }
        }
        return $total;
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
        $customTotal = 0;
        foreach ($this->categories as $category) {
            $customTotal += $category['price'] ?? $this->categoryPrice;
        }
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

        // Set bundle price from the level model
        $this->bundlePrice = $this->level->price ?? 150000;

        // Fetch dynamic category prices
        $dbCategories = CategoryA::all();
        foreach ($this->categories as &$cat) {
            $dbCat = $dbCategories->firstWhere('name', strtoupper($cat['id']));
            if ($dbCat) {
                $cat['price'] = $dbCat->price;
                $cat['db_id'] = $dbCat->id;
            } else {
                $cat['price'] = $this->categoryPrice; // Fallback
            }
        }
        unset($cat);

        // Baca mode pembayaran aktif dari SiteInfo
        $this->siteInfo = SiteInfo::getPaymentSettings();
        $this->paymentMode = $this->siteInfo->payment_method ?? 'midtrans';

        if (auth()->check()) {
            $pendingManual = \App\Models\Payment::where('user_id', auth()->id())
                ->where('level_id', $this->level->id)
                ->where('payment_method', 'manual')
                ->where('status', 'waiting_confirmation')
                ->first();

            if ($pendingManual) {
                $this->hasPendingManualPayment = true;
                $this->pendingPaymentId = $pendingManual->id;
            }
        }

        // Restore pending payment state from session
        if (session()->has('pending_payment')) {
            $pending = session('pending_payment');
            if (isset($pending['mode'])) {
                $this->mode = $pending['mode'];
            }
            if (isset($pending['selected_categories']) && !empty($pending['selected_categories'])) {
                $this->selectedCategories = explode(',', $pending['selected_categories']);
            }
            // Clear session after restoring so it doesn't get stuck forever
            session()->forget('pending_payment');
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

    public function continueToRegister()
    {
        $hashId = Hashids::encode($this->level->id);

        return redirect()->route('register', ['checkout' => $hashId]);
    }

    public function render()
    {
        $layout = auth()->check() ? 'layouts.asesiDashboard' : 'layouts.app';

        return view($this->viewName, [
            'level' => $this->level,
            'paymentMode' => $this->paymentMode,
            'siteInfo' => $this->siteInfo,
        ])->extends($layout);
    }
}
