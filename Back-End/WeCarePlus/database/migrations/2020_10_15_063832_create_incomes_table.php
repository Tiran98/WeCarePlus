<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::connection('mongodb')->create('Income',function(Blueprint $table){
            $table->increments('Income Id');
            $table->String('Income Type');
            $table->String('Income Date');
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
        Schema::dropIfExists('incomes');
    }
}
