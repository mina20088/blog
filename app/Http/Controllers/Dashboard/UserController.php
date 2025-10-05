<?php

/** @noinspection PhpVoidFunctionResultUsedInspection */

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Profile;
use Clockwork\Clockwork;
use App\services\UsersService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Traits\HandlesUserOperations;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Storage;
use Clockwork\Support\Doctrine\Legacy\Logger;


class UserController extends Controller
{
    use HandlesUserOperations;


    public function index(SearchRequest $request, UsersService $userService)
    {

        $users = $this
            ->setup($request, $userService)
            ->search();


        $columns = $this->getUsersTableColumnNameList($userService);

        return view('dashboard.users.index', [
            'users' => $users,
            'columns' => $columns
        ]);
    }


    public function resetFilters(): RedirectResponse
    {
        return redirect()->route('dashboard.users');
    }

    public function create()
    {

        return view('dashboard.users.create');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        ds($request->validated());
        return redirect()->back();
    }

}
