<?php 

namespace Lib\Validation\Group;
use Lib\Validation\BaseValidator as BaseValidator;

class GroupUpdateValidator extends BaseValidator {

    public function __construct()
	{
		$this->regles = array(
			'name'			=>	'required|max:255|min:3',
		);
	}

}