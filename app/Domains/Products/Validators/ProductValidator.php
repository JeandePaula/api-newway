<?php

namespace App\Domains\Products\Validators;

use App\Validator\ValidatorInterface;

class ProductValidator implements ValidatorInterface
{
    public static function rules($idPK = null)
	{
		return [
			'name' => 'required|string|min:5|max:45',
			'type_id' => 'required|numeric'
		];
	}
}
