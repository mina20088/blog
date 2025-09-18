<?php

namespace App\services;

use Exception;
use App\Models\User;
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



    public function whereFirstName(string $term): self
    {
        $this->query->where('first_name', 'like', "%{$term}%");

        return $this;
    }

    public function whereLastName(string $term): self
    {
        $this->query->orWhere('last_name', 'like', "%{$term}%");

        return $this;
    }

    public function whereEmail(string $term): self
    {

        $this->query->orWhere('email', 'like', "%{$term}%");

        return $this;
    }

    public function whereUsername(string $term): self
    {

        $this->query->orWhere('username', 'like', "%{$term}%");

        return $this;
    }

    public function whereAny(string $term = '', array $fields = []): self
    {
        foreach ($fields as $field) {

            $this->query->orWhere($field, 'like', "%{$term}%");
        }

        return $this;
    }

    public function orderBy(string $column = 'id', string $dir = 'asc')
    {
        $this->query->orderBy($column, $dir);

        return $this;
    }

    public function selectColumnsFromUsers(array $columns)
    {
        $this->query->select(...$columns);

        return $this;
    }

    public function getQuery(): Builder
    {
        return $this->query;
    }
}
