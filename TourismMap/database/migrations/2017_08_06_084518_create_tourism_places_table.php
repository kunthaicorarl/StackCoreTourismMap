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
              // $table->integer('client_id')->unsigned();
              $table->integer('user_id')->unsigned();
               $table->string('title_khmer');
               $table->string('title_english');
               $table->text('thumbnail')->nullable();
               $table->text('video')->nullable();
               $table->boolean('status');
               $table->string('address_khmer')->nullable();
               $table->string('address_english')->nullable();
               $table->string('description_khmer')->nullable();
               $table->string('description_english')->nullable();
               $table->float('latitude', 10, 6);
               $table->float('longitude', 10, 6);
            //     $table->foreign('client_id')
            // ->references('id')->on('clients')
            // ->onDelete('cascade');
                $table->foreign('province_id')
            ->references('id')->on('provinces')
            ->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
              $table->timestamps();
        });
        Schema::create('tourism_gallery', function (Blueprint $table) {
            $table->integer('tourism_place_id')->unsigned();
            $table->integer('gallery_type_id')->unsigned();
            $table->foreign('tourism_place_id')->references('id')->on('tourism_places')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('gallery_type_id')->references('id')->on('gallery_types')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['tourism_place_id', 'gallery_type_id']);
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
