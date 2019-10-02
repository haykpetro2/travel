<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportsTable extends Migration
{

    public function up()
    {
        Schema::create('transports', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name_ru');
            $table->string('name_en');
            $table->double('transport_type_id');
            $table->double('transport_model_id');
            $table->string('image')->nullable();
            $table->double('person')->nullable();
            $table->double('door')->nullable();
            $table->double('motor');
            $table->integer('transmission');
            $table->double('price')->nullable();
            $table->double('sale')->nullable();
            $table->double('trunk')->nullable();
            $table->integer('driver')->nullable();
            $table->text('short_description_ru');
            $table->text('short_description_en')->nullable();
            $table->text('description_ru');
            $table->text('description_en')->nullable();
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('transports');
    }
}
