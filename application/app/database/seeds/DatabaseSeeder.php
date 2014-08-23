<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('TeamsSeeder');
		$this->call('MatchesSeeder');
		$this->call('UsersSeeder');
	}

}
