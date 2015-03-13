<?php
	
class RestrictUser extends Eloquent{

    protected $table = 'restrict_user';
    
    public $timestamps = true;

    protected $fillable = ['post_id','user_id'];
}