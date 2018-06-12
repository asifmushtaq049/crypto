<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Equipment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        //
        Schema::create('equipment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('detail');
            $table->integer('price');
            $table->string('coin');
            $table->integer('power');
            $table->string('hash_rate');
            $table->string('power_cost_per_day');
            $table->string('return_per_day');
            $table->string('profit_ratio');
            $table->string('payback_period');
            $table->string('cost_per_kh_s');
            $table->string('annual_return_percentage');
            $table->string('image')->default('/img/default.png');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        //
    }
}
