<?php

/** @noinspection PhpVoidFunctionResultUsedInspection */

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\services\UsersService;
use App\Http\Controllers\Controller;
use App\Traits\HandlesUserOperations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    use HandlesUserOperations;

    protected UsersService $service;


    public function __construct(UsersService $service)
    {
        $this->service = $service;
    }


    public function index(Request $request)
    {

        $user = User::query()
            ->select('users.first_name', 'users.last_name' , 'users.email', 'users.username', 'users.id', 'users.locked')
            ->when($request->has('search') || $request->has('searchBy'), function (Builder $query) use ($request) {
                $query->whereFullText( $request->input('searchBy') ?? ['first_name', 'last_name', 'email', 'username'], "{$request->input('search')}*", ['mode' => 'boolean']);
            })
            ->when($request->has('filters') && $request->input('filters.locked') !== null , function (Builder $query) use ($request) {
                $query->where('locked', (int)$request->input('filters.locked'));
            })
            ->with('profile:user_id,gender')
            ->paginate($request->per_page ?? 10);


        return view('dashboard.users.index', [
            'users' => $user,
            'columns' => $this->getUsersTableColumnNameList($this->service)
        ]);
    }


    public function create()
    {
        return view('dashboard.users.create');
    }

    public function store(StoreUserRequest $request, UsersService $service): RedirectResponse
    {
        $user = $this->initialize($service, $request)->createUser($request->validated());

        return redirect()->route('dashboard.users')->with('success', __('messages.user.success', ['id' => $user->id]));
    }

    public function show(User $user)
    {

        return view('dashboard.users.show', ['user' => $user]);
    }

}
