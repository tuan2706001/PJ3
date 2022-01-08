<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Importdetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('importdetail', function (Blueprint $table) {
            $table->increments('im_id');
            $table->date('im_date');
            $table->unsignedInteger('book_id');
            $table->foreign('book_id')->references('book_id')->on('books');
            $table->integer('quantily');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('importdetail');
    }
}
