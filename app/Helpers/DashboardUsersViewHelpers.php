<?php

namespace App\Helpers;




use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardUsersViewHelpers
{

    public static function sortTogglers(Request $request,string $item ='dir'): string
    {
        return $request->input($item) === 'asc' ? 'desc' : 'asc';
    }

    public static function requestHas(){
       return request()->hasAny([
            'search',
            'searchBy'
        ]);
    }

}
