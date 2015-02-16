<?php namespace Lib\Validation;

class UserCreateValidator extends BaseValidator {

    public function __construct()
	{
		$this->regles = array(
			'username' => 'required|max:30|alpha|unique:users,username,id|min:3',
			'email' => 'required|email|unique:users,email,id',
			'password' => 'required|alpha_num|min:8'
		);
	}

}