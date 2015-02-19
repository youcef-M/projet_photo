<?php 

namespace Lib\Validation\Post;
use Lib\Validation\BaseValidator as BaseValidator;

class PostPrivacyValidator extends BaseValidator {

    public function __construct()
	{
		$this->regles = array(
			'privacy'       =>  'required',
		);
	}

}