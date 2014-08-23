<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatches extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('matches', function($table)
		{
			$table->increments('id');
			$table->integer('weekNumber');
			$table->string('homeTeam');
			$table->string('awayTeam');
			$table->date('gameDate');
			$table->time('gameTime');
			$table->integer('winner')->nullable();
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
		Schema::drop('matches');
	}

}
