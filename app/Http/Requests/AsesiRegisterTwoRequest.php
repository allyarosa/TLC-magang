<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsesiRegisterTwoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Identitas Diri
            'nik'                       => ['nullable', 'numeric', 'digits_between:16,16'],
            'nama'                      => ['required', 'string', 'max:255'],
            'tempat_lahir'              => ['required', 'string'],
            'tanggal_lahir'             => ['required', 'date'],
            'jenis_kelamin'             => ['required', 'in:L,P'],
            // no_wa sudah dikumpulkan di halaman register (Step 1)

            // Pekerjaan & Instansi
            'instansi'                  => ['required', 'string'],
            'custom_instansi'           => ['nullable', 'string', 'max:255'],
            'profesi'                   => ['required', 'string', 'max:255'],
            'lama_masa_kerja'           => ['nullable', 'string', 'max:100'],

            // Pendidikan
            'latar_belakang_pendidikan' => ['nullable', 'string', 'max:100'],
            'nama_universitas'          => ['nullable', 'string', 'max:255'],
            'program_studi'             => ['nullable', 'string', 'max:255'],
            'tahun_studi'              => ['nullable', 'string', 'max:50'],

            // Wilayah
            'provinsi'                  => ['required', 'string'],
            'kabupaten'                 => ['required', 'string'],
            'kecamatan'                 => ['required', 'string'],
            'kelurahan'                 => ['required', 'string'],

            // Foto Profil
            'profile_image'             => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required'          => 'Nama depan wajib diisi.',
            'tempat_lahir.required'  => 'Tempat lahir wajib diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'no_wa.required'         => 'Nomor WhatsApp wajib diisi.',
            'instansi.required'      => 'Instansi wajib dipilih.',
            'profesi.required'       => 'Profesi wajib diisi.',
            'provinsi.required'      => 'Provinsi wajib dipilih.',
            'kabupaten.required'     => 'Kabupaten/Kota wajib dipilih.',
            'kecamatan.required'     => 'Kecamatan wajib dipilih.',
            'kelurahan.required'     => 'Kelurahan wajib dipilih.',
        ];
    }
}
