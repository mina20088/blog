<?php

namespace App\Helpers;




use Illuminate\Http\Request;

class DashboardUsersViewHelpers
{

    public static function sortTogglers(Request $request, string $item = 'dir'): string
    {
        return $request->input($item) === 'asc' ? 'desc' : 'asc';
    }

    public static function requestHas()
    {
        return request()->hasAny([
            'search',
            'searchBy',
            'orderBy',
            'dir'
        ]);
    }

    public static function buildFilterUrl($newParams = [])
    {
        $currentParams = request()->except(['page']); // Exclude pagination
        $params = array_merge($currentParams, $newParams);

        // Remove empty parameters
        $params = array_filter($params, function ($value) {
            return !is_null($value) && $value !== '';
        });

        return route('dashboard.users', $params);
    }
}
