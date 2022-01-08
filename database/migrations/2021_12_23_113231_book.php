<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Book extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('book_id');
            $table->string('book_title', 100);
            $table->string('book_img', 255);
            $table->string('author', 100);
            $table->unsignedInteger('bt_id');
            $table->unsignedInteger('sub_id');
            $table->foreign('bt_id')->references('bt_id')->on('booktype');
            $table->foreign('sub_id')->references('sub_id')->on('subject');
            $table->integer('remain');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('books');
    }
}
