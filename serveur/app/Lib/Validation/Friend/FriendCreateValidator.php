<?php 

namespace Lib\Validation\Friend;

use Lib\Validation\BaseValidator as BaseValidator;

class FriendCreateValidator extends BaseValidator {

    public function __construct()
	{
		$this->regles = array(
			'user_id'		=>	'required',
			'friend_id'		=>	'required'
		);
	}

}