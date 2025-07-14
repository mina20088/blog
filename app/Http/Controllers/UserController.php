<?php

namespace App\Http\Controllers;

use App\Helpers\Logger;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UsersService;
use App\Traits\HandleRateLimiting;



class UserController extends Controller
{
    use HandleRateLimiting;
    public UsersService $usersService;

    public function __construct(UsersService $usersService)
    {
        $this->usersService = $usersService;
    }

    public function index()
    {
        $users = $this->usersService->all();

        $columns = $this->usersService->listUsersTableColumns('username', 'email_verified_at', 'locked', 'role','password');

        return view('users.index', compact('users', 'columns'));
    }

    public function show(string $username)
    {
        $user = $this->usersService->get('username', $username);
        return view('users.show', compact('user'));
    }

    public function edit(string $username){

        $user = $this->usersService->get('username', $username);

        return view('users.edit', ['title' => $username , 'user' => $user]);
    }

    public function update(UpdateUserRequest $request, string $username){

        $validate =  $request->validated();

        $updatedUser = $this->usersService->update($validate, 'username', $username);

        //$updatedUser = $this->usersService->UpdateOrCreate(compact('username'), $validate);

        return redirect()->route('user.edit', ['username' =>  $updatedUser->username])->with('success', 'user updated successfully');
    }
}
