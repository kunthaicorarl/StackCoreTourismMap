<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // App\User::create( [
        // 'name' => 'admin',
        // 'email' => 'admin123@gmail.com',
        // 'password' => bcrypt('admin123@gmail.com'),
        // ]);
        // App\User::create( [
        // 'name' => 'Admin',
        // 'email' => 'Admin123@gmail.com',
        // 'password' => Hash::make('Admin123'),
        // ]);
        //  App\User::create( [
        // 'name' => 'Owner',
        // 'email' => 'Owner123@gmail.com',
        // 'password' => Hash::make('Owner123'),
        // ]);
        //  App\User::create( [
        // 'name' => 'Editor',
        // 'email' => 'Editor123@gmail.com',
        // 'password' => Hash::make('Editor123'),
        // ]);

        $user=new User;
        $user->name='Admin';
        $user->email='Admin123@gmail.com';
        $user->password=Hash::make('Admin123');
        $user->save();
        $user=new User;
        $user->name='Owner';
        $user->email='Owner123@gmail.com';
        $user->password=Hash::make('Admin123');
        $user=$user->save();
        $user=new User;
        $user->name='Editor';
        $user->email='Editor123@gmail.com';
        $user->password=Hash::make('Admin123');
        $user=$user->save();

    }
}
