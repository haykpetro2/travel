<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelRoomGalleriesTable extends Migration
{

    public function up()
    {
        Schema::create('hotel_room_galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hotel_room_id')->index();
            $table->string('name');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('hotel_room_galleries');
    }
}
