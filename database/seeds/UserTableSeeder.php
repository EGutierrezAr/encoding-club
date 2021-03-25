<?php

use Illuminate\Database\Seeder;
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

        User::create([
    		'name' => 'Emiliano Gutiérrez A',
	        'email' => 'admin@hotmail.com',
	        'password' => bcrypt('11111111'), // password
	        'role' => 'admin'
    	]);

        factory(User::class, 50)->create();
    }
}
