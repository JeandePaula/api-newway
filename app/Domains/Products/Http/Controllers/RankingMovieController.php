<?php

namespace App\Domains\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Domains\Products\Services\RankingMovieService;
use App\Domains\Products\Http\Resources\RankingMovieResource;

class RankingMovieController extends Controller
{
    protected $service = RankingMovieService::class;
	protected $resourceIndex = RankingMovieResource::class;
	protected $resourceShow = RankingMovieResource::class;    
}
