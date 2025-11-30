<?php

/** @noinspection PhpVoidFunctionResultUsedInspection */

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\SearchRequest;
use App\Models\User;
use App\services\UsersService;
use App\Http\Controllers\Controller;
use App\Traits\HandlesUserOperations;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;



class UserController extends Controller
{
    use HandlesUserOperations;

    protected UsersService $service;


    public function __construct(UsersService $service)
    {
        $this->service = $service;
    }


    public function index(SearchRequest $request)
    {
        $users = $this->listUsers($request);

        return view('dashboard.users.index', [
            'users' => $users ,
            'columns' => $this->getUsersTableColumnNameList($this->service)
        ]);
    }


    public function create()
    {
        return view('dashboard.users.create');
    }

    public function store(StoreUserRequest $request, UsersService $service): RedirectResponse
    {
       /* $user = $this->initialize($service, $request)->createUser($request->validated());*/

        $user = $this->createUser($request->validated());

        return redirect()
            ->route('dashboard.users')
            ->with('success', __('messages.user.success', ['id' => $user->id]));
    }

    public function show(User $user)
    {
        return view('dashboard.users.show', ['user' => $user]);
    }

}
