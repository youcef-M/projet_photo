<?php

use Lib\Validation\UserUpdateValidator as UserUpdateValidator;
use Lib\Validation\UserCreateValidator as UserCreateValidator;

class UserController extends \BaseController 
{
	public function __construct(
		UserUpdateValidator $update_validation,
		UserCreateValidator $create_validation
	){
		$this->update_validation = $update_validation;
		$this->create_validation = $create_validation;
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
			$user = new User;
			$user->username = Request::get('username');
			$user->email = Request::get('email');
			$user->password = Hash::make(Request::get('password'));
			$user->active = 0;
			$user->token = md5(time() . ' - ' . uniqid());
			$user->save();
			$statusCode = 200;
			$message = "ok";
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
		return User::where(["id" => $id])->first();
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
			$user = User::find($id);
			$user->username = Request::get('username');
			$user->email = Request::get('email');
			$user->password = Hash::make(Request::get('password'));
			$user->save();
			$statusCode = 200;
			$message = "ok";
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
		User::find($id)->delete();
	}


}
