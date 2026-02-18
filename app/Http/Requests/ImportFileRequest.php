<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportFileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'file' => [
                'required',
                'file',
                'mimes:csv,xlsx,xls,txt',
                'max:10240', // 10MB
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'file.required' => 'File harus dipilih.',
            'file.file' => 'Input harus berupa file.',
            'file.mimes' => 'File harus berformat CSV, Excel (xlsx/xls), atau TXT.',
            'file.max' => 'Ukuran file maksimal 10MB.',
        ];
    }
}