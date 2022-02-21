<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $genderArr = ['m', 'f'];

        return [
            'emp_no' => $this->faker->unique()->numberBetween(1, 100),
            'birth_date' => $this->faker->date,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'gender' => $this->faker->randomElement($genderArr),
            'hire_date' => $this->faker->date,

        ];
    }
}
