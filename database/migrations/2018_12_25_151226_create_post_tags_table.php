<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTagsTable extends Migration
{

    public function up()
    {
        Schema::create('post_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->index();
            $table->string('tag_id')->index();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('post_tags');
    }
}
