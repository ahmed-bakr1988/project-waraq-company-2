<?php

namespace Database\Seeders;

use App\Models\Career;
use Illuminate\Database\Seeder;

class CareerSeeder extends Seeder
{
    public function run(): void
    {
        Career::factory()
            ->count(5)
            ->active()
            ->create();

        Career::factory()
            ->count(2)
            ->inactive()
            ->create();

        Career::factory()
            ->count(1)
            ->expired()
            ->create();
    }
}
