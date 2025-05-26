<?php
// database/seeders/EmployeeTypeSeeder.php

namespace Database\Seeders;

use App\Models\EmployeeType;
use Illuminate\Database\Seeder;

class EmployeeTypeSeeder extends Seeder
{
    public function run()
    {
        $types = ['Permanent', 'Contract', 'Part-time', 'Intern', 'Freelancer'];
        foreach ($types as $type) {
            EmployeeType::create(['type_name' => $type]);
        }
    }
}