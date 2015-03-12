<?php

use Lib\Validation\Follow\FollowCreateValidator as FollowCreateValidator;
use Lib\Validation\Follow\FollowDeleteValidator as FollowDeleteValidator;
use Lib\Gestion\Follow\FollowGestion            as FollowGestion;
use Lib\Check\Follow\FollowCheck                as FollowCheck;

class FollowController extends \BaseController {
    
    public function __construct(
        FollowCreateValidator   $create_validation,
        FollowDeleteValidator   $delete_validation,
        FollowGestion           $follow_gestion,
        FollowCheck             $follow_check
        
    )
    {
        $this->create_validation    = $create_validation;
        $this->delete_validation    = $delete_validation;
        $this->follow_gestion       = $follow_gestion;
        $this->follow_check         = $follow_check;
    }
    
    
    public function store()
    {
        //dd($this->follow_check->missing());
        if($this->create_validation->fails())
        {
            return BaseController::httpError($this->create_validation);
        }elseif($this->follow_check->missingUser()){
            return BaseController::httpNotfound();
        }elseif(!$this->follow_check->missing()){
            return BaseController::httpExist();
        }else{
            $this->follow_gestion->store();
            return BaseController::httpOk();
        }
    }
    
    
    public static function following($id)
    {
		if($this->follow_check->noFollowing($id))
		{
			return BaseController::httpNotfound();
		}else{
			return BaseController::httpContent($following,'following');
		}
    }
    
    
    public static function followers($id)
    {
		if($this->follow_check->noFollowers($id))
		{
			return BaseController::httpNotfound();
		}else{
			return BaseController::httpContent($followers,'followers');
		}
    }

    
    public function destroy()
    {
        if($this->delete_validation->fails())
        {
           return BaseController::httpError($this->delete_validation);
        }else{
            if($this->follow_check->missing())
            {
                return BaseController::httpNotfound();
            }else{
                $this->follow_gestion->destroy();
                BaseController::httpOk();
            }
        }
    }
}
