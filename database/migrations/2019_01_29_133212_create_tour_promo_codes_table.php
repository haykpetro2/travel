<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourPromoCodesTable extends Migration
{

    public function up()
    {
        Schema::create('tour_promo_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tour_id')->index();
            $table->string('code')->nullable();
            $table->double('percent')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tour_promo_codes');
    }
}
