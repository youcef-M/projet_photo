<?php

namespace Lib\Gestion\Vote;

use Vote;
use User;
use Request;

class VoteGestion implements VoteGestionInterface {
    
    public function likes($id)
    {
    	return Vote::where('post_id',$id)->where('note',1)->count();
    }
    
    
    public function dislikes($id)
    {
    	return Vote::where('post_id',$id)->where('note',-1)->count();
    }
    
    
    public function like()
    {
    	$user = Request::get('user_id');
    	$post = Request::get('post_id');
    	$vote = new Vote;
    	$vote->user_id = $user;
    	$vote->post_id = $post;
    	$vote->note = 1;
    	$vote->save();
    }
    
    
    public function dislike()
    {
    	$user = Request::get('user_id');
    	$post = Request::get('post_id');
    	$vote = new Vote;
    	$vote->user_id = $user;
    	$vote->post_id = $post;
    	$vote->note = -1;
    	$vote->save();
    }

	public function destroy()
	{
		$user = Request::get('user_id');
    	$post = Request::get('post_id');
		$vote = Vote::where('user_id',$user)->where('post_id',$post)->first();
		$vote->delete();
	}
	
}