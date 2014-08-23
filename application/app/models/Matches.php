<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
 
class Matches extends Eloquent
{
	protected $table = 'matches';
	protected $hidden = array('created_at', 'updated_at');
}