<?php

class TeamsSeeder extends Seeder {
 
	public function run()
	{
		DB::table('teams')->delete();
 
		Teams::create(array(
			'abbr' => 'sf',
			'slug' => 'san-francisco-49ers',
			'name' => 'San Francisco',
			'nickname' => '49ers',
			'icon' => null,
			'wins' => 0,
			'losses' => 0,
			'ties' => 0
		));
		Teams::create(array(
			'abbr' => 'az',
			'slug' => Str::slug('Arizona Cardinals'),
			'name' => 'Arizona',
			'nickname' => 'Cardinals',
			'icon' => null,
			'wins' => 0,
			'losses' => 0,
			'ties' => 0
		));
		Teams::create(array(
			'abbr' => 'atl',
			'slug' => Str::slug('Atlanta Falcons'),
			'name' => 'Atlanta',
			'nickname' => 'Falcons',
			'icon' => null,
			'wins' => 0,
			'losses' => 0,
			'ties' => 0
		));
		Teams::create(array(
			'abbr' => 'bal',
			'slug' => Str::slug('Baltimore Ravens'),
			'name' => 'Baltimore',
			'nickname' => 'Ravens',
			'icon' => null,
			'wins' => 0,
			'losses' => 0,
			'ties' => 0
		));
		Teams::create(array(
			'abbr' => 'buf',
			'slug' => Str::slug('Buffalo Bills'),
			'name' => 'Buffalo',
			'nickname' => 'Bills',
			'icon' => null,
			'wins' => 0,
			'losses' => 0,
			'ties' => 0
		));
		Teams::create(array(
			'abbr' => 'car',
			'slug' => Str::slug('Carolina Panthers'),
			'name' => 'Carolina',
			'nickname' => 'Panthers',
			'icon' => null,
			'wins' => 0,
			'losses' => 0,
			'ties' => 0
		));
		Teams::create(array(
			'abbr' => 'chi',
			'slug' => Str::slug('Chicago Bears'),
			'name' => 'Chicago',
			'nickname' => 'Bears',
			'icon' => null,
			'wins' => 0,
			'losses' => 0,
			'ties' => 0
		));
		Teams::create(array(
			'abbr' => 'cin',
			'slug' => Str::slug('Cincinnati Bengals'),
			'name' => 'Cincinnati',
			'nickname' => 'Bengals',
			'icon' => null,
			'wins' => 0,
			'losses' => 0,
			'ties' => 0
		));
		Teams::create(array(
			'abbr' => 'cle',
			'slug' => Str::slug('Cleveland Browns'),
			'name' => 'Cleveland',
			'nickname' => 'Browns',
			'icon' => null,
			'wins' => 0,
			'losses' => 0,
			'ties' => 0
		));
		Teams::create(array(
			'abbr' => 'dal',
			'slug' => Str::slug('Dallas Cowboys'),
			'name' => 'Dallas',
			'nickname' => 'Cowboys',
			'icon' => null,
			'wins' => 0,
			'losses' => 0,
			'ties' => 0
		));
		Teams::create(array(
			'abbr' => 'den',
			'slug' => Str::slug('Denver Broncos'),
			'name' => 'Denver',
			'nickname' => 'Broncos',
			'icon' => null,
			'wins' => 0,
			'losses' => 0,
			'ties' => 0
		));
		Teams::create(array(
			'abbr' => 'det',
			'slug' => Str::slug('Detroit Lions'),
			'name' => 'Detroit',
			'nickname' => 'Lions',
			'icon' => null,
			'wins' => 0,
			'losses' => 0,
			'ties' => 0
		));
		Teams::create(array(
			'abbr' => 'gb',
			'slug' => Str::slug('Green Bay Packers'),
			'name' => 'Green Bay',
			'nickname' => 'Packers',
			'icon' => null,
			'wins' => 0,
			'losses' => 0,
			'ties' => 0
		));
		Teams::create(array(
			'abbr' => 'hou',
			'slug' => Str::slug('Houston Texans'),
			'name' => 'Houston',
			'nickname' => 'Texans',
			'icon' => null,
			'wins' => 0,
			'losses' => 0,
			'ties' => 0
		));
		Teams::create(array(
			'abbr' => 'ind',
			'slug' => Str::slug('Indianapolis Colts'),
			'name' => 'Indianapolis',
			'nickname' => 'Colts',
			'icon' => null,
			'wins' => 0,
			'losses' => 0,
			'ties' => 0
		));
		Teams::create(array(
			'abbr' => 'jax',
			'slug' => Str::slug('Jacksonville Jaguars'),
			'name' => 'Jacksonville',
			'nickname' => 'Jaguars',
			'icon' => null,
			'wins' => 0,
			'losses' => 0,
			'ties' => 0
		));
		Teams::create(array(
			'abbr' => 'kc',
			'slug' => Str::slug('Kansas City Chiefs'),
			'name' => 'Kansas City',
			'nickname' => 'Chiefs',
			'icon' => null,
			'wins' => 0,
			'losses' => 0,
			'ties' => 0
		));
		Teams::create(array(
			'abbr' => 'mia',
			'slug' => Str::slug('Miami Dolphins'),
			'name' => 'Miami',
			'nickname' => 'Dolphins',
			'icon' => null,
			'wins' => 0,
			'losses' => 0,
			'ties' => 0
		));
		Teams::create(array(
			'abbr' => 'min',
			'slug' => Str::slug('Minnesota Vikings'),
			'name' => 'Minnesota',
			'nickname' => 'Vikings',
			'icon' => null,
			'wins' => 0,
			'losses' => 0,
			'ties' => 0
		));
		Teams::create(array(
			'abbr' => 'ne',
			'slug' => Str::slug('New England Patriots'),
			'name' => 'New England',
			'nickname' => 'Patriots',
			'icon' => null,
			'wins' => 0,
			'losses' => 0,
			'ties' => 0
		));
		Teams::create(array(
			'abbr' => 'no',
			'slug' => Str::slug('New Orleans Saints'),
			'name' => 'New Orleans',
			'nickname' => 'Saints',
			'icon' => null,
			'wins' => 0,
			'losses' => 0,
			'ties' => 0
		));
		Teams::create(array(
			'abbr' => 'nyg',
			'slug' => Str::slug('New York Giants'),
			'name' => 'New York',
			'nickname' => 'Giants',
			'icon' => null,
			'wins' => 0,
			'losses' => 0,
			'ties' => 0
		));
		Teams::create(array(
			'abbr' => 'nyj',
			'slug' => Str::slug('New York Jets'),
			'name' => 'New York',
			'nickname' => 'Jets',
			'icon' => null,
			'wins' => 0,
			'losses' => 0,
			'ties' => 0
		));
		Teams::create(array(
			'abbr' => 'oak',
			'slug' => Str::slug('Fuck the Raiders'),
			'name' => 'Oakland',
			'nickname' => 'Raiders',
			'icon' => null,
			'wins' => 0,
			'losses' => 0,
			'ties' => 0
		));
		Teams::create(array(
			'abbr' => 'phi',
			'slug' => Str::slug('Philadelphia Eagles'),
			'name' => 'Philadelphia',
			'nickname' => 'Eagles',
			'icon' => null,
			'wins' => 0,
			'losses' => 0,
			'ties' => 0
		));
		Teams::create(array(
			'abbr' => 'pit',
			'slug' => Str::slug('Pittsburgh Steelers'),
			'name' => 'Pittsburgh',
			'nickname' => 'Steelers',
			'icon' => null,
			'wins' => 0,
			'losses' => 0,
			'ties' => 0
		));
		Teams::create(array(
			'abbr' => 'stl',
			'slug' => Str::slug('Saint Louis Rams'),
			'name' => 'Saint Louis',
			'nickname' => 'Rams',
			'icon' => null,
			'wins' => 0,
			'losses' => 0,
			'ties' => 0
		));
		Teams::create(array(
			'abbr' => 'sdg',
			'slug' => Str::slug('San Diego Chargers'),
			'name' => 'San Diego',
			'nickname' => 'Chargers',
			'icon' => null,
			'wins' => 0,
			'losses' => 0,
			'ties' => 0
		));
		Teams::create(array(
			'abbr' => 'sea',
			'slug' => Str::slug('Seattle Seahawks'),
			'name' => 'Seattle',
			'nickname' => 'Seahawks',
			'icon' => null,
			'wins' => 0,
			'losses' => 0,
			'ties' => 0
		));
		Teams::create(array(
			'abbr' => 'tb',
			'slug' => Str::slug('Tampa Bay Buccaneers'),
			'name' => 'Tampa Bay',
			'nickname' => 'Buccaneers',
			'icon' => null,
			'wins' => 0,
			'losses' => 0,
			'ties' => 0
		));
		Teams::create(array(
			'abbr' => 'ten',
			'slug' => Str::slug('Tennessee Titans'),
			'name' => 'Tennessee',
			'nickname' => 'Titans',
			'icon' => null,
			'wins' => 0,
			'losses' => 0,
			'ties' => 0
		));
		Teams::create(array(
			'abbr' => 'was',
			'slug' => Str::slug('Washington Redskins'),
			'name' => 'Washington',
			'nickname' => 'Redskins',
			'icon' => null,
			'wins' => 0,
			'losses' => 0,
			'ties' => 0
		));
	}
 
}