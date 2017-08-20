<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvinceImageDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('province_image_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('province_id')-unsigned();
            $table->integer('image_id')-unsigned();
            $table->foreign('image_id')
  ->references('id')->on('images')
  ->onDelete('cascade');
  $table->foreign('province_id')
  ->references('id')->on('provinces')
  ->onDelete('cascade');
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
        Schema::dropIfExists('province_image_details');
    }
}