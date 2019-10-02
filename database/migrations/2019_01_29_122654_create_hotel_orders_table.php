<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelOrdersTable extends Migration
{

    public function up()
    {
        Schema::create('hotel_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hotel_id')->index();
            $table->integer('room_id')->index();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('check_in');
            $table->string('check_out');
            $table->double('person');
            $table->text('note')->nullable();
            $table->string('total');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hotel_orders');
    }
}
