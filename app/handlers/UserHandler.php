<?php

namespace App\handlers;


use Illuminate\Http\Request;
use App\Services\UsersService;
use App\Traits\HandlesUserOperations;

class UserHandler
{
    use HandlesUserOperations;

    public function handle(Request $request, UsersService $service)
    {
        $this->setup($request, $service)->search();
    }
}
