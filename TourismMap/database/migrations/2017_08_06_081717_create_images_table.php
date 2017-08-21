<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('images_name_unique');
            $table->text('url');
            $table->string('type',100);
            $table->timestamps();
        });

        Schema::create('province_image', function (Blueprint $table) {
            $table->integer('province_id')->unsigned();
            $table->integer('image_id')->unsigned();

            $table->foreign('province_id')->references('id')->on('provinces')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('image_id')->references('id')->on('images')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['province_id', 'image_id']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::dropIfExists('province_image');
        Schema::dropIfExists('images');
    }
}
