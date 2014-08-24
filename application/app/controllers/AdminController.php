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
		$matches = Matches::where('weekNumber', '=', $weekNumber);
		$data = array('user'=>$user);
		$this->layout->content = View::make('admin.updateWeek', $data);
		$this->layout->nest('navbar', 'layouts.navbar', $data);
	}

}