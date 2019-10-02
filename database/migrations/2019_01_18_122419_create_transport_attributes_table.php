<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportAttributesTable extends Migration
{

    public function up()
    {
        Schema::create('transport_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_ru');
            $table->string('name_en');
            $table->double('price')->nullable();
            $table->string('icon')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('transport_attributes');
    }
}
