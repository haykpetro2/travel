<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApartmentGalleriesTable extends Migration
{

    public function up()
    {
        Schema::create('apartment_galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('apartment_id')->index();
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('apartment_galleries');
    }
}
