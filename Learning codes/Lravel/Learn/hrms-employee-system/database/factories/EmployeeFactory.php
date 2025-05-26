<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // database/factories/EmployeeFactory.php
    public function definition(): array
    {
        return [
            // Auto-generated fields (don't include in factory):
            // 'Employee_UID' => handled by model's boot method

            // Other fields
            'EmployeeName' => fake()->name(),
            'FatherName' => fake()->name(),
            'MotherName' => fake()->name(),
            'DOB' => fake()->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'), // ✅ Correct method
            'Gender' => fake()->numberBetween(1, 3),
            'Employee_Type_No_FK' => \App\Models\EmployeeType::pluck('Employee_Type_No')->random(),
            'Designation' => fake()->jobTitle(),
            'Contact_Number' => fake()->numerify('01##########'), // BD-style number
            'Email_Address' => fake()->unique()->safeEmail(),
            'Remarks' => fake()->sentence(),
            'Status' => fake()->randomElement([0, 1]),
        ];
    }
}
