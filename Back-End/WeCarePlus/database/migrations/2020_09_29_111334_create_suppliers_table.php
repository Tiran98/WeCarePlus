<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::connection('mongodb')->create('Supplier', function (Blueprint $table) {
            $table->increments('Supplier Id');
            $table->String('Supplier Name');
            $table->String('Product Type');
            $table->String('Address');
            $table->String('Email');
            $table->String('Phone');
            
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
        Schema::dropIfExists('suppliers');
    }
}
