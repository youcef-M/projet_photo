<?php 

namespace Lib\Validation\Post;
use Lib\Validation\BaseValidator as BaseValidator;

class PostUpdateValidator extends BaseValidator {

    public function __construct()
	{
		$this->regles = array(
			'titre'         =>  'required|max:255|alpha|min:3',
			'privacy'       =>  'required',
		);
	}

}