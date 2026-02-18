<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserScoresRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [];
        
        // Dynamic validation for each category score
        foreach (request()->all() as $key => $value) {
            if (str_starts_with($key, 'score_')) {
                $rules[$key] = 'nullable|numeric|min:0|max:100';
            }
        }
        
        return $rules;
    }

    public function messages(): array
    {
        $messages = [];
        
        foreach (request()->all() as $key => $value) {
            if (str_starts_with($key, 'score_')) {
                $messages[$key . '.numeric'] = 'Nilai harus berupa angka.';
                $messages[$key . '.min'] = 'Nilai tidak boleh kurang dari 0.';
                $messages[$key . '.max'] = 'Nilai tidak boleh lebih dari 100.';
            }
        }
        
        return $messages;
    }
}