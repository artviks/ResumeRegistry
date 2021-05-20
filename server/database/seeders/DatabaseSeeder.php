<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Education;
use App\Models\Person;
use App\Models\Resume;
use App\Models\WorkExperience;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        Resume::factory(5)
            ->has(Person::factory())
            ->has(Education::factory(2))
            ->has(WorkExperience::factory(2))
            ->has(Address::factory())
            ->create();
    }
}
