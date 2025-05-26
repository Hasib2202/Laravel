<?php
// Migration: create_hrms_employeedetails_table.php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('HRMS_EmployeeDetails', function (Blueprint $table) {
            $table->id('Employee_No_PK');
            $table->string('Employee_UID')->unique();
            $table->string('EmployeeName');
            $table->string('FatherName');
            $table->string('MotherName');
            $table->date('DOB');
            $table->tinyInteger('Gender');
            $table->unsignedBigInteger('Employee_Type_No_FK');
            $table->string('Designation');
            $table->string('Contact_Number');
            $table->string('Email_Address')->unique();
            $table->text('Remarks')->nullable();
            $table->tinyInteger('Status')->default(1);
            $table->timestamps();

            // Foreign Key
            $table->foreign('Employee_Type_No_FK')
                  ->references('Employee_Type_No')
                  ->on('HRMS_Employee_Type')
                  ->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('HRMS_EmployeeDetails');
    }
};