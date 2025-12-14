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
            'product_category_id' => ProductCategory::factory(),
            'image' => null,
            'gallery' => [],
            'logo' => null,
            'url' => null,
            'specs' => [],
            'downloads' => [],
            'order' => $this->faker->numberBetween(0, 10),
            'is_active' => true,
            'is_featured' => fake()->boolean(20),
        ];
    }
}
