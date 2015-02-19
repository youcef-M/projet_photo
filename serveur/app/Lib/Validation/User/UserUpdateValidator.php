<?php 

namespace Lib\Validation\User;
use Lib\Validation\BaseValidator as BaseValidator;

class UserUpdateValidator extends BaseValidator {

    public function __construct()
	{
		$this->regles = array(
			'username' 		=>	'required|alpha|unique:users,username,id|min:3',
			'email' 		=>	'required|unique:users,email,id|email',
			'password' 		=>	'required|alpha_num|min:8'
		);
	}

}