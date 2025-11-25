<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsernamePatchRequest;
use App\Models\User;
use App\services\UsersService;
use App\Traits\HandlesUserOperations;

class UsernameController extends Controller
{
    use HandlesUserOperations;

    protected UsersService $service;

    public function __construct(UsersService $service)
    {
        $this->service = $service;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(UsernamePatchRequest $request, User $user)
    {

        $user = $this->initialize($this->service, $request)->editUsername($user);

        return redirect()
            ->route('dashboard.users.show', ['user' => $user])
            ->with('success', __('messages.user.update', ['id' =>  $user->id ]));

    }
}
