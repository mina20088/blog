<?php

namespace App\Helpers;



use Illuminate\Http\Request;

class ViewHelpers
{

    public static function sortTogglers(Request $request,string $item ='dir'): string
    {
        return $request->input($item) === 'asc' ? 'desc' : 'asc';
    }

    public static function sessionHasValue(string $key): bool
    {
        return \Session::has($key);
    }

}
