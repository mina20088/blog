<?php

namespace App\Providers;

use App\Models\User;
use App\services\UsersService;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;


class UsersServiceProvider extends ServiceProvider
{

    /*
     * Register services.
     */
    public function register(): void
    {

        $this->app->bind(UsersService::class, function($app, $params){

            return new UsersService(
                User::query(),
                Request::has('search') ? Request::input('search') : ($params['term'] ?? ''),
                Request::has('searchBy') ? Request::input('searchBy') : ($params['searchBy'] ?? []),
                Request::has('filters') ? Request::input('filters') : ($params['filters'] ?? []),
                Request::has('orderBy') ? Request::input('orderBy') : ($params['orderBy'] ?? 'id'),
                Request::has('dir') ? Request::input('dir') : ($params['orderDir'] ?? 'asc')
            );
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
