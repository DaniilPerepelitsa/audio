<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
//
//Route::prefix('/user')->group(function () {
//    Route::get('/login', [LoginController::class, 'loginView']);
//    Route::post('/login', [LoginController::class, 'login'])->name('api.login');
//    Route::middleware('auth:api')->get('/all', [LoginController::class, 'getAll']);
//    Route::post('/logout', [LogoutController::class, 'logout']);
//    Route::post('/register', [RegisterController::class, 'register']);
//});

//Route::middleware('auth')->prefix('/user')->group(function () {
//
//});




