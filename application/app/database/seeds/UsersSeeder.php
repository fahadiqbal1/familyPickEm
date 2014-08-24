<?php

class UsersSeeder extends Seeder {
 
	public function run()
	{
		DB::table('users')->delete();

		User::create(array( 
			'firstname' => 'Administrator',
			'lastname' => 'User',
			'email' => 'admin', 
			'teamname' => 'Team Admin',
			'password' => Hash::make('admin'),
			'admin' => 1));
	}
 
}