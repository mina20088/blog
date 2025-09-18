<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Dashboard\DashboardController;

Route::controller(HomeController::class)->group(function () {
    Route::get("/", 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
});

Route::controller(RegistrationController::class)->middleware('rate.limiter:register')->group(function () {
    Route::get('/register', 'create')->name('register');
    Route::post('/register', 'store');
});


Route::controller(LoginController::class)->middleware('rate.limiter:login')->group(function () {
    Route::get('/login', 'create')->name('login');
    Route::post('/login', 'store');
});



Route::prefix('dashboard')->middleware(['clear.query.no.users'])->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/reset-filters', [UserController::class, 'resetFilters'])->name('users.reset-filters');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
});
