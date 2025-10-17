<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

/**
 * طلب التحقق لعملية Upsert للمنتجات.
 *
 * - يسمح بإرسال منتج واحد عبر الحقل `product`، ويتم تحويله تلقائياً إلى مصفوفة `products` للتوحيد.
 * - يفرض قواعد التحقق على الحقول الأساسية والترجمات.
 */
class ProductUpsertRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        // السماح بتمرير عنصر مفرد عبر `product` وتحويله إلى `products` لتسهيل الاستهلاك من الأنظمة الخارجية
        if ($this->has('product') && ! $this->has('products')) {
            $product = $this->input('product');
            $this->merge([
                'products' => [$product],
            ]);
        }
    }

    public function rules(): array
    {
        return [
            'products' => ['required', 'array', 'min:1'],

            'products.*.id' => ['sometimes', 'integer', 'exists:products,id'],
            'products.*.product_category_id' => ['nullable', 'integer', 'exists:product_categories,id'],
            'products.*.image' => ['nullable', 'string'],
            'products.*.logo' => ['nullable', 'string'],
            'products.*.url' => ['nullable', 'string'],
            'products.*.summary' => ['nullable', 'string'],
            'products.*.specs' => ['nullable', 'array'],
            'products.*.downloads' => ['nullable', 'array'],
            'products.*.order' => ['nullable', 'integer'],
            'products.*.is_active' => ['nullable', 'boolean'],

            'products.*.translations' => ['nullable', 'array'],
            'products.*.translations.*.locale' => ['required_with:products.*.translations', 'string', 'max:5'],
            'products.*.translations.*.slug' => ['required_with:products.*.translations', 'string'],
            'products.*.translations.*.name' => ['required_with:products.*.translations', 'string'],
            'products.*.translations.*.category' => ['nullable', 'string'],
            'products.*.translations.*.description' => ['nullable', 'string'],
            'products.*.translations.*.features' => ['nullable', 'array'],
        ];
    }
}
