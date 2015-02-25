<?php

use Lib\Validation\User\UserUpdateValidator as UserUpdateValidator;
use Lib\Validation\User\UserCreateValidator as UserCreateValidator;
use Lib\Validation\User\UserLoginValidator  as UserLoginValidator;
use Lib\Validation\User\UserActivateValidator as UserActivateValidator;
use Lib\Gestion\User\UserGestion as UserGestion;

class UserController extends \BaseController 
{
	public function __construct(
		UserUpdateValidator $update_validation,
		UserCreateValidator $create_validation,
		UserLoginValidator	$login_validation,
		UserActivateValidator $activate_validation,
		UserGestion $user_gestion
	){
		$this->update_validation = $update_validation;
		$this->create_validation = $create_validation;
		$this->login_validation  = $login_validation;
		$this->activate_validation = $activate_validation;
		$this->user_gestion = $user_gestion;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return User::all();
	}
	

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if ($this->create_validation->fails()) {
			$statusCode = 404;
			$message = $this->create_validation->errors();
		}else{
			$this->user_gestion->store();
			$statusCode = 200;
			$message = HTTP_OK;
		}
    	return Response::json($message, $statusCode);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = $this->user_gestion->show($id);
		if(is_null($user))
		{
			$statusCode = 404;
			$message = HTTP_NOT_FOUND;
		}else{
			$statusCode = 200;
			$message = $user->toArray();
		}
		
		return Response::json($message, $statusCode);
		
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
			$statusCode = 404;
			$message = $this->update_validation->errors();
		}else{
			if(is_null($this->user_gestion->show($id))){
				$statusCode = 404;
				$message = HTTP_NOT_FOUND;
			}else{
				$this->user_gestion->update($id);
				$statusCode = 200;
				$message = HTTP_OK;
			}
			
		}
    	return Response::json($message, $statusCode);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if(is_null($this->user_gestion->show($id))){
			$statusCode = 404;
			$message = HTTP_NOT_FOUND;
		}else{
			$this->user_gestion->delete($id);
			$statusCode = 200;
			$message = HTTP_OK;
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
			$statusCode = 404;
			$message = $this->login_validation->errors();
		}else
		{
			$user = $this->user_gestion->login();
			if(is_null($user) || !Hash::check(Request::get('password'), $user->password) )
			{
				$statusCode = 404;
				$message = HTTP_NOT_FOUND;
			}else{
				$statusCode = 200;
				$message = $user->toArray();
			}
		}
		return Response::json($message, $statusCode);
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
			$statusCode = 404;
			$message = $this->activate_validation->errors();
		}else{
			if($this->user_gestion->activate()){
				$statusCode = 404;
				$message = HTTP_NOT_FOUND;
			}else{
				$statusCode = 200;
				$message = HTTP_OK;
			}
			
		}
    	return Response::json($message, $statusCode);
	}
	
}