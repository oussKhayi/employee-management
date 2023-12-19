<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Define the number of employees you want to create
         $numberOfEmployees = 20;

         // Use the factory to create random employees
         Employee::factory($numberOfEmployees)->create();
    }
}