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

        $this->app->bind(UsersService::class, function($app){

            return new UsersService(User::query(),Request::input('searchBy', []), Request::input('filters', []));
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
