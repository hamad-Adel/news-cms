<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsSubImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_sub_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('img');
            $table->unsignedInteger('news_id');
            $table->timestamps();

            $table->foreign('news_id')->references('id')->on('news');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_sub_images');
    }
}
