<?php namespace Lib\Validation;

class UserLoginValidator extends BaseValidator {

    public function __construct()
	{
		$this->regles = array(
			'username' => 'required|max:30|alpha|min:3',
			'password' => 'required|alpha_num|min:8'
		);
	}

}