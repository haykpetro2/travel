<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{

    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('status')->default(0);
            $table->double('tour_id')->index()->nullable();
            $table->double('hotel_id')->index()->nullable();
            $table->double('transport_id')->index()->nullable();
            $table->double('apartment_id')->index()->nullable();
            $table->double('post_id')->index()->nullable();
            $table->string('name');
            $table->string('email');
            $table->text('comment');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
