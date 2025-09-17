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



    public function whereFirstName(string $term = ''): self
    {

        $this->query->where('first_name' , 'like', "%{$term}%");

        return $this;
    }

    public function whereLastName(string $term = '')
    {

        $this->query->orWhere('last_name' , 'like', "%{$term}%");

        return $this;
    }

    public function whereEmail(string $term = '')
    {

        $this->query->orWhere('email' , 'like', "%{$term}%");

        return $this;
    }

    public function whereUsername(string $term = '')
    {

        $this->query->orWhere('username' , 'like', "%{$term}%");

        return $this;
    }

    public function whereAny(string $term = '', array $feilds = [])
    {
        if(!isset($feilds))
        {
            return new Exception('feilds need to be not empty', '303');
        }

        foreach ($feilds as $feild) {
            $this->query->orWhere($feild , 'like' , "%{$term}%");
        }

        return $this;
    }

    public function getQuery(): Builder
    {
        return $this->query;
    }
}
