<?php

use App\Events\MessagePushed;
use App\Http\Controllers\AudioController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\FBController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Stripe\StripePaymentController;
use App\Http\Controllers\TestController;
use Google\Client;
use GoogleMaps\GoogleMaps;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
//use Analytics;
use Spatie\Analytics\Period;


Route::get('/', function () {
    return view('welcome');
});

Route::get('audio/upload', [AudioController::class, 'uploadForm'])->name('upload.form');
Route::post('audio/upload', [AudioController::class, 'uploadAudio'])->name('upload.audio');

Route::get('audio/player', [AudioController::class, 'playerView'])->name('player');
Route::get('api/play-list', [AudioController::class, 'getPlaylist'])->name('get.playlist');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');


Route::group(['middleware' => 'guest'],
    function (){
        Route::get('/sign-in/github', [LoginController::class, 'github'])->name('github');
        Route::get('/sign-in/github/redirect', [LoginController::class, 'githubRedirect']);

        Route::get('/login/facebook', [LoginController::class, 'facebook'])->name('facebook');
        Route::get('/login/facebook/redirect', [LoginController::class, 'facebookRedirect']);
    });

Route::get('/test', [TestController::class, 'test'])->name('test');


