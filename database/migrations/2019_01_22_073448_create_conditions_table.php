<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConditionsTable extends Migration
{

    public function up()
    {
        Schema::create('conditions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description_ru');
            $table->text('description_en');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('conditions');
    }
}
