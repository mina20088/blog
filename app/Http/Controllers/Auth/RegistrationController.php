<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;


class RegistrationController extends Controller
{

    public function create()
    {
        return view('auth.register');
    }

    public function store(RegistrationRequest $request): RedirectResponse
    {

       $validated =  $request->validated();

       $createNewUser = User::create([
           'first_name' => $validated['firstName'],
           'last_name' => $validated['lastName'],
           'email' => $validated['email'],
           'username' => $validated['username'],
           'password' => $validated['password'],
       ]);

       if($createNewUser){
           return redirect()->route('register')->with('success', 'Registration was successful!');
       }

       return redirect()->back()->with('failure', 'User could not be created');



    }
}
