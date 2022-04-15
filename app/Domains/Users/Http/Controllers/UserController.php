<?php

namespace App\Domains\Users\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Domains\Users\Services\UserService;
use App\Domains\Users\Http\Resources\UserShowResource;
use App\Domains\Users\Http\Resources\UserIndexResource;

class UserController extends Controller
{
    protected $service = UserService::class;
	protected $resourceShow = UserShowResource::class;
	protected $resourceIndex = UserIndexResource::class;
    
}
