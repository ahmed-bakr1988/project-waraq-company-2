<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Product> */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'product_category_id' => ProductCategory::query()->inRandomOrder()->value('id') ?? null,
            'image' => 'assets/images/banner/21.webp',
            'logo' => null,
            'url' => null,
            'summary' => $this->faker->sentence(12),
            'specs' => [
                'gsm_range' => [120, 300],
                'fiber' => $this->faker->randomElement(['recycled', 'virgin']),
                'width_mm' => [1200, 1800],
            ],
            'downloads' => [
                'spec_pdf' => 'https://example.com/spec.pdf',
            ],
            'order' => $this->faker->numberBetween(0, 10),
            'is_active' => true,
        ];
    }
}
