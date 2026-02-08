<?php

namespace Database\Factories;

use App\Models\TeamMember;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<TeamMember> */
class TeamMemberFactory extends Factory
{
    protected $model = TeamMember::class;

    public function definition(): array
    {
        $name = fake()->name();

        return [
            'locale' => fake()->randomElement(['en', 'ar']),
            'name' => $name,
            'slug' => Str::slug($name).'-'.fake()->unique()->numberBetween(1, 9999),
            'position' => fake()->jobTitle(),
            'image' => null,
            'bio' => fake()->sentence(12),
            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'qualifications' => fake()->paragraph(),
            'specialty' => fake()->words(2, true),
            'linkedin_url' => fake()->url(),
            'order' => fake()->numberBetween(0, 10),
            'display_order' => fake()->numberBetween(0, 10),
            'is_active' => true,
        ];
    }
}
