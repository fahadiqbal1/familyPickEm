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
		for ($i=1; $i < 17; $i++) { 
			$menu[$i] = $this->checkIfPickMade($user->id,$i);
		}
		$data = array('user'=>$user, 'menu'=>$menu);
		$this->layout->content = View::make('app.welcome', $data);
		$this->layout->nest('navbar', 'layouts.navbar', $data);
	}

	public function getProfile($userId)
	{
		$data = array('user'=>$this->generateUserData());
		$this->layout->content = '<h2>Edit Yourself :-D</h2>';
		$this->layout->nest('navbar', 'layouts.navbar', $data);
	}

	public function getAdmin()
	{
		if( Auth::user()->email == 'admin' )
		{
			$teams = Teams::paginate(16);
			$data = array('user'=>$this->generateUserData(), 'teams'=>$teams);
			$this->layout->content = View::make('app.admin', $data);
			$this->layout->nest('navbar', 'layouts.navbar', $data);
		} else {
			return Redirect::to('app/welcome')
				->with('message', 'You dont have access to that page :(')
				->with('msg_lvl', 'danger');
		}
	}

	public function getMakePick($week=null)
	{
		if ($week == null) {
			$data = array('user'=>$this->generateUserData());
			$this->layout->content = 'Pick a week foo!';
			$this->layout->nest('navbar', 'layouts.navbar', $data);
		} else {
			$games = Matches::select(DB::raw('*, (SELECT name FROM `pickem_teams` as T WHERE T.abbr = `homeTeam` ) AS HomeTeam, (SELECT name FROM `pickem_teams` as T WHERE T.abbr = `awayTeam` ) AS AwayTeam'))
						->where('weekNumber','=',$week)
						->orderBy(DB::raw('RAND()'))
						->take(5)
						->get();
			$data = array('user'=>$this->generateUserData(), 'week'=>$week, 'games'=>$games);
			$this->layout->content = View::make('app.make-pick', $data);
			$this->layout->nest('navbar', 'layouts.navbar', $data);
		}
	}

	public function getViewPick($week = null)
	{
		if ($week == null) {
			$data = array('user'=>$this->generateUserData());
			$this->layout->content = 'Pick a week foo!';
			$this->layout->nest('navbar', 'layouts.navbar', $data);
		} else {
			return $this->checkIfActiveWeek(1);
		}
	}

	private function checkIfPickMade($user, $week)
	{
		$picksMade = Picks::join('matches', 'picks.match_id', '=', 'matches.id')
						->where('user_id','=',$user)
						->where('matches.weekNumber','=',$week)
						->count();
		if ($picksMade > 0) {
			return true;
		} else {
			return false;
		}
	}

	private function checkIfActiveWeek($weekNumber)
	{
		$week = Matches::select('gameDate')
					->where('weekNumber','=',$weekNumber)
					->min('gameDate');
		$today = date('Y-m-d');
		return $week . '  |  ' . $today;
	}
}
