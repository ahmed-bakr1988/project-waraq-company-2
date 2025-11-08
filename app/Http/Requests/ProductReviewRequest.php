<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductReviewRequest extends FormRequest
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
            'rating' => 'required|integer|min:1|max:5',
            'title' => 'nullable|string|max:200',
            'comment' => 'required|string|min:10|max:2000',
            'reviewer_name' => 'required|string|max:100',
            'reviewer_email' => 'required|email|max:255',
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
                'rating.required' => 'التقييم مطلوب',
                'rating.integer' => 'التقييم يجب أن يكون رقم',
                'rating.min' => 'التقييم يجب أن يكون على الأقل 1',
                'rating.max' => 'التقييم يجب أن لا يتجاوز 5',
                'comment.required' => 'التعليق مطلوب',
                'comment.min' => 'التعليق يجب أن يكون أكثر من 10 أحرف',
                'comment.max' => 'التعليق يجب أن يكون أقل من 2000 حرف',
                'reviewer_name.required' => 'الاسم مطلوب',
                'reviewer_email.required' => 'البريد الإلكتروني مطلوب',
                'reviewer_email.email' => 'البريد الإلكتروني غير صحيح',
            ];
        }
        
        return [
            'rating.required' => 'Rating is required',
            'rating.integer' => 'Rating must be a number',
            'rating.min' => 'Rating must be at least 1',
            'rating.max' => 'Rating must not exceed 5',
            'comment.required' => 'Comment is required',
            'comment.min' => 'Comment must be at least 10 characters',
            'comment.max' => 'Comment must be less than 2000 characters',
            'reviewer_name.required' => 'Name is required',
            'reviewer_email.required' => 'Email is required',
            'reviewer_email.email' => 'Email is invalid',
        ];
    }
}
