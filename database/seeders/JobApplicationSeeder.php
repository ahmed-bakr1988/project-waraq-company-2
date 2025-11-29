<?php

namespace Database\Seeders;

use App\Models\Career;
use App\Models\JobApplication;
use Illuminate\Database\Seeder;

class JobApplicationSeeder extends Seeder
{
    public function run(): void
    {
        $careers = Career::all();

        if ($careers->isEmpty()) {
            return;
        }

        foreach ($careers as $career) {
            JobApplication::factory()
                ->count(rand(3, 5))
                ->for($career)
                ->create();
        }
    }
}
