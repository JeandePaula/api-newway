<?php

namespace App\Domains\Products\Validators;

use App\Validator\ValidatorInterface;

class RankingValidator implements ValidatorInterface
{
    public static function rules($idPK = null)
	{
		return [
			'product_id' => 'required|numeric'
		];
	}
}
