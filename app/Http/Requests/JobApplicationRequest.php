<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobApplicationRequest extends FormRequest
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
            'cv' => 'required|file|mimes:pdf,doc,docx|max:5120', // 5MB
            'cover_letter' => 'nullable|string|min:50|max:3000',
            'linkedin_url' => 'nullable|url|max:500',
            'years_experience' => 'nullable|numeric|min:0|max:50',
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
                'phone.required' => 'رقم الهاتف مطلوب',
                'phone.regex' => 'رقم الهاتف غير صحيح',
                'cv.required' => 'السيرة الذاتية مطلوبة',
                'cv.file' => 'يجب أن تكون السيرة الذاتية ملف',
                'cv.mimes' => 'السيرة الذاتية يجب أن تكون بصيغة PDF أو DOC أو DOCX',
                'cv.max' => 'حجم السيرة الذاتية يجب أن لا يتجاوز 5 ميجابايت',
                'cover_letter.min' => 'خطاب التغطية يجب أن يكون أكثر من 50 حرف',
                'linkedin_url.url' => 'رابط LinkedIn غير صحيح',
                'years_experience.numeric' => 'سنوات الخبرة يجب أن تكون رقم',
            ];
        }
        
        return [
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 2 characters',
            'name.max' => 'Name must be less than 100 characters',
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'phone.required' => 'Phone number is required',
            'phone.regex' => 'Phone number is invalid',
            'cv.required' => 'CV is required',
            'cv.file' => 'CV must be a file',
            'cv.mimes' => 'CV must be a PDF, DOC or DOCX file',
            'cv.max' => 'CV size must not exceed 5 MB',
            'cover_letter.min' => 'Cover letter must be at least 50 characters',
            'linkedin_url.url' => 'LinkedIn URL is invalid',
            'years_experience.numeric' => 'Years of experience must be a number',
        ];
    }
}
