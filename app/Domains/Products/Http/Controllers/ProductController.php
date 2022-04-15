<?php

namespace App\Domains\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Domains\Products\Services\ProductService;
use App\Domains\Products\Http\Resources\ProductShowResource;
use App\Domains\Products\Http\Resources\ProductIndexResource;

class ProductController extends Controller
{
    protected $service = ProductService::class;
	protected $resourceShow = ProductShowResource::class;
	protected $resourceIndex = ProductIndexResource::class;
    
}
