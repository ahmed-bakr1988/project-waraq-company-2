<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsletterRequest extends FormRequest
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
            'email' => 'required|email|max:255',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        $locale = app()->getLocale();
        
        if ($locale === 'ar') {
            return [
                'email.required' => 'البريد الإلكتروني مطلوب',
                'email.email' => 'البريد الإلكتروني غير صحيح',
                'email.max' => 'البريد الإلكتروني يجب أن يكون أقل من 255 حرف',
            ];
        }
        
        return [
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'email.max' => 'Email must be less than 255 characters',
        ];
    }
}
