<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourismImageDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourism_image_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tourism_places_id')-unsigned();
            $table->integer('image_id')-unsigned();
            $table->foreign('image_id')
  ->references('id')->on('images')
  ->onDelete('cascade');
  $table->foreign('tourism_places_id')
  ->references('id')->on('tourism_places')
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
        Schema::dropIfExists('tourism_image_details');
    }
}
