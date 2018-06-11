<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EquipmentRating extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('equipment_ratings', function (Blueprint $table) {
          $table->increments('id');
          $table->double('stars');
          $table->integer('equipment_comment_id')->unsigned();
          $table->foreign('equipment_comment_id')->references('id')->on('equipment_comments')->onDelete('cascade');
          $table->integer('equipment_id')->unsigned();
          $table->foreign('equipment_id')->references('id')->on('equipment')->onDelete('cascade');
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
