<?php

namespace App\Traits;

use App\services\UsersService;
use Illuminate\Support\Facades\Cache;

trait HandlesUserOperations
{
    public function getUsers(UsersService $userService , string $search = '', array $searchby = [] , string $sortBy = 'id' , string $sortDir = 'asc' )
    {
        return $userService
            ->search($search ?? '' , $searchby ?? [])
            ->sort($sortBy ?? 'id', $sortDir)
            ->getQuery()
            ->get();
    }

    public function getUsersTableColumnNameList(UsersService $userService)
    {
        return Cache::remember('users_table_columns_list',now()->addDays(10), function()use($userService){
             return $userService->listUsersTableColumnsExcept('password','remember_token' ,'created_at', 'updated_at', 'deleted_at');
        });
    }
}
