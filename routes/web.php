<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\HomeController;
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



Route::prefix('dashboard')->name('dashboard.')->group(function(){
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('users');
});

















