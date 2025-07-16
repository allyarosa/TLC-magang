<?php

namespace App\Livewire;

use App\Models\Regency;
use App\Models\Village;
use Livewire\Component;
use App\Models\District;
use App\Models\Province;
use Illuminate\Support\Facades\Auth;

class WilayahDropdown extends Component
{
    public $province_id, $regency_id, $district_id, $village_id;
    public $provinces = [], $regencys = [], $districts = [], $villages = [];

    // Tambahkan property untuk menerima nilai awal dari parent
    public $initialProvinceId = null;
    public $initialRegencyId = null;
    public $initialDistrictId = null;
    public $initialVillageId = null;

    public function updatedProvinceId($value)
    {
        if ($value) {
            $this->regencys = Regency::where('province_id', $value)->get()->toArray();
        } else {
            $this->regencys = [];
        }

        // Reset dependent fields hanya jika nilai berbeda dari yang tersimpan
        if ($value != $this->initialProvinceId) {
            $this->regency_id = null;
            $this->district_id = null;
            $this->village_id = null;
            $this->districts = [];
            $this->villages = [];
        }

        // Emit event untuk memberitahu parent component jika diperlukan
        $this->dispatch('wilayah-updated', [
            'province_id' => $this->province_id,
            'regency_id' => $this->regency_id,
            'district_id' => $this->district_id,
            'village_id' => $this->village_id
        ]);
    }

    public function updatedRegencyId($value)
    {
        if ($value) {
            $this->districts = District::where('regency_id', $value)->get()->toArray();
        } else {
            $this->districts = [];
        }

        // Reset dependent fields hanya jika nilai berbeda dari yang tersimpan
        if ($value != $this->initialRegencyId) {
            $this->district_id = null;
            $this->village_id = null;
            $this->villages = [];
        }

        // Emit event
        $this->dispatch('wilayah-updated', [
            'province_id' => $this->province_id,
            'regency_id' => $this->regency_id,
            'district_id' => $this->district_id,
            'village_id' => $this->village_id
        ]);
    }

    public function updatedDistrictId($value)
    {
        if ($value) {
            $this->villages = Village::where('district_id', $value)->get()->toArray();
        } else {
            $this->villages = [];
        }

        // Reset dependent field hanya jika nilai berbeda dari yang tersimpan
        if ($value != $this->initialDistrictId) {
            $this->village_id = null;
        }

        // Emit event
        $this->dispatch('wilayah-updated', [
            'province_id' => $this->province_id,
            'regency_id' => $this->regency_id,
            'district_id' => $this->district_id,
            'village_id' => $this->village_id
        ]);
    }

    public function updatedVillageId($value)
    {
        // Emit event saat village dipilih
        $this->dispatch('wilayah-updated', [
            'province_id' => $this->province_id,
            'regency_id' => $this->regency_id,
            'district_id' => $this->district_id,
            'village_id' => $this->village_id
        ]);
    }

    public function mount($province_id = null, $regency_id = null, $district_id = null, $village_id = null)
    {
        // Load provinces
        $this->provinces = Province::all()->toArray();

        // Set initial values dari parameter atau user profile
        $user = Auth::user();
        $profile = $user && $user->userProfile ? $user->userProfile : null;

        // Priority: parameter > old input > user profile
        $this->province_id = $province_id ?? old('province_id', $profile?->province_id);
        $this->regency_id = $regency_id ?? old('regency_id', $profile?->regency_id);
        $this->district_id = $district_id ?? old('district_id', $profile?->district_id);
        $this->village_id = $village_id ?? old('village_id', $profile?->village_id);

        // Store initial values untuk referensi
        $this->initialProvinceId = $this->province_id;
        $this->initialRegencyId = $this->regency_id;
        $this->initialDistrictId = $this->district_id;
        $this->initialVillageId = $this->village_id;

        // Load dependent data berdasarkan nilai yang ada
        $this->loadDependentData();
    }

    // Method yang dipanggil setelah component di-render
    public function hydrate()
    {
        // Refresh data from database jika belum ada
        if (!$this->province_id || !$this->regency_id || !$this->district_id || !$this->village_id) {
            $user = Auth::user();
            $profile = $user && $user->userProfile ? $user->userProfile : null;

            if ($profile) {
                $this->province_id = $this->province_id ?? $profile->province_id;
                $this->regency_id = $this->regency_id ?? $profile->regency_id;
                $this->district_id = $this->district_id ?? $profile->district_id;
                $this->village_id = $this->village_id ?? $profile->village_id;
            }
        }

        // Pastikan data dependent tetap loaded setelah hydration
        if ($this->province_id && empty($this->regencys)) {
            $this->regencys = Regency::where('province_id', $this->province_id)->get()->toArray();
        }

        if ($this->regency_id && empty($this->districts)) {
            $this->districts = District::where('regency_id', $this->regency_id)->get()->toArray();
        }

        if ($this->district_id && empty($this->villages)) {
            $this->villages = Village::where('district_id', $this->district_id)->get()->toArray();
        }
    }

    private function loadDependentData()
    {
        // Load regencies jika province_id ada
        if ($this->province_id) {
            $this->regencys = Regency::where('province_id', $this->province_id)->get()->toArray();
        }

        // Load districts jika regency_id ada
        if ($this->regency_id) {
            $this->districts = District::where('regency_id', $this->regency_id)->get()->toArray();
        }

        // Load villages jika district_id ada
        if ($this->district_id) {
            $this->villages = Village::where('district_id', $this->district_id)->get()->toArray();
        }
    }

    // Method untuk reset semua field
    public function resetFields()
    {
        $this->province_id = null;
        $this->regency_id = null;
        $this->district_id = null;
        $this->village_id = null;
        $this->regencys = [];
        $this->districts = [];
        $this->villages = [];

        // Reset initial values juga
        $this->initialProvinceId = null;
        $this->initialRegencyId = null;
        $this->initialDistrictId = null;
        $this->initialVillageId = null;
    }

    // Method untuk set nilai dari luar
    public function setValues($province_id = null, $regency_id = null, $district_id = null, $village_id = null)
    {
        $this->province_id = $province_id;
        $this->regency_id = $regency_id;
        $this->district_id = $district_id;
        $this->village_id = $village_id;

        // Update initial values
        $this->initialProvinceId = $province_id;
        $this->initialRegencyId = $regency_id;
        $this->initialDistrictId = $district_id;
        $this->initialVillageId = $village_id;

        $this->loadDependentData();
    }

    public function render()
    {
        return view('livewire.wilayah-dropdown');
    }
}
