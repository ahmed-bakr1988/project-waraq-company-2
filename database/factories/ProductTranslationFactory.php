<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<ProductTranslation> */
class ProductTranslationFactory extends Factory
{
    protected $model = ProductTranslation::class;

    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'locale' => fake()->randomElement(['en', 'ar']),
            'slug' => fake()->unique()->slug(),
            'name' => fake()->words(3, true),
            'category' => fake()->randomElement(['Packaging', 'Flute', 'Liner', 'Corrugated']),
            'description' => fake()->paragraph(3),
            'features' => [
                'gsm' => fake()->numberBetween(80, 400),
                'width' => fake()->numberBetween(100, 250).' cm',
                'length' => fake()->numberBetween(100, 500).' m',
                'color' => fake()->randomElement(['White', 'Brown', 'Kraft', 'Natural']),
                'recyclable' => fake()->boolean(80),
                'layers' => fake()->numberBetween(3, 7),
                'strength' => fake()->randomElement(['High', 'Medium', 'Standard']),
                'moisture_resistant' => fake()->boolean(60),
            ],
        ];
    }
}
