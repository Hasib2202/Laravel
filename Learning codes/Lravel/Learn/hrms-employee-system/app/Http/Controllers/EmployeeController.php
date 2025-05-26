<?php
// app/Http/Controllers/EmployeeController.php


namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    // Fetch all employees (for DataTable)
    public function index()
    {
        $employees = Employee::with('employeeType')->get();
        return response()->json(['data' => $employees]);
    }

    // Create new employee
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'EmployeeName' => 'required|string|max:100',
            'FatherName' => 'required|string|max:100', // Added
            'MotherName' => 'required|string|max:100', // Added
            'DOB' => 'required|date',
            'Gender' => 'required|integer|in:1,2,3',
            'Employee_Type_No_FK' => 'required|exists:HRMS_Employee_Type,Employee_Type_No',
            'Designation' => 'required|string|max:100', // Added
            'Contact_Number' => 'required|string|max:20',
            'Email_Address' => 'required|email|unique:HRMS_EmployeeDetails,Email_Address',
            'Status' => 'required|integer|in:0,1' // Added

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $employee = Employee::create($request->all());
        return response()->json(['success' => 'Employee added!', 'data' => $employee]);
    }

    // Fetch employee for edit
    public function show(Employee $employee)
    {
        return response()->json($employee);
    }

    // Update employee
    public function update(Request $request, Employee $employee)
    {
        $validator = Validator::make($request->all(), [
            'EmployeeName' => 'required|string|max:100',
            'DOB' => 'required|date',
            'Email_Address' => 'required|email|unique:HRMS_EmployeeDetails,Email_Address,' . $employee->Employee_No_PK . ',Employee_No_PK',
            // Add other fields/validation
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $employee->update($request->all());
        return response()->json(['success' => 'Employee updated!', 'data' => $employee]);
    }

    // Delete employee
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json(['success' => 'Employee deleted!']);
    }

    // Fetch employee types (for dropdown)
    public function getEmployeeTypes()
    {
        $types = EmployeeType::all();
        return response()->json($types);
    }
}
