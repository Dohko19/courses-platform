<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('set_language/{lang}', [Controller::class, 'setLanguage'])->name('set_language');

Route::get('login/{driver}', [LoginController::class, 'redirectToProvider'])->name('social_auth');
Route::get('login/{driver}/callback', [LoginController::class, 'handleProviderCallback']);

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
