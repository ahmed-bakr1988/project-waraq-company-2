<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobApplication>
 */
class JobApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'career_id' => \App\Models\Career::factory(),
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'cover_letter' => fake()->paragraphs(3, true),

            'cv_path' => 'resumes/'.fake()->uuid().'.pdf',
            'linkedin_url' => fake()->optional()->url(),
            'years_experience' => fake()->numberBetween(0, 20),
            'status' => fake()->randomElement(['new', 'reviewed', 'shortlisted', 'rejected']),

            'ip_address' => fake()->ipv4(),
        ];
    }

    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'pending',
        ]);
    }

    public function reviewed(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'reviewed',
        ]);
    }

    public function shortlisted(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'shortlisted',
        ]);
    }
}
