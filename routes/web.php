<?php

use App\Http\Controllers\AudioController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BestInterviewQuestionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('audio/player');
});

Route::get('audio/upload', [AudioController::class, 'uploadForm'])->name('upload.form');

Route::post('audio/upload', [AudioController::class, 'uploadAudio'])->name('upload.audio');

Route::get('audio/mine', [AudioController::class, 'myMusic'])->name('my.music');

Route::get('audio/player', [AudioController::class, 'playerView'])->name('player');
Route::get('api/play-list', [AudioController::class, 'getPlaylist'])->name('get.playlist');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'guest'],
    function (){
        Route::get('/sign-in/github', [LoginController::class, 'github'])->name('github');
        Route::get('/sign-in/github/redirect', [LoginController::class, 'githubRedirect']);

        Route::get('/login/facebook', [LoginController::class, 'facebook'])->name('facebook');
        Route::get('/login/facebook/redirect', [LoginController::class, 'facebookRedirect']);
    });

Route::get('/test', [TestController::class, 'test'])->name('test');

Route::get('/sign_in', [\App\Http\Controllers\Api\Auth\LoginController::class, 'loginView']);
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/qr', function (){
    \SimpleSoftwareIO\QrCode\Facades\QrCode::size(250)->format('png')->generate('Hello', public_path('images/qrcode.png'));
});

Route::get('/pdfview', [BestInterviewQuestionController::class, 'pdfview'])->name('pdfview');
