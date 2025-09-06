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


    public function listUsersTableColumnsExcept(...$values): array
    {
        return collect($this->listUsersTableColumns())
            ->except($values)
            ->toArray();
    }

    public function search(string $searchTerm = '', array $searchBy = []): self
    {

        if (!$searchTerm || empty($searchTerm)) {
            return $this;
        }

        if (!$searchBy) {
            $this->query->whereAny(['id', 'first_name', 'last_name', 'email', 'username'], 'like', '%' . $searchTerm . '%');
        } else {
            $this->query->whereAny($searchBy, 'like', '%' . $searchTerm . '%');
        }

        return $this;
    }

    public function sort(string $sortTerm, string $sortDiriction = 'asc')
    {
        $this->query->when($sortDiriction, function (Builder $query) use ($sortTerm, $sortDiriction) {
            $query->orderBy($sortTerm, $sortDiriction);
        });


        return $this;
    }


    public function getQuery(): Builder
    {
        return $this->query;
    }
}
