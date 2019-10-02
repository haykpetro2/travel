<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExcursionOrdersTable extends Migration
{

    public function up()
    {
        Schema::create('excursion_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('excursion_id')->index();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->text('check_in');
            $table->text('check_out');
            $table->double('person');
            $table->string('lunch');
            $table->string('guide');
            $table->text('note')->nullable();
            $table->string('total');
            $table->string('per_person');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('excursion_orders');
    }

}
