<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AsesiExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    // public function collection()
    // {
    //     return User::role('asesi')->get();
    // }

    public function collection()
    {
        return User::role('asesi')
            ->with('userProfile')
            ->get()
            ->map(function ($user) {
                return [
                    'name' => $user->name,
                    'email' => $user->email,
                    'nik' => "'" . optional($user->userProfile)->nik,
                    'nama_depan' => optional($user->userProfile)->nama_depan,
                    'instansi' => optional($user->userProfile)->instansi,
                    'tempat_lahir' => optional($user->userProfile)->tempat_lahir,
                    'tanggal_lahir' => optional($user->userProfile)->tanggal_lahir,
                    'jenis_kelamin' => optional($user->userProfile)->jenis_kelamin,
                    'provinsi' => optional($user->userProfile)->provinsi,
                    'kecamatan' => optional($user->userProfile)->kecamatan,
                    'kabupaten' => optional($user->userProfile)->kabupaten,
                    'kelurahan' => optional($user->userProfile)->kelurahan,
                    'no_wa' => "'" . optional($user->userProfile)->no_wa,
                    'custom_instansi' => optional($user->userProfile)->custom_instansi,
                ];
            });
    }

    public function headings(): array
    {
        return ['Nama', 'Email', 'NIK', 'Nama Depan', 'Instansi', 'Tempat Lahir', 'Tanggal Lahir', 'Jenis Kelamin', 'Provinsi', 'Kecamatan', 'Kabupaten', 'Kelurahan', 'Nomor Whatsapp', 'Custom Instansi'];
    }
}
