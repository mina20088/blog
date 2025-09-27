<?php

namespace App\Traits;



use Illuminate\Http\Request;
use App\services\UsersService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Database\Eloquent\Builder;


trait HandlesUserOperations
{

    protected Request $request;

    protected UsersService $usersService;

    protected string $searchTerm;

    protected array $searchBy;

    protected array $filters;

    protected string $orderBy = 'id';

    protected string $dir = "asc";

    protected bool $hasSearch = false;

    protected bool $hasSearchBy = false;

    public function setup(Request $request, UsersService $service): self
    {
        $this->request = $request;

        $this->usersService = $service;

        $this->searchTerm = $request->input('search') ?? '';

        $this->searchBy = $request->input('searchBy') ?? [];

        $this->orderBy = $request->input('orderBy') ?? 'id';

        $this->hasSearch = $request->has('search');

        $this->filters = $request->input('filters', []);

        $this->hasSearchBy = $request->has('searchBy');

        $this->dir = $request->input('dir') ?? 'asc';

        return $this;

    }

    public function search(): \Illuminate\Database\Eloquent\Builder
    {

        $users = $this->usersService
            ->selectColumnsFromUsers(['id', 'first_name', 'last_name', 'email', 'username', 'locked'])
            ->whereAny($this->searchTerm)
            ->whereFirstName($this->searchTerm)
            ->whereLastName($this->searchTerm)
            ->whereEmail($this->searchTerm)
            ->whereUsername($this->searchTerm);

        if ($this->filters) {
            $users
                ->filterByAccountStatus($this->filters["locked"] ?? '')
                ->filterByGender($this->filters["gender"] ?? '');
        }


        $this->orderBy && $this->dir ? $users->orderBy($this->orderBy, $this->dir) : $users->orderBy();

        return $users
            ->profile()
            ->getQuery();

    }
    public function getUsersTableColumnNameList(UsersService $userService)
    {
        return Cache::remember('users_table_columns_list', now()->addDays(10), static function () use ($userService) {
            return $userService->listUsersTableColumnsExcept('id', 'password', 'locked', 'remember_token', 'created_at', 'updated_at', 'deleted_at');
        });

    }
}

