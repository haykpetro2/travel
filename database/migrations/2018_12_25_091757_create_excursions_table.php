<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExcursionsTable extends Migration
{

    public function up()
    {
        Schema::create('excursions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_ru');
            $table->string('name_en')->nullable();
            $table->double('km')->nullable();
            $table->double('time')->nullable();
            $table->double('price')->nullable();
            $table->double('other_price')->nullable();
            $table->double('sale')->nullable();
            $table->double('ticket')->nullable();
            $table->double('percent')->nullable();
            $table->double('addition')->nullable();
            $table->double('guide')->nullable();
            $table->double('lunch')->nullable();
            $table->string('image')->nullable();
            $table->text('description_ru');
            $table->text('description_en');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('excursions');
    }
}
