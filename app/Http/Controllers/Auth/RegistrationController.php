<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\RegistrationRequest;


class RegistrationController extends Controller
{

    public function create()
    {
        return view('auth.register');
    }

    public function store(RegistrationRequest $request): RedirectResponse
    {

       $validated =  $request->validated();

        User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'username' => $validated['username'],
            'password' => $validated['password'],
        ]);

        return redirect()->route('register')->with('success', 'Registration was successful!');

    }
}
