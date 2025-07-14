<?php

namespace App\Providers;

use App\Helpers\Logger;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        RateLimiter::for('user-updates', function (Request $request) {
          return Limit::perMinutes(2, 4)->by('user-updates')->response(function () use ($request) {
                return redirect()
                    ->route('user.update', ['username' => $request->username])
                    ->withErrors(['email' => 'you have exceeded the limit for this update request please try again after '. RateLimiter::availableIn('user-updates') . ' seconds']);
            });
        });

        Password::defaults(function () {
            return Password::min(8)->letters()->numbers()->mixedCase()->uncompromised();
        });
    }
}
