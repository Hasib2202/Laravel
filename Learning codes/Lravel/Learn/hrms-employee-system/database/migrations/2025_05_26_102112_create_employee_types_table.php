<?php
// Migration: create_hrms_employee_type_table.php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('HRMS_Employee_Type', function (Blueprint $table) {
            $table->id('Employee_Type_No'); // Correct PK name
            $table->string('type_name')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('HRMS_Employee_Type');
    }
};