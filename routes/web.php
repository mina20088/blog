<?php

use App\Http\Controllers\Dashboard;
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


Route::get('/dashboard', Dashboard::class)->name('dashboard');
















