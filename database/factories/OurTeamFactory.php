<?php

namespace Database\Factories;

use App\Models\OurTeam;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OurTeamFactory extends Factory
{
    protected $model = OurTeam::class;

    public function definition(): array
    {
        $name = fake()->name();

        return [
            'name' => $name,
            'slug' => Str::slug($name).'-'.fake()->unique()->numberBetween(1, 9999),
            'position' => fake()->randomElement([
                'CEO',
                'COO',
                'Production Manager',
                'Quality Control Manager',
                'Sales Director',
                'Marketing Manager',
                'Technical Director',
                'Supply Chain Manager',
            ]),
            'bio' => fake()->paragraphs(3, true),
            'qualifications' => fake()->paragraphs(2, true),
            'specialty' => fake()->randomElement(['Management', 'Engineering', 'Sales', 'Operations', 'Quality Control']),
            'email' => Str::slug($name).'@waraqco.com',
            'phone' => fake()->phoneNumber(),
            'linkedin_url' => 'https://linkedin.com/in/'.Str::slug($name),
            'image' => null,
            'is_active' => true,
            'display_order' => fake()->numberBetween(1, 100),
        ];
    }

    public function active(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => true,
        ]);
    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => false,
        ]);
    }
}
