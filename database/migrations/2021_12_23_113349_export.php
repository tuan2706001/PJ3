<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Export extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('export', function (Blueprint $table) {
            $table->increments('ex_id');
            $table->date('ex_date');
            $table->unsignedInteger('cl_id');
            $table->foreign('cl_id')->references('cl_id')->on('classes');
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
        Schema::drop('export');
    }
}
