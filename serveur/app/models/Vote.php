<?php
	
class Vote extends Eloquent{
	
	protected $table = 'votes';
	
		public $timestamps = true;
	
		public function user()
		{
			return $this->belongsTo('User');
		}
		
		public function posts() 
		{
			return $this->belongsTo('Post');
		}

}