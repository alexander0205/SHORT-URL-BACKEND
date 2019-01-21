<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShorturlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shorturl', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_urloriginal')->unsigned();
           // $table->unsignedInteger("id_urloriginal");
            $table->foreign('id_urloriginal')->references('id')->on('originalurl')->onDelete('cascade');;
            $table->string("url_short");
           
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
        Schema::dropIfExists('shorturl');
    }
}
