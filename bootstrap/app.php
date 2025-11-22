<?php

use App\Http\Middleware\ClearQueryParamsWhenNoUsers;
use App\Http\Middleware\FilterNullQueryParams;
use App\Http\Middleware\RateLimiterMiddleWare;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'rate.limiter' => RateLimiterMiddleWare::class,
            'clear.query.no.users' => ClearQueryParamsWhenNoUsers::class,
            'sanitize_query' => FilterNullQueryParams::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
