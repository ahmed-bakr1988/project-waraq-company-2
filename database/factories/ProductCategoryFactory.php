<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<ProductCategory> */
class ProductCategoryFactory extends Factory
{
    protected $model = ProductCategory::class;

    public function definition(): array
    {
        $name = $this->faker->unique()->words(2, true);

        return [
            'name' => Str::title($name),
            'slug' => Str::slug($name),
            'description' => $this->faker->sentence(10),
            'order' => $this->faker->numberBetween(0, 10),
            'is_active' => true,
        ];
    }
}
