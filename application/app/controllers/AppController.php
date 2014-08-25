<?php

class AppController extends \BaseController {

	protected $layout = "layouts.main";

	private function generateUserData()
	{
		if(Auth::check()) { return Auth::user(); }	
	}

	public function __construct()
	{
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('auth');
	}

	public function getWelcome()
	{
		$user = $this->generateUserData();
		$menu = array();
		for ($i=1; $i < 18; $i++) { 
			$menu[$i] = $this->checkIfPickMade($user->id,$i);
		}
		$leaderboard = User::orderBy('points','desc')->get();
		$teams = Teams::orderBy('wins','desc')
					->paginate(8);
		$data = array('user'=>$user, 'menu'=>$menu,'leaderboard'=>$leaderboard, 'teams'=>$teams);
		$this->layout->content = View::make('app.welcome', $data);
		$this->layout->nest('navbar', 'layouts.navbar', $data);
	}

	public function getProfile($userId)
	{
		$data = array('user'=>$this->generateUserData());
		$this->layout->content =  View::make('app.profile')->with('user', User::find($userId));;
		$this->layout->nest('navbar', 'layouts.navbar', $data);
	}

	public function postUpdateProfile($userId){
		$validator = Validator::make(Input::all(), User::$profile_rules);
		if ($validator->passes()) {
			$user = User::where('id',$userId)->first();
				$user->teamname = Input::get('teamname');
				$user->password = Hash::make(Input::get('password'));
			$user->save();
			return Redirect::action('AppController@getWelcome')->with('message', 'Profile has been updated!')->with('msg_lvl', 'success');
		} else {
			return Redirect::action('AppController@getProfile', $userId)
				->with('message', 'The following errors occurred')
				->with('msg_lvl', 'danger')
				->withErrors($validator)->withInput();
		}
	}

	public function getMakePick($week=null)
	{
		if ($week == null) {
			$data = array('user'=>$this->generateUserData());
			$this->layout->content = 'Pick a week foo!';
			$this->layout->nest('navbar', 'layouts.navbar', $data);
		} else {
			$active = $this->checkIfActiveWeek($week);
			if ($active) {
				$games = $this->generateRandomGames($week);
				$data = array('user'=>$this->generateUserData(), 'week'=>$week, 'games'=>$games);
				$this->layout->content = View::make('app.make-pick', $data);
				$this->layout->nest('navbar', 'layouts.navbar', $data);
			} else {
				return Redirect::action('AppController@getWelcome')
					->with('message', 'You can\'t make picks for an old week silly!')
					->with('msg_lvl', 'info');
			}
		}
	}

	public function getViewPick($week = null)
	{
		if ($week == null) {
			$data = array('user'=>$this->generateUserData());
			$this->layout->content = 'Pick a week foo!';
			$this->layout->nest('navbar', 'layouts.navbar', $data);
		} else {
			$games = $this->generateMadePicks($week,$this->generateUserData()->id);
			$data = array('user'=>$this->generateUserData(), 'week'=>$week, 'games'=>$games);
			$this->layout->content = View::make('app.view-pick', $data);
			$this->layout->nest('navbar', 'layouts.navbar', $data);
		}
	}

	private function generateRandomGames($week)
	{
		$games =  Matches::select(DB::raw('*
									, (SELECT CONCAT(name, " ", nickname) FROM `pickem_teams` as T WHERE T.abbr = `homeTeam` ) AS HomeTeam
									, (SELECT CONCAT(name, " ", nickname) FROM `pickem_teams` as T WHERE T.abbr = `awayTeam` ) AS AwayTeam'))
							->where('weekNumber','=',$week)
							->orderBy(DB::raw('RAND()'))
							->take(5)
							->get();
		return $games;
	}

	private function generateMadePicks($week, $id)
	{
		$games = Picks::select(DB::raw('*
									, (SELECT CONCAT(name, " ", nickname) FROM `pickem_teams` as T WHERE T.abbr = `homeTeam` ) AS HomeTeam
									, (SELECT CONCAT(name, " ", nickname) FROM `pickem_teams` as T WHERE T.abbr = `awayTeam` ) AS AwayTeam
									, (SELECT CONCAT(name, " ", nickname) FROM `pickem_teams` as T WHERE T.abbr = `pick` ) AS Pick
									, (SELECT CONCAT(name, " ", nickname) FROM `pickem_teams` as T WHERE T.abbr = `winner` ) AS Winner'))
					->join('matches', 'picks.match_id', '=', 'matches.id')
					->where('weekNumber','=',$week)
					->where('user_id','=',$id)
					->get();
		return $games;
	}

	private function checkIfPickMade($user, $week)
	{
		$active = $this->checkIfActiveWeek($week);
		if ($active) {
			$picksMade = Picks::join('matches', 'picks.match_id', '=', 'matches.id')
							->where('user_id','=',$user)
							->where('matches.weekNumber','=',$week)
							->count();
			if ($picksMade > 0) {
				return 'Y';
			} else {
				return 'N';
			}
		} else {
			return 'I';
		}
		
	}

	private function checkIfActiveWeek($weekNumber)
	{
		$week = Matches::select('gameDate')
					->where('weekNumber','=',$weekNumber)
					->min('gameDate');
		$today = new DateTime(date('Y-m-d'));
		$minGame = new DateTime($week);
		$interval = $today->diff($minGame);
		if ($today > $minGame) {
			$active = false;
		} else {
			$active = true;
		}
		return $active;
	}
}
