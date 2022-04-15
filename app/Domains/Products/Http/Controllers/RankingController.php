<?php

namespace App\Domains\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Domains\Products\Services\RankingService;

class RankingController extends Controller
{
    protected $service = RankingService::class;
}
