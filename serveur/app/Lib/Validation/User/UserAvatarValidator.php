<?php 

namespace Lib\Validation\User;
use Lib\Validation\BaseValidator as BaseValidator;

class UserAvatarValidator extends BaseValidator {

    public function __construct()
	{
		$this->regles = array(
			'photo'     =>  'required'
		);
	}

}