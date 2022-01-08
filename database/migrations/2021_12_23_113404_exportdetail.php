<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Exportdetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exportdetail', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ex_id');
            $table->foreign('ex_id')->references('ex_id')->on('export');
            $table->unsignedInteger('stu_id');
            $table->foreign('stu_id')->references('stu_id')->on('students');
            $table->tinyInteger('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('exportDetail');
    }
}
