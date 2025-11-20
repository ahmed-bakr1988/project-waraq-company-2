<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Career>
 */
class CareerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->randomElement([
            'Production Manager',
            'Quality Control Specialist',
            'Sales Representative',
            'Machine Operator',
            'Warehouse Supervisor',
            'Maintenance Technician',
            'Supply Chain Coordinator',
            'Marketing Manager',
        ]);

        return [
            'title' => $title,
            'slug' => Str::slug($title).'-'.fake()->randomNumber(4),
            'location' => fake()->randomElement(['Cairo', 'Alexandria', 'Giza', 'Remote']),
            'description' => fake()->paragraphs(4, true),
            'requirements' => fake()->paragraphs(3, true),
            'type' => fake()->randomElement(['full-time', 'part-time', 'contract', 'internship']),
            'apply_email' => fake()->companyEmail(),
            'form_url' => fake()->optional()->url(),
            'is_active' => fake()->boolean(80),
            'posted_at' => fake()->dateTimeBetween('-2 months', 'now'),
            'expires_at' => fake()->optional(0.7)->dateTimeBetween('now', '+3 months'),
        ];
    }

    public function active(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => true,
            'expires_at' => fake()->dateTimeBetween('+1 week', '+3 months'),
        ]);
    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => false,
        ]);
    }

    public function expired(): static
    {
        return $this->state(fn (array $attributes) => [
            'expires_at' => fake()->dateTimeBetween('-2 months', '-1 day'),
        ]);
    }
}
