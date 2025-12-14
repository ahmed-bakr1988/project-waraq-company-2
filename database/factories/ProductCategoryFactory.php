<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use App\Models\ProductCategoryTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<ProductCategory> */
class ProductCategoryFactory extends Factory
{
    protected $model = ProductCategory::class;

    public function definition(): array
    {
        return [
            'image' => null,
            'icon' => null,
            'order' => $this->faker->numberBetween(0, 10),
            'is_active' => true,
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (ProductCategory $category): void {
            foreach (['en', 'ar'] as $locale) {
                $name = $this->faker->unique()->words(2, true);

                ProductCategoryTranslation::query()->create([
                    'product_category_id' => $category->id,
                    'locale' => $locale,
                    'slug' => Str::slug($name).'-'.$locale,
                    'name' => Str::title($name),
                    'description' => $this->faker->sentence(10),
                    'meta_title' => null,
                    'meta_description' => null,
                ]);
            }
        });
    }
}
