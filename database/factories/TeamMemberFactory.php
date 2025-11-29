<?php

namespace Database\Factories;

use App\Models\TeamMember;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<TeamMember> */
class TeamMemberFactory extends Factory
{
    protected $model = TeamMember::class;

    public function definition(): array
    {
        return [
            'locale' => $this->faker->randomElement(['en', 'ar']),
            'slug' => Str::slug($name).'-'.fake()->unique()->numberBetween(1, 9999),
            'name' => $this->faker->name(),
            'role' => $this->faker->jobTitle(),
            'photo' => null,
            'bio' => $this->faker->sentence(12),

            'order' => $this->faker->numberBetween(0, 10),
        ];
    }
}
