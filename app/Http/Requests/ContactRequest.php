<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'phone' => 'nullable|string|max:20|regex:/^[\+]?[0-9\s\-\(\)]+$/',
            'company' => 'nullable|string|max:100',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|max:2000|min:10',
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
                'name.required' => 'الاسم مطلوب',
                'name.min' => 'الاسم يجب أن يكون أكثر من حرفين',
                'name.max' => 'الاسم يجب أن يكون أقل من 100 حرف',
                'email.required' => 'البريد الإلكتروني مطلوب',
                'email.email' => 'البريد الإلكتروني غير صحيح',
                'phone.regex' => 'رقم الهاتف غير صحيح',
                'subject.required' => 'الموضوع مطلوب',
                'subject.max' => 'الموضوع يجب أن يكون أقل من 200 حرف',
                'message.required' => 'الرسالة مطلوبة',
                'message.min' => 'الرسالة يجب أن تكون أكثر من 10 أحرف',
                'message.max' => 'الرسالة يجب أن تكون أقل من 2000 حرف',
            ];
        }
        
        return [
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 2 characters',
            'name.max' => 'Name must be less than 100 characters',
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'phone.regex' => 'Phone number is invalid',
            'subject.required' => 'Subject is required',
            'subject.max' => 'Subject must be less than 200 characters',
            'message.required' => 'Message is required',
            'message.min' => 'Message must be at least 10 characters',
            'message.max' => 'Message must be less than 2000 characters',
        ];
    }
}
