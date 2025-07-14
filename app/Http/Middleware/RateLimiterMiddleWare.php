<?php

namespace App\Http\Middleware;

use App\Http\Requests\AuthRequest;
use App\Traits\HandleRateLimiting;
use Closure;
use Illuminate\Cache\RateLimiter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class RateLimiterMiddleWare
{
    use HandleRateLimiting;
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next , string $name, int $maxAttempts = 5 , int $decay = 120): Response
    {
        if($request->method() !== 'GET'){
            $isRateLimited =  $this->rateLimiting($name, $maxAttempts, $decay);

            if($isRateLimited){
                return redirect()->back()->withErrors(['rate-limiter' => $this->message]);
            }
        }

        return $next($request);
    }
}
