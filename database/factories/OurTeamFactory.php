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
        $name = $this->faker->name();
        
        return [
            'name' => $name,
            'slug' => Str::slug($name) . '-' . $this->faker->unique()->numberBetween(1, 9999),
            'position' => $this->faker->jobTitle(),
            'bio' => $this->faker->paragraphs(3, true),
            'qualifications' => $this->faker->paragraphs(2, true),
            'specialty' => $this->faker->randomElement(['Management', 'Engineering', 'Sales', 'Operations', 'Quality Control']),
            'email' => Str::slug($name) . '@waraqco.com',
            'phone' => $this->faker->phoneNumber(),
            'linkedin_url' => 'https://linkedin.com/in/' . Str::slug($name),
            'image' => null,
            'is_active' => true,
            'display_order' => $this->faker->numberBetween(1, 100),
        ];
    }
}
