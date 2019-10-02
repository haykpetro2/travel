<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportGalleriesTable extends Migration
{

    public function up()
    {
        Schema::create('transport_galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transport_id')->index();
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transport_galleries');
    }
}
