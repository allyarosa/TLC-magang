<?php

namespace App\Livewire\Asesi\Dashboard;

use App\Models\Level;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DashboardInfoCard extends Component
{   
    public $title = '';
    public $description = '';
    public $buttonTitle = '';
    public $levelName = '';
    public $levels;
    public $isRoute = true;
    public $link = '';
    public function mount()
    {
        $levels = Level::all();
        $this->levels = $levels;
        $this->checkStatus();
    }

    public function checkStatus() 
    {
        $user = Auth::user();
        if($user && !$user->hasPermissionTo('access_level_A')) {
            $this->title = 'Pendaftaran Level A';
            $this->description = 'Kamu tinggal selangkah lagi menuju sertifikasi Level A Segera melakukan pendaftaran Level A untuk melanjutkan Perjalanan Kompetensimu!';
            $this->buttonTitle = 'Daftar Level A';
            $this->levelName = 'Level A';
            $this->isRoute = true;

        } else if($user && $user->hasPermissionTo('access_level_A')) {
            $this->title = 'Sertifikasi Level A Aktif ';
            $this->description = 'Selamat! Kamu sudah terdaftar di Level A. silahkan mengakses materi dan bergabung dengan grup WhatsApp yang nantinya akan dihubungi oleh admin Kami!';
            $this->buttonTitle = 'Akses Materi';
            $this->levelName = 'Level A';
            $this->isRoute = false;
            $this->link = 'https://chat.whatsapp.com/KF29IU1NbrHK6DaDMAXIeV'; 
        }
    }

    public function render()
    {
        return view('livewire.asesi.dashboard.dashboard-info-card');
    }

}
