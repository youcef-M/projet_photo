<?php

use Lib\Gestion\Follow\FollowGestion as FollowGestion;
use Lib\Validation\Follow\FollowCreateValidator as FollowCreateValidator;
use Lib\Validation\Follow\FollowDeleteValidator as FollowDeleteValidator;

class FollowController extends \BaseController {
    
    public function __construct(
        FollowCreateValidator $create_validation,
        FollowDeleteValidator $delete_validation,
        FollowGestion $follow_gestion
        
    )
    {
        $this->create_validation = $create_validation;
        $this->delete_validation = $delete_validation;
        $this->follow_gestion = $follow_gestion;
    }
    
    
    public function store()
    {
        if($this->create_validation->fails())
        {
            $statusCode = 404;
            $message = $this->create_validation->errors();
        }else{
            $this->follow_gestion->store();
            $statusCode = 200;
            $message = HTTP_OK;
        }
        return Response::json($message, $statusCode);
    }
    
    
    public static function following($id)
    {
        $following = $this->follow_gestion->following($id);
		if(is_null($following ))
		{
			$statusCode = 404;
			$message = HTTP_NOT_FOUND;
		}else{
			$statusCode = 200;
			$message = $following;
		}
		
		return Response::json($message, $statusCode);
    }
    
    
    public function followingIds($id)
    {
        $following = $this->follow_gestion->followingIds($id);
        if(is_null($following))
        {
            $statusCode = 404;
            $message = HTTP_NOT_FOUND;
        }else{
            $statusCode = 200;
            $message = $following;
        }
        return Response::json($message, $statusCode);
    }
    
    
    public static function followers($id)
    {
        $follower = $this->follow_gestion->follower($id);
		if(is_null($follower ))
		{
			$statusCode = 404;
			$message = HTTP_NOT_FOUND;
		}else{
			$statusCode = 200;
			$message = $follower;
		}
		
		return Response::json($message, $statusCode);
    }
    
    
    public function followersIds($id)
    {
        $followersIds = $this->follow_gestion->followersIds($id);
        if(is_null($followersIds))
        {
            $statusCode = 404;
            $message = HTTP_NOT_FOUND;
        }else{
            $statusCode = 200;
            $message = $followersIds;
        }
        return Response::json($message, $statusCode);
    }
    
    
    public function destroy()
    {
        if($this->delete_validation->fails())
        {
            $statusCode = 404;
            $message = $this->delete_validation->errors();
        }else{
            $user = Request::get('follower_id');
            $follow = Request::get('following_id');
            $tuple = Follow::where('user_id', $user)->where('follow_id', $follow)->first();
            if(is_null($tuple))
            {
                $statusCode = 404;
                $message = HTTP_NOT_FOUND;
            }else{
                $this->follow_gestion->destroy();
                $statusCode = 200;
                $message = HTTP_OK;
            }
        }
        return Response::json($message,$statusCode);
    }
}
