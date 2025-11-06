<?php

namespace App\Traits;


use App\Models\User;
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

    public function search(): LengthAwarePaginator|AbstractPaginator
    {
        return $this->usersService
            ->selectColumnsFromUsers(['id', 'first_name', 'last_name', 'email', 'username', 'locked'])
            ->search()
            ->searchBy()
            ->filterByAccountStatus()
            ->filterByGender()
            ->filterByCountry()
            ->filterByCity()
            ->orderBy()
            ->profile()
            ->getQuery()
            ->paginate($this->request->per_page ?? 10)
            ->withQueryString();

    }

    public function getUsersTableColumnNameList(UsersService $userService)
    {
        return Cache::remember('users_table_columns_list', now()->addDays(10), static function () use ($userService) {
            return $userService->listUsersTableColumnsExcept('id', 'password', 'locked', 'remember_token', 'created_at', 'updated_at', 'deleted_at');
        });

    }

    public function createUser(mixed $validated): User
    {
        $profileImage = $this->request->file('profile_picture');

        $path = $profileImage->storeAs('profile',$profileImage->hashName(), 'public' );


        $mimiType = $profileImage->getMimeType();

        $originalFilename = $profileImage->getClientOriginalName()      ;

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
            'name' => $originalFilename,
            'path' => $path,
            'mime_type' => $profileImage->getMimeType(),
            'size' => $profileImage->getSize(),
        ])  ;

        return $user;
    }

}

