<?php

namespace Lib\Check\Friend;

use Lib\Gestion\Friend\FriendGestion as FriendGestion;
use Friend;
use User;
use Request;


class FriendCheck implements FriendCheckInterface {
    
    public function __construct(
        FriendGestion $friend_gestion
    )
    {
        $this->friend_gestion = $friend_gestion;
    }
    
    
    public function missing()
    {
        $asking = Request::get('user_id');
    	$asked  = Request::get('friend_id');
        $first  = Friend::where('user_id',$asking)->where('friend_id',$asked)->first();
        return is_null($first) ;
    }
    
    public function exist()
    {
        $asking = Request::get('user_id');
    	$asked  = Request::get('friend_id');
        $first  = Friend::where('user_id',$asking)->where('friend_id',$asked)->first();
        $second = Friend::where('user_id',$asked)->where('friend_id',$asking)->first();
        return !is_null($first) || !is_null($second);
    }
    
    public function missingUser()
    {
        $user   = User::find(Request::get('user_id'));
        $friend = User::find(Request::get('friend_id'));
        return is_null($user) || is_null($friend);
    }
    
    
    public function noFriends($id)
    {
        return count($this->friend_gestion->index($id)) == 0;
    }
    
    
    public function noWaiting($id)
    {
        return count($this->friend_gestion->waiting($id)) == 0;
    }
}