<?php

namespace Database\Seeders;

use App\Models\Designation;
use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Employee::factory(10)->create();
      Salary::factory(10)->create();
       Designation::factory(10)->create();
    }
}
