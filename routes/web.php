<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RateLimiterMiddleWare;


Route::controller(HomeController::class)->group(function(){
    Route::get("/", 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact','contact')->name('contact');
});

Route::controller(RegistrationController::class)->middleware(RateLimiterMiddleWare::class.':register')->group(function(){
    Route::get('/register', 'create')->name('register');
    Route::post('/register','store');
});


Route::controller(LoginController::class)->middleware(RateLimiterMiddleWare::class.':login')->group(function() {
    Route::get('/login', 'create')->name('login');
    Route::post('/login', 'store');
});


Route::prefix('users')->name('user.')->middleware([RateLimiterMiddleWare::class. ':update.user'])->controller(UserController::class)->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/edit/{username}', 'edit')->name('edit');
    Route::get('/show/{username}', 'show')->name('show');
    Route::put('/edit/{username}', 'update')->name('update');
});

Route::prefix('posts')->name('post.')->controller(PostsController::class)->group(function(){
    Route::get('/', 'index')->name('index');
});










