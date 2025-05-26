<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('welcome');
});


// Employee CRUD Routes (AJAX)
Route::prefix('employees')->group(function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('employees.index'); // ✅ Named
    Route::post('/', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/types', [EmployeeController::class, 'getEmployeeTypes'])->name('employees.types');
    Route::get('/{employee}', [EmployeeController::class, 'show'])->name('employees.show');
    Route::put('/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
});

// Blade route for the interface
Route::get('/employee-setup', function () {
    return view('employee_setup');
})->name('employee.setup'); // Optional naming