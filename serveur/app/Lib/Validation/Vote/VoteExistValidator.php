<?php 

namespace Lib\Validation\Vote;

use Lib\Validation\BaseValidator as BaseValidator;

class VoteExistValidator extends BaseValidator {

    public function __construct()
	{
		$this->regles = array(
			'user_id'			=>  'required',
			'post_id'			=>	'required'
		);
	}

}