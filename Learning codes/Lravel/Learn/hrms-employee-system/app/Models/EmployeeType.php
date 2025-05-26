<?php
// app/Models/EmployeeType.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeType extends Model
{
    use HasFactory;

    protected $table = 'HRMS_Employee_Type';
    protected $primaryKey = 'Employee_Type_No';

    protected $fillable = ['type_name'];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'Employee_Type_No_FK');
    }
}