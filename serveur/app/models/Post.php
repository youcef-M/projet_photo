<?php
	
class Post extends Eloquent{
	
	protected $table = 'posts';
	
		public $timestamps = true;
	
		public function user()
		{
			return $this->belongsTo('User');
		}
		
		public function comments() 
		{
			return $this->hasMany('Comment');
		}

		public function posts()
		{
			return $this->hasMany('Vote');
		}
}