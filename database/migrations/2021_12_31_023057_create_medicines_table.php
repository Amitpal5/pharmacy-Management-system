<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('catagory_name');
            $table->string('company_name');
            $table->string('medicine_name');
            $table->string('medicine_genius');
            $table->string('strenght');
            $table->string('buying_price');
            $table->string('selling_price');
            $table->string('minimun_stock');
            $table->string('expire_date');

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
        Schema::dropIfExists('medicines');
    }
}
