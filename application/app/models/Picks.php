<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
 
class Picks extends Eloquent
{
	protected $table = 'picks';
	protected $hidden = array('created_at', 'updated_at');
}