<?php
// app/Models/Employee.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'HRMS_EmployeeDetails';
    protected $primaryKey = 'Employee_No_PK';
    protected $appends = ['age']; // ✅ Append to JSON

    protected $fillable = [
        'Employee_UID',
        'EmployeeName',
        'FatherName',
        'MotherName',
        'DOB',
        'Gender',
        'Employee_Type_No_FK',
        'Designation',
        'Contact_Number',
        'Email_Address',
        'Remarks',
        'Status'
    ];

    // Auto-generate Employee_UID before creation
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($employee) {
            // Generate unique Employee_UID (e.g., EMP202500001)
            $prefix = 'EMP' . date('Y'); // EMP + Current Year
            $lastEmployee = Employee::where('Employee_UID', 'like', $prefix . '%')
                ->latest('Employee_No_PK')
                ->first();

            $sequence = $lastEmployee ?
                intval(substr($lastEmployee->Employee_UID, 7)) + 1 : 1;

            $employee->Employee_UID = $prefix . str_pad($sequence, 5, '0', STR_PAD_LEFT);
        });
    }

    // Age Accessor (for DataTable)
    public function getAgeAttribute()
    {
        return Carbon::parse($this->DOB)->age;
    }

    // Relationship
    public function employeeType()
    {
        return $this->belongsTo(EmployeeType::class, 'Employee_Type_No_FK');
    }
}
