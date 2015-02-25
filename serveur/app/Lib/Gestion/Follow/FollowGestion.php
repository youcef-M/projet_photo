<?php namespace Lib\Gestion\Follow;

use Follow;
use User;
use Request;
use Str;
use Route;

class FollowGestion implements FollowGestionInterface {
    
    public function store()
    {
        $user1 = User::find(Request::get('follower_id'));
        $user2 = User::find(Request::get('following_id'));
        $user1->following()->save($user2);
    }
    
    public static function following($id)
    {   
        $user = User::find($id);
        return $user->following;
    }

    public function followingIds($id)
    {
        return $this->following($id)->lists('id');
    }
    
    public static function followers($id)
    {
        $user = User::find($id);
        return $user->follower;
    }

    public function followersIds($id)
    {
        return $this->followers($id)->lists('id');
    }
    
    public function destroy()
    {
        $user = Request::get('follower_id');
        $follow = Request::get('following_id');
        
        Follow::where('user_id', $user)->where('follow_id', $follow)->delete();
    }
    
}