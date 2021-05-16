<?php

namespace Database\Factories;

use App\Models\Education;
use Illuminate\Database\Eloquent\Factories\Factory;

class EducationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Education::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'school' => $this->faker->text(25),
            'faculty' => $this->faker->text(20),
            'field_of_study' => $this->faker->text(15),
            'degree' => $this->faker->text(10),
            'start_year' => $this->faker->year,
            'end_year' => $this->faker->year,
            'description' => $this->faker->text(250),
        ];
    }
}
