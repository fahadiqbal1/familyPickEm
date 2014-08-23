<?php

class UsersSeeder extends Seeder {
 
	public function run()
	{
		DB::table('users')->delete();

		User::create(array( 
			'firstname' => 'John',
			'lastname' => 'Doe',
			'email' => 'admin', 
			'password' => Hash::make('admin'),
			'remember_token' => null));
	}
 
}