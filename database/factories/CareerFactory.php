<?php

namespace Database\Factories;

use App\Models\Career;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Career> */
class CareerFactory extends Factory
{
    protected $model = Career::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle(),
            'location' => $this->faker->city(),
            'description' => $this->faker->paragraphs(2, true),
            'apply_email' => $this->faker->safeEmail(),
            'form_url' => null,
            'is_active' => true,
            'published_at' => now()->subDays($this->faker->numberBetween(0, 30)),
        ];
    }
}
