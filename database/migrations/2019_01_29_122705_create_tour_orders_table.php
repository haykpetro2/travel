<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourOrdersTable extends Migration
{

    public function up()
    {
        Schema::create('tour_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tour_id')->index();
            $table->integer('hotel_id');
            $table->string('hotel_name');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->double('adult');
            $table->double('child_6')->nullable();
            $table->double('child_12')->nullable();
            $table->text('note')->nullable();
            $table->string('promo_code')->nullable();
            $table->string('total');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tour_orders');
    }
}
