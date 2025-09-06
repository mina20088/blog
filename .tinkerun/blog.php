<?php

use Illuminate\Support\Arr;
use App\services\UsersService;
use Illuminate\Support\Facades\Schema;




$userService = app(UsersService::class);

$users = $userService->search('j')->get();

$users->count();



