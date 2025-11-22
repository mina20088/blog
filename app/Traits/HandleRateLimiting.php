<?php

namespace App\Traits;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;

trait HandleRateLimiting
{
    public string $message;

    public function rateLimiting(string $name, int $maxAttempts = 5 , int $decaySeconds = 50): bool
    {


        $hits = RateLimiter::hit($name, $decaySeconds);

        if (RateLimiter::tooManyAttempts($name, $maxAttempts)) {

            $seconds = RateLimiter::availableIn($name);

             $this->message = 'you have exceeded the limit for this request try after ' . $seconds . ' seconds';

            Log::alert($name, [
                'time' => Carbon::now() ,
                'decayAfter' => $seconds,
                'message' => $this->message,
                'attempts' => RateLimiter::attempts($name),
                'tryAt' => Carbon::now()->addSeconds($seconds)
            ]);

            /*throw ValidationException::withMessages([$name => $message]);*/

            return true;
        }

        return false;
    }
}
