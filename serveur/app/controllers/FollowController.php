<?php

use Lib\Validation\Follow\FollowCreateValidator as FollowCreateValidator;
use Lib\Validation\Follow\FollowDeleteValidator as FollowDeleteValidator;
use Lib\Validation\GeneralListValidator 		as GeneralListValidator;
use Lib\Gestion\Follow\FollowGestion            as FollowGestion;
use Lib\Check\Follow\FollowCheck                as FollowCheck;

class FollowController extends \BaseController {
    
    public function __construct(
        FollowCreateValidator   $create_validation,
        FollowDeleteValidator   $delete_validation,
        GeneralListValidator 	$list_validation,
        FollowGestion           $follow_gestion,
        FollowCheck             $follow_check
        
    )
    {
        $this->create_validation    = $create_validation;
        $this->delete_validation    = $delete_validation;
        $this->list_validation 		= $list_validation;
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
    
    
    public function following($id)
    {
		if($this->list_validation->fails())
		{
			return BaseController::httpError($this->list_validation);
		}if($this->follow_check->noFollowing($id))
		{
			return BaseController::httpNotfound();
		}else{
			return BaseController::httpContent($this->follow_gestion->following($id),'following');
		}
    }
    
    
    public function alreadyFollow()
    {
        if($this->follow_check->missing())
        {
            return BaseController::httpNotfound();
        }else{
            return BaseController::httpOk();
        }
    }
    
    
    public function followingPages($id)
    {
          return ceil(Follow::where('user_id',$id)->count()/10);
    }
    
    public function followers($id)
    {
		if($this->list_validation->fails())
		{
			return BaseController::httpError($this->list_validation);
		}if($this->follow_check->noFollowers($id))
		{
			return BaseController::httpNotfound();
		}else{
			return BaseController::httpContent($this->follow_gestion->followers($id),'followers');
		}
    }

    public function followersPages($id)
    {
          return ceil(Follow::where('follow_id',$id)->count()/10);
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
