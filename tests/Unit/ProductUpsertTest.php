<?php

namespace Tests\Unit;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * اختبارات وحدات (Unit) لواجهة Upsert الخاصة بالمنتجات.
 */
class ProductUpsertTest extends TestCase
{
    use RefreshDatabase;

    public function test_upsert_single_product(): void
    {
        $payload = [
            'product' => [
                'product_category_id' => null,
                'image' => 'assets/images/p1.webp',
                'specs' => ['gsm_range' => [120, 300], 'width' => '1.2m'],
                'downloads' => ['spec_pdf' => 'https://example.com/spec.pdf'],
                'is_featured' => true,
                'translations' => [
                    [
                        'locale' => 'en',
                        'slug' => 'test-liner-1',
                        'name' => 'Test Liner 1',
                        'description' => 'Desc EN',
                        'short_description' => 'Short EN',
                        'features' => ['Strong', 'Durable'],
                        'meta_title' => 'Test Liner 1',
                        'meta_description' => 'Meta desc',
                    ],
                ],
            ],
        ];

        $res = $this->postJson('/api/v1/products/upsert', $payload);
        $res->assertStatus(200)->assertJson(['ok' => true, 'count' => 1]);

        $this->assertDatabaseCount('products', 1);
        $this->assertDatabaseHas('product_translations', [
            'locale' => 'en',
            'slug' => 'test-liner-1',
            'name' => 'Test Liner 1',
        ]);

        $pid = Product::query()->value('id');

        // Update via id
        $payload['product']['id'] = $pid;
        $payload['product']['order'] = 5;
        $this->postJson('/api/v1/products/upsert', $payload)
            ->assertStatus(200)
            ->assertJson(['ok' => true]);

        $this->assertDatabaseHas('products', [
            'id' => $pid,
            'order' => 5,
        ]);
    }
}
