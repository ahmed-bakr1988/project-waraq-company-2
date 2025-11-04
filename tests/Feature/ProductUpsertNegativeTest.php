<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductUpsertNegativeTest extends TestCase
{
    use RefreshDatabase;

    public function test_upsert_requires_translation_fields(): void
    {
        $payload = [
            'product' => [
                'image' => 'assets/images/p1.webp',
                'translations' => [
                    [
                        // missing slug and name should trigger 422
                        'locale' => 'en',
                    ],
                ],
            ],
        ];

        $this->postJson('/api/v1/products/upsert', $payload)->assertStatus(422);
    }
}
