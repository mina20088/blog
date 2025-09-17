<?php

namespace App\Traits;



use Illuminate\Http\Request;
use App\services\UsersService;
use Illuminate\Support\Facades\Cache;

trait HandlesUserOperations
{

    protected Request $request;

    protected UsersService $usersService;

    protected string $searchTerm;

    protected array $searchBy;

    protected string $orderBy = 'id';

    protected string $dir = "asc";

    protected bool $hasSearch = false;

    protected bool $hasSearchBy = false;

    public function setup(Request $request , UsersService $service):self
    {
        $this->request = $request;

        $this->usersService = $service;

        $this->searchTerm = $request->input('search', '') ;

        $this->searchBy = $request->input('searchBy', []);

        $this->orderBy = $request->input('orderBy', 'id');

        $this->hasSearch = $request->has('search');

        $this->hasSearchBy = $request->has('searchBy');

        $this->dir = $request->input('dir', 'asc');

        return $this;

    }

    public function search()
    {

       return  $this->usersService->getQuery()
       ->when($this->hasSearch && $this->request->missing('searchBy'), function() {
            $this
            ->usersService
            ->whereFirstName($this->searchTerm)
            ->whereLastName($this->searchTerm)
            ->whereEmail($this->searchTerm)
            ->whereUsername($this->searchTerm );
        })
        ->when($this->hasSearchBy, function(){
            $this->usersService->whereAny($this->searchTerm, $this->searchBy);
        })
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
