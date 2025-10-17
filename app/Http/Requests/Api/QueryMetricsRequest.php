<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class QueryMetricsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'metric' => ['required', 'string', 'max:100'],
            'from' => ['nullable', 'date'],
            'to' => ['nullable', 'date', 'after_or_equal:from'],
            'group_by' => ['nullable', 'string', 'max:50'],
            'filters' => ['nullable', 'array'],
        ];
    }
}
