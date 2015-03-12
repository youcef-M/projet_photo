<?php
	
class Friend extends Eloquent{

    protected $table = 'friends';
    
    public $timestamps = true;

    protected $fillable = ['user_id','friend_id','active_id'];
}