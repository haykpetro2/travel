<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApartmentPricesTable extends Migration
{

    public function up()
    {
        Schema::create('apartment_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('apartment_id')->index();
            $table->string('day');
            $table->double('price');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('apartment_prices');
    }
}
