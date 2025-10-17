<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpsertDatasetRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'source' => ['required', 'string', 'max:100'],
            'dataset' => ['required', 'string', 'max:100'],
            'keys' => ['required', 'array'],
            'records' => ['required', 'array'],
            'records.*' => ['array'],
        ];
    }
}
