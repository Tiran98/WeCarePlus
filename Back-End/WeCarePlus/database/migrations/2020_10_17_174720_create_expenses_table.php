<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::connection('mongodb')->create('Expense',function(Blueprint $table){
            $table->increments('Expense Id');
            $table->String('Expense Type');
            $table->String('Expense Date');
            $table->String('Patient Registration Number');
            $table->String('Full Name');
            $table->String('Payment Type');
            $table->String('Payment Amount');

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
        Schema::dropIfExists('expenses');
    }
}
