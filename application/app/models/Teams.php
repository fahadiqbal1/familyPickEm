<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
 
class Teams extends Eloquent
{
	protected $table = 'teams';
	protected $hidden = array('created_at', 'updated_at');
}