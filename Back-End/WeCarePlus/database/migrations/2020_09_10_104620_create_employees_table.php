<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongodb')->create('Employee', function (Blueprint $table) {
            $table->increments('Employee Id');
            $table->String('Employee Name');
            $table->String('Email');
            $table->String('Password');
            $table->String('Gender');
            $table->String('Contact Number');
            $table->String('Age');
            $table->String('Address');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Employees');
    }
}
