<?php

namespace App\Domains\Products\Validators;

use App\Validator\ValidatorInterface;

class TypeValidator implements ValidatorInterface
{
    public static function rules($idPK = null)
	{
		return [
			'name' => 'required|string|min:5|max:45'
		];
	}
}
