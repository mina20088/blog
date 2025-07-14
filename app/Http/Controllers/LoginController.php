<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Traits\HandleRateLimiting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    use HandleRateLimiting;

    public function create()
    {
        return view('users.login' ,['title' => "login"]);
    }



    public function store(AuthRequest $request)
    {

        $validated =  $request->validated();

    }

}
