<?php

/** @noinspection PhpVoidFunctionResultUsedInspection */

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\SearchRequest;
use App\Models\User;
use App\services\UsersService;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreUserRequest;


class UserController extends Controller
{

    public function index(SearchRequest $request)
    {
        $users = UsersService::listUsers($request->validated());

        return view('dashboard.users.index', [
            'users' => $users ,
            'columns' => UsersService::listUsersTableColumnsExcept('id', 'password', 'locked', 'remember_token', 'created_at', 'updated_at', 'deleted_at')
        ]);
    }


    public function create()
    {
        return view('dashboard.users.create');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $user = UsersService::create(user:$request->userData(), profile: $request->profileData(), uploadImage: $request->imageData());

        return redirect()
            ->route('dashboard.users')
            ->with('success', __('messages.user.success', ['id' => $user->id]));
    }

    public function show(User $user)
    {
        return view('dashboard.users.show', ['user' => $user]);
    }

}
