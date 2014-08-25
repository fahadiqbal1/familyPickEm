<?php

class AdminController extends \BaseController {

	protected $layout = "layouts.main";

	public function getIndex($userId)
	{
		$user = User::find($userId);
		if( $user->admin == 1 )
		{
			$data = array('user'=>$user);
			$this->layout->content = View::make('admin.index', $data);
			$this->layout->nest('navbar', 'layouts.navbar', $data);
		} else {
			return Redirect::action('AppController@getWelcome')
				->with('message', 'You dont have access to that page :(')
				->with('msg_lvl', 'danger');
		}
	}

	public function getUpdateWeek($weekNumber,$userId)
	{
		$user = User::find($userId);
		$matches = Matches::select(DB::raw('*
									, (SELECT CONCAT(name, " ", nickname) FROM `pickem_teams` as T WHERE T.abbr = `homeTeam` ) AS HomeTeam
									, (SELECT CONCAT(name, " ", nickname) FROM `pickem_teams` as T WHERE T.abbr = `awayTeam` ) AS AwayTeam
									, (SELECT CONCAT(name, " ", nickname) FROM `pickem_teams` as T WHERE T.abbr = `winner` ) AS Winner'))
					->where('weekNumber', '=', $weekNumber)
					->orderBy('gameDate', 'Asc')
					->orderBy('gameTime', 'Asc')
					->get();
		$data = array('user'=>$user, 'matches'=>$matches, 'weekNumber'=>$weekNumber);
		$this->layout->content = View::make('admin.updateWeek', $data);
		$this->layout->nest('navbar', 'layouts.navbar', $data);
	}

	public function postUpdateMatch($matchID,$weekNumber,$userId)
	{
		$validator = Validator::make(Input::all(), Matches::$update_rules);
		if ($validator->passes()) {
			$match = Matches::where('id',$matchID)->first();
				$match->winner = Input::get('winner');
			$match->save();
			$updateUserPoints = $this->matchPicks($matchID, Input::get('winner'));
			$updateTeamRecords = $this->matchTeams($matchID, Input::get('winner'));
			return Redirect::action('AdminController@getUpdateWeek',array($weekNumber,$userId));
		} else {
			return Redirect::action('AdminController@getUpdateWeek',array($weekNumber,$userId))
				->with('message', 'Must select a winner!')
				->with('msg_lvl', 'danger')
				->withErrors($validator)->withInput();
		}
	}

	private function matchPicks($matchID, $winner)
	{
		$picks = Picks::where('match_id','=',$matchID)->get();
		if ($picks->count() > 0) {
			foreach ($picks as $pick) {
				$userWithPick = User::find($pick->user_id);
					$currentPts = $userWithPick->points;
				//check if the user's pick is correct
				if ($pick->pick === $winner) {
						$updatedPts = $currentPts + 3;
						$userWithPick->points = $updatedPts;
				}
				$userWithPick->save();
			}
		}
		return true;
	}

	private function matchTeams($matchID, $winner)
	{
		$match = Matches::where('id', '=', $matchID)->first();
		$matchHome = $match->homeTeam;
		$matchAway = $match->awayTeam;

		if ($matchHome === $winner)
		{
			$team = Teams::where('abbr',$matchHome)->first();
				$current = $team->wins;
				$new = $current + 1;
				$team->wins = $new;
			$team->save();
		}
		elseif ($matchAway === $winner)
		{
			$team = Teams::where('abbr',$matchAway)->first();
				$current = $team->wins;
				$new = $current + 1;
				$team->wins = $new;
			$team->save();
		}

		if ($matchHome !== $winner)
		{
			$team = Teams::where('abbr',$matchHome)->first();
				$current = $team->losses;
				$new = $current + 1;
				$team->losses = $new;
			$team->save();
		}
		elseif ($matchAway !== $winner)
		{
			$team = Teams::where('abbr',$matchAway)->first();
				$current = $team->losses;
				$new = $current + 1;
				$team->losses = $new;
			$team->save();
		}

		return true;
	}
}