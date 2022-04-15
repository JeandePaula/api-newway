<?php

namespace App\Domains\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Domains\Products\Services\TypeService;
use App\Domains\Products\Http\Resources\TypeResource;

class TypeController extends Controller
{
    protected $service = TypeService::class;
	protected $resourceShow = TypeResource::class;
	protected $resourceIndex = TypeResource::class;
    
}
