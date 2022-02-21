<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $employees = Employee::pluck('emp_no')->toArray();
        return [
            'emp_no' => $this->faker->randomElement($employees),
            'salary' => $this->faker->randomDigit(),
            'from_date' => $this->faker->dateTimeThisMonth,
            'to_date' => $this->faker->dateTimeThisMonth,


        ];
    }
}
