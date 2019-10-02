<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportAttrsTable extends Migration
{

    public function up()
    {
        Schema::create('transport_attrs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transport_id')->index();
            $table->integer('attribute_id')->index();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transport_attrs');
    }
}
