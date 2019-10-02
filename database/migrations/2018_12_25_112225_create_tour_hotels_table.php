<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourHotelsTable extends Migration
{

    public function up()
    {
        Schema::create('tour_hotels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tour_id')->index();
            $table->integer('hotel_id')->index();
            $table->text('prices');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tour_hotels');
    }

}
