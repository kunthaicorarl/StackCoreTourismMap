<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourismPlaceImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('tourism_place_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tourism_place_id')->unsigned();
            $table->string('name')->unique();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('caption')->nullable();
            $table->string('url')->nullable();
            $table->string('alt_text')->nullable();
            $table->foreign('tourism_place_id')->references('id')->on('tourism_places')
            ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('tourism_place_images');
    }
}
