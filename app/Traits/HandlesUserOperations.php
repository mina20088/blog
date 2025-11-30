<?php

namespace App\Traits;



use App\Enums\UploadTypes;
use App\Http\Requests\SearchRequest;
use App\Models\User;
use App\services\ProfileService;
use Carbon\Carbon;
use App\services\UsersService;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request;


trait HandlesUserOperations
{

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

    public function listUsers(SearchRequest $request): LengthAwarePaginator|AbstractPaginator
    {
        return UsersService::listUsers($request->validated());
    }

    public function getUsersTableColumnNameList(UsersService $userService)
    {
        return Cache::remember('users_table_columns_list', Carbon::now()->addMinutes(10), static function () use ($userService) {
            return UsersService::listUsersTableColumnsExcept('id', 'password', 'locked', 'remember_token', 'created_at', 'updated_at', 'deleted_at');
        });

    }

    public function createUser(mixed $validated): User
    {

        $profileImage = Request::file('profile_picture');

        $path = $profileImage->storeAs('profile',$profileImage->hashName(), 'public' );

        $user = UsersService::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        ProfileService::create([
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
        ],$user)  ;

        $upload = $this->usersService->uploadProfileImage([
            'name' => $profileImage->getClientOriginalName(),
            'path' => $path,
            'type' => UploadTypes::Profile,
            'mime_type' => $profileImage->getMimeType(),
            'size' => $profileImage->getSize(),
        ])  ;


        return $user;
    }

    public function editUsername(User $user): User
    {
          Cache::forget('users');
         return $this->usersService->editUsername($user, $this->request->input('username'));
    }

}

