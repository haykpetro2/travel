<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->increments('id');
            $table->double('amd');
            $table->double('rub');
            $table->double('usd');
            $table->double('euro');
            $table->string('amd_symbol')->default('&#1423;');
            $table->string('rub_symbol')->default('&#8381;');
            $table->string('usd_symbol')->default('&#36;');
            $table->string('euro_symbol')->default('&#8364;');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currencies');
    }
}
