<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	public $timestamps = true;
	
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
	protected $hidden = array('password', 'token');

	public function posts(){
		return $this->hasMany('Post');
	}
	
	public function follower(){
		return $this->belongsToMany('User', 'follow', 'follow_id', 'user_id')->withTimestamps();
	}
	
	public function following(){
		return $this->belongsToMany('User', 'follow', 'user_id', 'follow_id')->withTimestamps();
	}
	
	public function asking()
	{
		return $this->belongsToMany('User', 'friends', 'friend_id', 'user_id');  
	}
	
	public function asked()
	{
		return $this->belongsToMany('User','friends','user_id','friend_id');
	}
	
	public function groups()
	{
		return $this->belongsToMany('User', 'member', 'user_id', 'group_id');
	}
	
	public function votes()
	{
		return $this->hasMany('Vote');
	}

}