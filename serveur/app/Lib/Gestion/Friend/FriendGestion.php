<?php
namespace Lib\Gestion\Friend;

use User;
use Request;
use Friend;

class FriendGestion implements FriendGestionInterface {
    
    public function index($id)
    {
		$friendsIds = FriendGestion::friendsIds($id);
		$friends = User::whereIn('id', $friendsIds)->get();
		return $friends;
    }
    
    
    public static function friendsIds($id)
    {
    	$asking = Friend::where('user_id',$id)->lists('friend_id');
    	$asked = Friend::where('friend_id',$id)->lists('user_id');
		$friends = array_unique(array_merge($asking, $asked));
		return $friends;
    }
    

    
    public function store()
    {
    	$user = User::find(Request::get('user_id'));
    	$friend = User::find(Request::get('friend_id'));
    	$user->asked()->save($friend);
    }
    
    
    public function activate()
    {
    	$asking = Request::get('user_id');
    	$asked = Request::get('friend_id');
    	$relation = Friend::where('user_id',$asking)->where('friend_id',$asked)->first();
    	if(!is_null($relation))
    	{
    		$relation->active = 1;
    		$relation->save();
    	}
    }
    
    /**
     * Liste des demandes en ami.
     */
    public function waiting($id)
    {
    	$askingIds = Friend::where('friend_id',$id)->where('active',0)->lists('user_id');
    	$friends = User::whereIn('id', $askingIds)->get();
    	return $friends;
    }
    
    public function destroy()
    {
    	$asking =Request::get('user_id');
    	$asked = Request::get('friend_id');
    	Friend::where('user_id',$asking)->where('friend_id',$asked)->delete();
    }
    
}