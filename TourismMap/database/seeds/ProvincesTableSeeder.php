<?php

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $objUser=App\User::where('name','=','admin')->first();
       $obj=new App\provinces;
       $obj->users()->associate($objUser);
       $obj->postal_code='12000';
       $obj->title_khmer='12000';
       $obj->title_english='12000';
       $obj->thumbnail='text_img';
       $obj->description_khmer='text_img';
       $obj->description_english='text_img';
       $obj->status=true;
       $obj->save();
    }
}
