<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourDestinationsTable extends Migration
{

    public function up()
    {
        Schema::create('tour_destinations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tour_id')->index();
            $table->string('title_ru');
            $table->string('title_en');
            $table->string('day');
            $table->text('description_ru');
            $table->text('description_en');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('tour_destinations');
    }
}
