<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Role::create( [
        'name' => 'Admin',
        'display_name' => 'Create Post',
        'description' =>'Create Post',
        ]);
          App\Role::create( [
        'name' => 'Owner',
        'display_name' => 'Create Post',
        'description' =>'Create Post',
        ]);
          App\Role::create( [
        'name' => 'Editor',
        'display_name' => 'Create Post',
        'description' =>'Create Post',
        ]);
    }
}
