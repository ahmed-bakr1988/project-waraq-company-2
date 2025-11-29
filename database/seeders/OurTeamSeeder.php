<?php

namespace Database\Seeders;

use App\Models\OurTeam;
use Illuminate\Database\Seeder;

class OurTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 8 active team members
        OurTeam::factory()
            ->count(8)
            ->active()
            ->create();

        // Create 2 inactive team members
        OurTeam::factory()
            ->count(2)
            ->inactive()
            ->create();
    }
}
