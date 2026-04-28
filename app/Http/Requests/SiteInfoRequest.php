<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteInfoRequest extends FormRequest
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
            'instagram'           => 'nullable|string',
            'linkedin'            => 'nullable|string',
            'facebook'            => 'nullable|string',
            'youtube'             => 'nullable|string',
            'whatsapp'            => 'nullable|string',
            'email'               => 'nullable|email',
            'address'             => 'nullable|string',
            'description'         => 'nullable|string|max:500',

            // Payment settings
            'payment_method'      => 'required|in:midtrans,manual',
            'bank_name'           => 'nullable|string|max:100',
            'bank_account_number' => 'nullable|string|max:50',
            'bank_account_name'   => 'nullable|string|max:255',
            'payment_instructions'=> 'nullable|string|max:1000',
            'require_ig_follow_proof' => 'nullable|boolean',
        ];
    }
}