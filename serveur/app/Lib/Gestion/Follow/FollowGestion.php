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
    
    public function following($id)
    {   
        $user = User::find($id);
        return $user->following;
    }

    public static function followingIds($id)
    {
        $user = User::find($id);
        return $user->following->lists('id');
    }
    
    public function followers($id)
    {
        $user = User::find($id);
        return $user->follower;
    }

    public static function followersIds($id)
    {
        $user = User::find($id);
        return $user->follower->lists('id');
    }
    
    public function destroy()
    {
        $user = Request::get('follower_id');
        $follow = Request::get('following_id');
        
        Follow::where('user_id', $user)->where('follow_id', $follow)->delete();
    }
    
}