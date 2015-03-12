<?php

namespace Lib\Check\Vote;
use User;
use Post;
use Request;
use Vote;

class VoteCheck implements VoteCheckInterface {
    
    public function missingPost($id)
    {
        return is_null(Post::find($id)->first());
    }
    
    
    public function badVote()
    {
        $user = Request::get('user_id');
    	$post = Request::get('post_id');
    	$vote = Vote::where('user_id',$user)->where('post_id',$post)->first();
    	return is_null($user) || is_null($post);
    }
    
    
    public function missingVote()
    {
	    $user = Request::get('user_id');
    	$post = Request::get('post_id');
		$vote = Vote::where('user_id',$user)->where('post_id',$post)->first();
		if(is_null($vote))
		{
		    return true;
		}else{
		    return false;
		}
    }
}