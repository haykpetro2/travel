<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqsTable extends Migration
{

    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->increments('id');
            $table->text('question_ru');
            $table->text('answer_ru');
            $table->text('question_en');
            $table->text('answer_en');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('faqs');
    }
}
