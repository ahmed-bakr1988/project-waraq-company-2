<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProductTranslation>
 */
class ProductTranslationFactory extends Factory
{
    protected $model = ProductTranslation::class;

    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'locale' => fake()->randomElement(['en', 'ar']),
            'slug' => fake()->unique()->slug(),
            'name' => fake()->words(2, true),
            'category' => fake()->randomElement(['Packaging', 'Flute', 'Liner']),
            'description' => fake()->sentence(10),
            'features' => [],
        ];
    }
}
