<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class AsesiStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->hasRole('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // 'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email|lowercase',
            'password' => 'required|string|min:8|',
            'nik' => 'nullable|digits_between:1,17|string',
            'nama_depan' => 'nullable|string|max:255',
            'instansi' => 'nullable|string|max:255',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|string',
            'no_wa' => 'nullable|numeric|digits_between:1,15',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'provinsi' => 'nullable|string|max:255',
            'kabupaten' => 'nullable|string|max:255',
            'kelurahan' => 'nullable|string|max:255',
            'kecamatan' => 'nullable|string|max:255',
            'custom_instansi' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 8 karakter',
            'nik.digits_between' => 'NIK harus berupa angka dengan panjang 1-17 digit',
            'no_wa.numeric' => 'Nomor WhatsApp harus berupa angka',
            'profile_image.image' => 'File harus berupa gambar',
            'profile_image.max' => 'Ukuran file maksimal 2MB',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'email' => Str::lower($this->email), 
            'name' => trim($this->name), 
        ]);
    }
}
