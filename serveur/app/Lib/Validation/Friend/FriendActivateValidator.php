<?php 

namespace Lib\Validation\Friend;
use Lib\Validation\BaseValidator as BaseValidator;

class FriendActivateValidator extends BaseValidator {

    public function __construct()
	{
		$this->regles = array(
			'user_id'		=>	'required',
			'friend_id'			=>	'required',
		);
	}

}