<?php

/** @noinspection PhpVoidFunctionResultUsedInspection */

namespace App\Http\Controllers\Dashboard;
use App\services\UsersService;
use App\Http\Controllers\Controller;
use App\Traits\HandlesUserOperations;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;


class UserController extends Controller
{
    use HandlesUserOperations;


    public function index(Request $request, UsersService $userService)
    {

        $users = $this
            ->initialize($userService, $request)
            ->search();

        $columns = $this->getUsersTableColumnNameList($userService);

        return view('dashboard.users.index', [
            'users' => $users,
            'columns' => $columns
        ]);
    }


    public function reset(): RedirectResponse
    {
        return redirect()->route('dashboard.users');
    }

    public function create()
    {
        return view('dashboard.users.create');
    }

    public function store(StoreUserRequest $request, UsersService $service): RedirectResponse
    {
        $user = $this->init($service)->createUser($request->validated());

        return redirect()
            ->route('dashboard.users')
            ->with(['success' => ''])    ;
    }

}
