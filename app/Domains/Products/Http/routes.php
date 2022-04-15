<?php

use Illuminate\Support\Facades\Route;
use App\Domains\Products\Http\Controllers\ProductController;
use App\Domains\Products\Http\Controllers\TypeController;
use App\Domains\Products\Http\Controllers\RankingMovieController;
use App\Domains\Products\Http\Controllers\RankingController;

Route::group(['middleware' => ['auth:sanctum']], function(){

    Route::group(['prefix' => 'product'], function(){

        Route::group(['prefix' => 'type'], function(){
            Route::get('/', [TypeController::class, 'index']);
            Route::get('/{id}', [TypeController::class, 'show']);
            Route::post('/', [TypeController::class, 'create']);
            Route::put('/{id}', [TypeController::class, 'update']);
            Route::delete('/{id}', [TypeController::class, 'destroy']);
        });

        Route::get('/', [ProductController::class, 'index']);
        Route::get('/{id}', [ProductController::class, 'show']);
        Route::post('/', [ProductController::class, 'create']);
        Route::put('/{id}', [ProductController::class, 'update']);
        Route::delete('/{id}', [ProductController::class, 'destroy']);

    });

    Route::group(['prefix' => 'ranking'], function(){

        Route::get('/movie', [RankingMovieController::class, 'index']);
        // Route::get('/{id}', [ProductController::class, 'show']);
        Route::post('/', [RankingController::class, 'create']);
        // Route::put('/{id}', [ProductController::class, 'update']);

     
    });
    
});