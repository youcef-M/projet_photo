<?php 

namespace Lib\Validation\User;
use Lib\Validation\BaseValidator as BaseValidator;

class UserActivateValidator extends BaseValidator {

    public function __construct()
	{
		$this->regles = array(
			'token'     =>  'required|string:value'
		);
	}

}