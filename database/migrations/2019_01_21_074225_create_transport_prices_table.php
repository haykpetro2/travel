<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportPricesTable extends Migration
{

    public function up()
    {
        Schema::create('transport_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transport_id')->index();
            $table->string('day');
            $table->double('price');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transport_prices');
    }
}
