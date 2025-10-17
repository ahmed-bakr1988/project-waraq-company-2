<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuoteRequest extends FormRequest
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
            'name' => 'required|string|max:100|min:2',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20|regex:/^[\+]?[0-9\s\-\(\)]+$/',
            'company' => 'required|string|max:100',
            'project_type' => 'required|string|max:100',
            'budget_range' => 'nullable|string|max:50',
            'timeline' => 'nullable|string|max:100',
            'description' => 'required|string|max:3000|min:20',
            'requirements' => 'nullable|string|max:2000',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'الاسم مطلوب',
            'name.min' => 'الاسم يجب أن يكون أكثر من حرفين',
            'name.max' => 'الاسم يجب أن يكون أقل من 100 حرف',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'البريد الإلكتروني غير صحيح',
            'phone.required' => 'رقم الهاتف مطلوب',
            'phone.regex' => 'رقم الهاتف غير صحيح',
            'company.required' => 'اسم الشركة مطلوب',
            'project_type.required' => 'نوع المشروع مطلوب',
            'description.required' => 'وصف المشروع مطلوب',
            'description.min' => 'وصف المشروع يجب أن يكون أكثر من 20 حرف',
            'description.max' => 'وصف المشروع يجب أن يكون أقل من 3000 حرف',
        ];
    }
}
