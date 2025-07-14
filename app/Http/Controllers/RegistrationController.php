<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Services\UsersService;


class RegistrationController extends Controller
{

    public UsersService $usersService;

    public function __construct(UsersService $usersService){
        $this->usersService = $usersService;
    }
    public function create()
    {
        return view('users.register');
    }
    public function store(RegistrationRequest $request){

       $request->validated();

       $fields = [
           'name' => $request->firstName . ' ' . $request->lastName,
           'email' => $request->email,
           'username' => $request->username,
           'password' => \Hash::make($request->password),
       ];

       $created = $this->usersService->createWithoutDuplicate($fields);

       if($created == 0 || !$created){
           return redirect()->back()->with('failed', 'There was an error creating the user.');
       }

       return redirect()->back()->with('success', 'you have successfully registered',);
    }
}
