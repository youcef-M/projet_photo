<?php
	
class Group extends Eloquent{
	
	protected $table = 'groups';
	
	public $timestamps = true;
	
	public function members()
	{
		return $this->belongsToMany('User', 'member', 'group_id', 'user_id');
	}
	
	public function posts(){
		return $this->hasMany('Post');
	}
}