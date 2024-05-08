<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\APIController;

Route::get('/', function () {
    return view('index');
});

Route::post('/users', [UserController::class, 'store']);

Route::get('/validate-username', [UserController::class, 'validateUsername']);

Route::get('/check-actors', [APIController::class, 'checkActors']);