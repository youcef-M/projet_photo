<?php
use Lib\Validation\Friend\FriendCreateValidator 	as FriendCreateValidator;
use Lib\Validation\Friend\FriendActivateValidator	as FriendActivateValidator;
use Lib\Validation\Friend\FriendDeleteValidator		as FriendDeleteValidator;
use Lib\Validation\GeneralListValidator 			as GeneralListValidator;
use Lib\Gestion\Friend\FriendGestion				as FriendGestion;
use Lib\Check\Friend\FriendCheck					as FriendCheck;

class FriendController extends \BaseController {

	public function __construct(
		FriendCreateValidator 	$create_validator,
		FriendActivateValidator $activate_validator,
		FriendDeleteValidator	$delete_validator,
		GeneralListValidator 	$list_validation,
		FriendGestion 			$friend_gestion,
		FriendCheck				$friend_check
	)
	{
		$this->create_validation 	= $create_validator;
		$this->activate_validation 	= $activate_validator;
		$this->delete_validation	= $delete_validator;
		$this->list_validation 		= $list_validation;
		$this->friend_gestion 		= $friend_gestion;
		$this->friend_check			= $friend_check;
	}
	
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		if($this->list_validation->fails())
		{
			return BaseController::httpError($this->list_validation);
		}elseif($this->friend_check->noFriends($id)){
			return BaseController::httpNotFound();
		}else{
			return BaseController::httpContent($this->friend_gestion->index($id),'friends');
		}
	}
	
	public function friendPages($id)
	{
		$friends = Friend::where('user_id',$id)->where('active',1)->count() + Friend::where('friend_id',$id)->where('active',1)->count();
		return ceil($friends/10);
	}
	
    public function activate()
    {
    	if($this->activate_validation->fails())
		{
			return BaseController::httpError($this->activate_validation);
		}elseif($this->friend_check->missing()){
			return BaseController::httpNotFound();
		}else{
			$this->friend_gestion->activate();
			return BaseController::httpOk();
		}
    }
    
    public function alreadyAsked()
    {
        if(!$this->friend_check->exist())
        {
            return BaseController::httpNotfound();
        }else{
            return BaseController::httpOk();
        }
    }
    
    public function waiting($id)
    {
    	if($this->list_validation->fails())
		{
			return BaseController::httpError($this->list_validation);
		}elseif($this->friend_check->noWaiting($id))
        {
            return BaseController::httpNotFound();
        }else{
            return BaseController::httpContent($this->friend_gestion->waiting($id),'waiting_friends');
        }
    }
    
    public function waitingPages($id)
	{
		$friends = Friend::where('friend_id',$id)->where('active',0)->count();
		return ceil($friends/10);
	}
    
    

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{	
        if($this->create_validation->fails())
        {
            return BaseController::httpError($this->create_validation);
        }elseif($this->friend_check->missingUser()){
        	return BaseController::httpNotFound();
        }elseif($this->friend_check->exist()){
        	return BaseController::httpExist();	
        }else{
        	$this->friend_gestion->store();
            return BaseController::httpOk();
        }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		if($this->delete_validation->fails())
		{
			return BaseController::httpError($this->delete_validation);
		}
		elseif(!$this->friend_check->exist()){
			return BaseController::httpNotFound();
		}else{
		
			$this->friend_gestion->destroy();
			return BaseController::httpOk();
		}
	}


}
