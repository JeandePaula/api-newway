<?php

namespace App\Domains\Products\Repositories;

use App\Repository\RepositoryBase;
use App\Domains\Products\Models\Type;

class TypeRepository extends RepositoryBase
{
    protected $model = Type::class;
}
