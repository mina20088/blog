<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Middleware\RateLimiterMiddleWare;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\ClearQueryParamsWhenNoUsers;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')
                ->prefix("auth")
                ->name("auth.")
                ->group(base_path("routes/auth.php"));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'rate.limiter' => RateLimiterMiddleWare::class,
            'clear.query.no.users' => ClearQueryParamsWhenNoUsers::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
