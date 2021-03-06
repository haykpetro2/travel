<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExcursionGalleriesTable extends Migration
{

    public function up()
    {
        Schema::create('excursion_galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('excursion_id')->index();
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('excursion_galleries');
    }
}
