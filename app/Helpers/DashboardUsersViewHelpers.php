<?php

namespace App\Helpers;




use Illuminate\Http\Request;

class DashboardUsersViewHelpers
{

    public static function sortTogglers(Request $request, string $item = 'dir'): string
    {
        return $request->input($item) === 'asc' ? 'desc' : 'asc';
    }

    public static function requestHasActiveFilters(): bool
    {
        return request()->hasAny([
            'search',
            'searchBy',
            'orderBy',
            'dir',
            'filters'
        ]);
    }

}
