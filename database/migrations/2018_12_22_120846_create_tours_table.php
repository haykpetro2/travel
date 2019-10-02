<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToursTable extends Migration
{

    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('home');
            $table->integer('type');
            $table->integer('country_id');
            $table->string('name_ru');
            $table->string('name_en');
            $table->integer('expert_id')->nullable();
            $table->integer('tour_type_id');
            $table->string('price');
            $table->string('sale')->nullable();
            $table->text('checks')->nullable();
            $table->text('short_description_ru');
            $table->text('short_description_en');
            $table->text('description_ru');
            $table->text('description_en');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tours');
    }
}
