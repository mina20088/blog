<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FilterNullQueryParams
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $queryParams = $request->query->all();

        $filterParams = array_filter($queryParams,  static function ($value) {

            return $value !== null && $value !== '';

        });


        if (count($filterParams) !== count($queryParams)) {

            $request->replace($filterParams);

            if (count($filterParams) > 0) {

                return redirect()->route('dashboard.users', $filterParams);
            }

        }


        if (array_key_exists('per_page', $queryParams)) {
            if ($queryParams['per_page'] === '' || $queryParams['per_page'] === null) {

                $request->replace([]);

                return redirect()->route('dashboard.users');

            }
        }




        return $next($request);
    }
}
