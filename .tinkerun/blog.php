<?php

use App\Models\User;
use App\services\UsersService;

$service = app(UsersService::class);



$service->listUsersTableColumnsExcept('password','remember_token' ,'created_at', 'updated_at', 'deleted_at');
