<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeams extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teams', function($table)
		{
			$table->increments('id');
			$table->string('abbr');
			$table->string('slug');
			$table->string('name');
			$table->string('nickname');
			$table->string('icon')->nullable();
			$table->integer('wins');
			$table->integer('losses');
			$table->integer('ties');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('teams');
	}

}
