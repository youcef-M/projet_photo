<?php 

namespace Lib\Validation\Post;
use Lib\Validation\BaseValidator as BaseValidator;

class PostCreateValidator extends BaseValidator {

    public function __construct()
	{
		$this->regles = array(
			'titre'         =>  'required|max:255|string:value|min:3',
			'privacy'       =>  'required',
			'user_id'       =>  'required'
		);
	}

}