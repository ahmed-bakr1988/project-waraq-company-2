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
            'title' => $title = $this->faker->jobTitle(),
            'slug' => \Illuminate\Support\Str::slug($title),
            'location' => $this->faker->city(),
            'requirements' => $this->faker->paragraph(),
            'type' => $this->faker->randomElement(['Full-time', 'Part-time', 'Contract']),
            'description' => $this->faker->paragraphs(2, true),
            'apply_email' => $this->faker->safeEmail(),
            'form_url' => null,
            'is_active' => true,
            'posted_at' => now()->subDays($this->faker->numberBetween(0, 30)),
            'expires_at' => now()->addDays($this->faker->numberBetween(30, 90)),
        ];
    }
}

