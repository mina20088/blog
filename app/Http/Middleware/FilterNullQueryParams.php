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
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $quaryParams = $request->query->all();

        $filterParams = array_filter($quaryParams, function ($value) {

            return $value !== null && $value !== '';

        });


        if (count($filterParams) !== count($quaryParams)) {

            $request->replace($filterParams);

            if (count($filterParams) > 0) {

                return redirect()->route('dashboard.users', $filterParams);
            }

        }


        if (array_key_exists('per_page', $quaryParams)) {
            if ($quaryParams['per_page'] == '' || $quaryParams['per_page'] == null) {

                $request->replace([]);

                return redirect()->route('dashboard.users');

            }
        }




        return $next($request);
    }
}
