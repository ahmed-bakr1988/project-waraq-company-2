<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'image' => 'assets/images/gallery/images-products/Picture'.fake()->numberBetween(1, 9).'.webp',
            'logo' => null,
            'url' => null,
            'order' => fake()->numberBetween(1, 100),
            'is_active' => true,
        ];
    }
}
