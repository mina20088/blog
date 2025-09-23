<?php

use App\Models\User;
use App\services\UsersService;




$service = app(UsersService::class);

$service
    ->whereAny('m')->profile()->getQuery()->get();

    


//$users->count();
