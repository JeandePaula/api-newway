<?php

namespace App\Domains\Products\Repositories;

use App\Repository\RepositoryBase;
use App\Domains\Products\Models\Product;

class ProductRepository extends RepositoryBase
{
    protected $model = Product::class;
}
