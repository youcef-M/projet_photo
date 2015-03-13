<?php

use Lib\Validation\User\UserUpdateValidator 	as UserUpdateValidator;
use Lib\Validation\User\UserCreateValidator 	as UserCreateValidator;
use Lib\Validation\User\UserLoginValidator  	as UserLoginValidator;
use Lib\Validation\User\UserActivateValidator 	as UserActivateValidator;
use Lib\Validation\User\UserAvatarValidator 	as UserAvatarValidator;
use Lib\Validation\GeneralListValidator 		as GeneralListValidator;
use Lib\Gestion\User\UserGestion 				as UserGestion;
use Lib\Check\User\UserCheck					as UserCheck;

class UserController extends \BaseController 
{
	public function __construct(
		UserUpdateValidator 	$update_validation,
		UserCreateValidator 	$create_validation,
		UserLoginValidator		$login_validation,
		UserActivateValidator 	$activate_validation,
		UserAvatarValidator		$avatar_validation,
		GeneralListValidator 	$list_validation,
		UserGestion 			$user_gestion,
		UserCheck 				$user_check
	){
		$this->update_validation 	= $update_validation;
		$this->create_validation 	= $create_validation;
		$this->login_validation  	= $login_validation;
		$this->activate_validation 	= $activate_validation;
		$this->avatar_validation	= $avatar_validation;
		$this->list_validation 		= $list_validation;
		$this->user_gestion 		= $user_gestion;
		$this->user_check 			= $user_check;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if($this->list_validation->fails())
		{
			return BaseController::httpError($this->list_validation);
		}else{
			return BaseController::httpContent($this->user_gestion->index(),'users');
		}
	}
	

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if ($this->create_validation->fails()) {
			return BaseController::httpError($this->create_validation);
		}else{
			$this->user_gestion->store();
			return BaseController::httpOk();
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if($this->user_check->missing($id))
		{
			return BaseController::httpNotFound();
		}else{
			return BaseController::httpContent($this->user_gestion->show($id));
		}
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if ($this->update_validation->fails($id)) {
			return BaseController::httpError($this->update_validation);
		}else{
			if($this->user_check->missing($id)){
				return BaseController::httpNotFound();
			}else{
				$this->user_gestion->update($id);
				return BaseController::httpOk();
			}
		}
    	
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if($this->user_check->missing($id)){
			return BaseController::httpNotFound();
		}else{
			$this->user_gestion->destroy($id);
			return BaseController::httpOk();
		}
	}

	/**
	 * Check if the user exist and has the right password.
	 *
	 * @return Response
	 */
	public function login()
	{
		if($this->login_validation->fails())
		{
			return BaseController::httpError($this->login_validation);
		}else{
			if($this->user_check->badLogin())
			{
				return BaseController::httpNotFound();
			}else{
				return BaseController::httpContent($this->user_gestion->login());
			}
		}
	}

	/**
	 * Activate a specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function activate()
	{
		if ($this->activate_validation->fails()) {
			return BaseController::httpError($this->activate_validation);
		}else{
			if($this->user_check->badToken()){
				return BaseController::httpNotFound();
			}else{
				$this->user_gestion->activate();
				return BaseController::httpOk();
			}
		}
	}
	
	public function avatar($id)
	{
		/*if($this->avatar_validation->fails())
		{
			return BaseController::httpError($this->avatar_validation);
		}else*/if($this->user_check->missing($id)){
			return BaseController::httpNotFound();
		}else{
			$this->user_gestion->avatar($id);
			return BaseController::httpOk();
		}
	}
	
}