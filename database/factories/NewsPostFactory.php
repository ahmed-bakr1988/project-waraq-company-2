<?php

namespace Database\Factories;

use App\Models\NewsPost;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<NewsPost> */
class NewsPostFactory extends Factory
{
    protected $model = NewsPost::class;

    public function definition(): array
    {
        $title = $this->faker->unique()->sentence(3);

        return [
            'locale' => $this->faker->randomElement(['en', 'ar']),
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => $this->faker->sentence(12),
            'body' => $this->faker->paragraphs(3, true),
            'image' => null,
            'is_published' => true,
            'published_at' => now()->subDays($this->faker->numberBetween(0, 10)),
        ];
    }
}
