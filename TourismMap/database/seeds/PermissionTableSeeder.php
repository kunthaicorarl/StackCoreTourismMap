<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         App\Permission::create( [
        'name' => 'CreatePost',
        'display_name' => 'Create Post',
        'description' =>'Create Post',
        ]);
          App\Permission::create( [
        'name' => 'EditPost',
        'display_name' => 'Edit Post',
        'description' =>'Create Post',
        ]);
          App\Permission::create( [
        'name' => 'AdministerRolesPermissions',
        'display_name' => 'Administer roles & permissions',
        'description' =>'Administer roles & permissions',
        ]);
    }
}
