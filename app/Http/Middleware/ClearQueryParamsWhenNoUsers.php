<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class ClearQueryParamsWhenNoUsers
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next)
    {

        //$users = User::all();
        if ($request
                ->routeIs('dashboard.users') &&
            User::count('id') <= 0 &&
            $request
                ->hasAny(['search', 'searchBy', 'orderBy', 'dir', 'filters']))
        {

            $request->query->replace([]);

            return redirect('/dashboard/users');
        }


        return $next($request);
    }
}
