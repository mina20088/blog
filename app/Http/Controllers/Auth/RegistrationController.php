<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use App\Services\UsersService;


class RegistrationController extends Controller
{

    public UsersService $usersService;

    public function __construct(UsersService $usersService){
        $this->usersService = $usersService;
    }
    public function create()
    {
        return view('auth.register');
    }

    public function store(RegistrationRequest $request){

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
