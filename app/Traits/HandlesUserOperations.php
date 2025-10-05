<?php

namespace App\Traits;



use Illuminate\Http\Request;
use App\services\UsersService;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Database\Eloquent\Builder;


trait HandlesUserOperations
{

    protected Request $request;

    protected UsersService $usersService;


    public function setup(Request $request, UsersService $service): self
    {
        $this->request = $request;

        $this->usersService = $service;

        return $this;

    }

    public function search(): \Illuminate\Pagination\LengthAwarePaginator|AbstractPaginator
    {

        return $this->usersService
            ->selectColumnsFromUsers(['id', 'first_name', 'last_name', 'email', 'username', 'locked'])
            ->search()
            ->searchBy()
            ->filterByAccountStatus()
            ->filterByGender()
            ->filterByCountry()
            ->filterByCity()
            ->orderBy()
            ->profile()
            ->getQuery()
            ->paginate($this->request->per_page ?? 10)
            ->withQueryString();

    }
    public function getUsersTableColumnNameList(UsersService $userService)
    {
        return Cache::remember('users_table_columns_list', now()->addDays(10), static function () use ($userService) {
            return $userService->listUsersTableColumnsExcept('id', 'password', 'locked', 'remember_token', 'created_at', 'updated_at', 'deleted_at');
        });

    }
}

