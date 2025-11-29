<?php

namespace App\Traits;


use App\Enums\UploadTypes;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\services\UsersService;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;


trait HandlesUserOperations
{

    protected Request $request;

    protected UsersService $usersService;


    public function initialize(UsersService $service, Request $request): self
    {
        $this->request = $request;

        $this->usersService = $service;

        return $this;

    }

    public function init(UsersService $service): self
    {
        $this->usersService = $service;
        return $this;
    }

    public function listUsers(): LengthAwarePaginator|AbstractPaginator
    {
        return  Cache::remember('users',Carbon::now()->addMinutes(10), function(){
            return $this->usersService->listUsers();
        });
    }

    public function getUsersTableColumnNameList(UsersService $userService)
    {
        return Cache::remember('users_table_columns_list', Carbon::now()->addMinutes(10), static function () use ($userService) {
            return $userService->listUsersTableColumnsExcept('id', 'password', 'locked', 'remember_token', 'created_at', 'updated_at', 'deleted_at');
        });

    }

    public function createUser(mixed $validated): User
    {
        $profileImage = $this->request->file('profile_picture');

        $path = $profileImage->storeAs('profile',$profileImage->hashName(), 'public' );


        $user = $this->usersService->createUser([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        $profile = $this->usersService->createProfile([
            'bio' => $validated['bio'],
            'github_repo_url' => $validated['github_repo_url'],
            'date_of_birth' => $validated['date_of_birth'],
            'gender' => $validated['gender'],
            'phone_number' => $validated['phone_number'],
            'country' => $validated['country'],
            'city' => $validated['city'],
            'street' => $validated['street'],
            'state' => $validated['state'],
            'website' => $validated['website'],
            'zip_code' => $validated['zip_code'],
            'x' => $validated['x'],
            'instagram' => $validated['instagram'],
            'facebook' => $validated['facebook'],
        ])  ;

        $upload = $this->usersService->uploadProfileImage([
            'name' => $profileImage->getClientOriginalName(),
            'path' => $path,
            'type' => UploadTypes::Profile,
            'mime_type' => $profileImage->getMimeType(),
            'size' => $profileImage->getSize(),
        ])  ;

        Cache::forget('users');

        return $user;
    }

    public function editUsername(User $user): User
    {
          Cache::forget('users');
         return $this->usersService->editUsername($user, $this->request->input('username'));
    }

}

