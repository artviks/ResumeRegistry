<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Education;
use App\Models\Person;
use App\Models\WorkExperience;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        Person::factory(5)
            ->has(Education::factory(2))
            ->has(WorkExperience::factory(2))
            ->has(Address::factory())
            ->create();
    }
}
