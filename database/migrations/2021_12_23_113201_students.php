<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Students extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('stu_id');
            $table->string('stu_name', 100);
            $table->char('stu_phone', 10)->unique();
            $table->string('stu_userName', 100)->unique();
            $table->string('stu_passWord', 100);
            $table->tinyInteger('status');
            $table->unsignedInteger('cl_id');
            $table->foreign('cl_id')->references('cl_id')->on('classes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('students');
    }
}
