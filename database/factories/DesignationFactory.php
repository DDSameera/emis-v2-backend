<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class DesignationFactory extends Factory
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
            'emp_no' => $this->faker->unique()->randomElement($employees),
            'title' => $this->faker->jobTitle,
            'from_date' => $this->faker->date,
            'to_date' => $this->faker->date
        ];
    }
}
