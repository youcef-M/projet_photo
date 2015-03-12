<?php 

namespace Lib\Validation;
use Lib\Validation\BaseValidator as BaseValidator;

class GeneralListValidator extends BaseValidator {

    public function __construct()
	{
		$this->regles = array(
			'page'		=>	'required|integer',
		);
	}

}