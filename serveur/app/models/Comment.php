<?php
	
class Comment extends Eloquent{

    protected $table = 'comments';

    public $timestamps = true;

    public function user(){
	    return $this->belongsTo('User');
	}

}