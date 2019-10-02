<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApartmentsTable extends Migration
{

    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('home');
            $table->string('name_ru');
            $table->string('name_en');
            $table->string('type');
            $table->string('price');
            $table->double('sale')->nullable();
            $table->string('address');
            $table->string('image')->nullable();
            $table->double('room')->nullable();
            $table->double('area')->nullable();
            $table->text('description_ru');
            $table->text('description_en');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('apartments');
    }
}
