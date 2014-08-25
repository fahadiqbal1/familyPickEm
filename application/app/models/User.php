<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public static $rules = array(
		'firstName'=>'required|alpha|min:2',
		'lastName'=>'required|alpha|min:2',
		'teamname'=>'required|min:2|unique:users',
		'email'=>'required|email|unique:users',
		'password'=>'required|alpha_num|between:6,12|confirmed',
		'password_confirmation'=>'required|alpha_num|between:6,12',
		'recaptcha_response_field' => 'required|recaptcha',
		);
	public static $profile_rules = array(
		'teamname'=>'required|min:2|unique:users',
		'password'=>'required|alpha_num|between:6,12|confirmed',
		'password_confirmation'=>'required|alpha_num|between:6,12'
		);

}
