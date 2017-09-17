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
          //  $table->integer('gallery_type_id')->unsigned();
            $table->string('name')->unique();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('caption')->nullable();
            $table->string('url')->nullable();
            $table->string('alt_text')->nullable();
            // $table->foreign('gallery_type_id')->references('id')->on('gallery_types')
            // ->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });

        // Schema::create('province_image', function (Blueprint $table) {
        //     $table->integer('province_id')->unsigned();
        //     $table->integer('gellery_type_id')->unsigned();

        //     $table->foreign('province_id')->references('id')->on('provinces')
        //         ->onUpdate('cascade')->onDelete('cascade');
        //     $table->foreign('gellery_type_id')->references('id')->on('gallery_types')
        //         ->onUpdate('cascade')->onDelete('cascade');

        //     $table->primary(['province_id', 'gellery_type_id']);
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {      
         Schema::dropIfExists('images');
    }
}
