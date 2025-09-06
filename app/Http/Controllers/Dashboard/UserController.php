<?php

/** @noinspection PhpVoidFunctionResultUsedInspection */

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\services\UsersService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SearchFilterRequest;

class UserController extends Controller
{
    public function index(SearchRequest $request, UsersService $userService): View
    {
        $columns = $userService->listUsersTableColumnsExcept('password','remember_token' ,'created_at', 'updated_at', 'deleted_at');

        $users = $userService
            ->search($request->input('search')?? '', $request->input('searchBy') ?? [])
            ->sort($request->input('sortBy') ?? 'id')
            ->getQuery()
            ->get();

        return view('dashboard.users.index', [
            'users' => $users,
            'columns' => $columns,
        ]);
    }


    public function resetFilters(): RedirectResponse
    {
        Session::forget('results');

        return redirect()->route('dashboard.users');
    }

    public function create()
    {

        return view('dashboard.users.create');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $validated = collect($request->validated());

        //$profileImage = $request->file('profile_picture')->store('profile', 'public');

        //$uploaded = Storage::disk('public')->put(Str::uuid() . '.' . $profileImage->getClientOriginalExtension(), $profileImage);
        // $uploaded = Storage::put('profile/' . Str::uuid() . '.' . $profileImage->getClientOriginalExtension(), $profileImage, ['visibility' => 'public']);



        $userData = $validated->only(['first_name', 'last_name', 'email', 'username', 'password'])->toArray();

        $profileData = $validated->except(['first_name', 'last_name', 'email', 'password', 'profile_picture'])->toArray();

        $profileImage = Storage::putFile('profile', $request->file('profile_picture'), ['visibility' => 'public']);
        $user = User::create($userData);
        $user->profile()->create(array_merge($profileData, ['profile_picture' => $profileImage]));


        return redirect()->back();
    }
}
