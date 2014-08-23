<?php

class UserController extends \BaseController {

	protected $layout = "layouts.user";

	private function generateName()
	{
		if(Auth::check()){ return Auth::user()->firstName . ' ' . Auth::user()->lastName ; }
	}
	
	public function __construct()
	{
		$this->beforeFilter('csrf', array('on'=>'post'));
	}

	public function getLogin()
	{
		$data = array('name'=>$this->generateName());
		$this->layout->content = View::make('users.login');
		$this->layout->nest('navbar', 'layouts.navbar',$data);
	}

	public function getLogout() {
		Auth::logout();
		return Redirect::to('/users/login')->with('message', 'Your are now logged out!')->with('msg_lvl', 'success');
	}

	public function getRegister() {
		$data = array('name'=>$this->generateName());
		$this->layout->content = View::make('users.register');
		$this->layout->nest('navbar', 'layouts.navbar',$data);
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), User::$rules);
		if ($validator->passes()) {
			$user = new User;
				$user->firstName = Input::get('firstname');
				$user->lastName = Input::get('lastname');
				$user->email = Input::get('email');
				$user->password = Hash::make(Input::get('password'));
			$user->save();
			return Redirect::to('/users/login')->with('message', 'Thanks for registering!')->with('msg_lvl', 'success');
		} else {
			return Redirect::to('/users/register')
				->with('message', 'The following errors occurred')
				->with('msg_lvl', 'danger')
				->withErrors($validator)->withInput();
		}
	}

	public function postSignin() {
		if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
			return Redirect::to('/app/welcome')->with('message', 'You are now logged in!')->with('msg_lvl', 'success');
		} else {
			return Redirect::to('/users/login')
				->with('message', 'Your username/password combination was incorrect')
				->with('msg_lvl', 'danger')
				->withInput();
		}
	}

}
