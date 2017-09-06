<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourismPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('tourism_places', function (Blueprint $table) {
               $table->increments('id');
               $table->integer('province_id')->unsigned();
               $table->integer('client_id')->unsigned();
               $table->integer('user_id')->unsigned();
               $table->string('title_khmer');
               $table->string('title_english');
            //   $table->text('thumbnail');
            //    $table->text('video');
               $table->boolean('status');
               $table->string('address_khmer');
               $table->string('address_english');
               $table->string('description_khmer');
               $table->string('description_english');
               $table->double('latitude');
               $table->double('longitude');
                $table->foreign('client_id')
            ->references('id')->on('clients')
            ->onDelete('cascade');
                $table->foreign('province_id')
            ->references('id')->on('provinces')
            ->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
              $table->timestamps();
        });
        Schema::create('tourism_gallery', function (Blueprint $table) {
            $table->integer('tourism_place_id')->unsigned();
            $table->integer('image_id')->unsigned();
            $table->foreign('tourism_place_id')->references('id')->on('tourism_places')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('image_id')->references('id')->on('images')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['tourism_place_id', 'image_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::dropIfExists('tourism_gallery');
        Schema::dropIfExists('tourism_places');
    }
}
