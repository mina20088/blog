<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Traits\HandleRateLimiting;

class LoginController extends Controller
{
    use HandleRateLimiting;

    public function create()
    {
        return view('auth.login' ,['title' => "login"]);
    }



    public function store(AuthRequest $request)
    {

        $validated =  $request->validated();

    }

}
