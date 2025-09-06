<?php

namespace App\services;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Builder;

class UsersService
{


    protected Builder $query;

    public function __construct(Builder $query)
    {
        $this->query = $query;
    }

    public function listUsersTableColumns(): array
    {
        $usersTableColumns = Schema::getColumnListing('users');

        $usersTableColumnsAssoc = array_combine($usersTableColumns, $usersTableColumns);

        return $usersTableColumnsAssoc;
    }

    public function search(string $searchTerm)
    {
        $usersTableColumns = collect($this->listUsersTableColumns())->except('password');
        
        return $this->query->where(function ($query) use ($usersTableColumns, $searchTerm) {
            foreach ($usersTableColumns as $column) {
                $query->orWhere($column, 'like', '%' . $searchTerm . '%');
            }
        });
    }
}
