<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$user = \App\Models\User::create([
            'name'     => 'Snigdho',
    		'email'    => 'admin@example.com',
    		'password' => bcrypt('password'),
            'role'     => 'Administrator',
    	]); 

        $user->assignRole('Administrator');*/

        $user = \App\Models\User::create([
            'name'     => 'Joe Driver',
            'email'    => 'driver@example.com',
            'password' => bcrypt('12345678'),
            'role'     => 'Driver',
        ]); 

        $user->assignRole('Driver');
    }
}
