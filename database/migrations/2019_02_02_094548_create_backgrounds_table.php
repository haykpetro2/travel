<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBackgroundsTable extends Migration
{

    public function up()
    {
        Schema::create('backgrounds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('page');
            $table->string('image');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('backgrounds');
    }
}
