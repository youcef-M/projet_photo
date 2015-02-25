<?php 

namespace Lib\Validation\Comment;
use Lib\Validation\BaseValidator as BaseValidator;

class CommentUpdateValidator extends BaseValidator {

    public function __construct()
	{
		$this->regles = array(
			'content'			=>	'required|max:255|string:value|min:3',
			'user_id'			=>	'required',
			'post_id'			=>	'required'
		);
	}

}