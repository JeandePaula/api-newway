<?php

use Illuminate\Support\Facades\Route;
use App\Domains\Users\Http\Controllers\UserController;
use App\Domains\Users\Http\Controllers\LoginController;



Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show']);