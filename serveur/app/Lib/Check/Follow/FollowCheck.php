<?php

namespace Lib\Check\Follow;

use Lib\Gestion\Follow\FollowGestion as FollowGestion;
use Follow;
use User;
use Request;


class FollowCheck implements FollowCheckInterface {
    
    public function __construct(
        FollowGestion $follow_gestion
    )
    {
        $this->follow_gestion = $follow_gestion;
    }
    
    
    public function missing()
    {
        $user = Request::get('follower_id');
        $follow = Request::get('following_id');
        return is_null(Follow::where('user_id', $user)->where('follow_id', $follow)->first());
    }
    
    
    public function missingUser()
    {
        $user = User::find(Request::get('follower_id'));
        $follow = User::find(Request::get('following_id'));
        return is_null($user) || is_null($follow);
    }
    
    
    public function noFollowing($id)
    {
        return is_null($this->follow_gestion->following($id));
    }
    
    
    public function noFollowers($id)
    {
        return is_null($this->follow_gestion->follower($id));
    }
}