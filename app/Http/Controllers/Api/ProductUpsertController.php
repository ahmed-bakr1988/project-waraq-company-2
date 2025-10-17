<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProductUpsertRequest;
use App\Models\Product;
use App\Models\ProductTranslation;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;

/**
 * واجهة برمجية (API) لتحديث/إدراج المنتجات (Upsert) مع الترجمات.
 *
 * - تدعم إرسال منتج واحد عبر الحقل `product` أو عدّة منتجات عبر `products`.
 * - يتم إنشاء السجل إن لم يوجد، أو تحديثه عند تمرير `id`.
 * - يتم تحديث الترجمات (الاسم/الوصف/الميزات) حسب `locale` باستخدام updateOrCreate.
 */
class ProductUpsertController extends Controller
{
    /**
     * تنفيذ عملية upsert لمجموعة من المنتجات.
     *
     * @param  ProductUpsertRequest  $request  طلب مُتحقق منه يحتوي على payload المنتجات
     * @return JsonResponse رد JSON يتضمن نتائج المعالجة
     */
    public function upsert(ProductUpsertRequest $request): JsonResponse
    {
        $items = $request->validated('products', []);

        $results = [];

        foreach ($items as $index => $payload) {
            $base = [
                'product_category_id' => $payload['product_category_id'] ?? null,
                'image' => $payload['image'] ?? 'assets/images/placeholder.webp',
                'logo' => $payload['logo'] ?? null,
                'url' => $payload['url'] ?? null,
                'summary' => $payload['summary'] ?? null,
                'specs' => isset($payload['specs']) ? (array) $payload['specs'] : null,
                'downloads' => isset($payload['downloads']) ? (array) $payload['downloads'] : null,
                'order' => $payload['order'] ?? 0,
                'is_active' => (bool) ($payload['is_active'] ?? true),
            ];

            $product = null;

            if (! empty($payload['id'])) {
                $product = Product::query()->find($payload['id']);
            }

            if (! $product) {
                $product = new Product;
            }

            $product->fill(Arr::only($base, $product->getFillable()));
            $product->save();

            // معالجة الترجمات لكل لغة
            $translations = $payload['translations'] ?? [];
            foreach ($translations as $t) {
                if (empty($t['locale'])) {
                    continue;
                }

                ProductTranslation::query()->updateOrCreate(
                    [
                        'product_id' => $product->id,
                        'locale' => (string) $t['locale'],
                    ],
                    [
                        'slug' => (string) ($t['slug'] ?? ''),
                        'name' => (string) ($t['name'] ?? ''),
                        'category' => (string) ($t['category'] ?? ''),
                        'description' => (string) ($t['description'] ?? ''),
                        'features' => isset($t['features']) ? (array) $t['features'] : null,
                    ],
                );
            }

            $results[] = [
                'index' => $index,
                'id' => $product->id,
                'updated_at' => $product->updated_at?->toAtomString(),
            ];
        }

        return response()->json([
            'ok' => true,
            'count' => count($results),
            'results' => $results,
        ]);
    }
}
