<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ministry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ministry', function (Blueprint $table) {
            $table->increments('mi_id');
            $table->string('mi_name');
            $table->char('mi_phone', 10);
            $table->string('mi_userName', 100)->unique();
            $table->string('mi_passWord', 100);
            $table->tinyInteger('mi_status');
            $table->tinyInteger('mi_permission');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ministry');
    }
}
