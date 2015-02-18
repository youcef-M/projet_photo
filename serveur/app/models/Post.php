<?php
	
	class Post extends Eloquent{
        
        protected $table = 'posts';
        
		public $timestamps = true;

		public function user(){
			return $this->belongsTo('User');
		}

	}