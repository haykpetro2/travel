<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportTypesTable extends Migration
{

    public function up()
    {
        Schema::create('transport_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_ru');
            $table->string('name_en');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transport_types');
    }
}
