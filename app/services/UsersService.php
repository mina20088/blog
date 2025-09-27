<?php

namespace App\services;

use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Builder;
use function PHPUnit\Framework\isNull;

class UsersService
{
    protected Builder $query;

    protected array $filters;

    protected array $searchBy;


    public function __construct(Builder $query , array $searchBy, array $filters)
    {
        $this->query = $query;

        $this->filters = $filters;

        $this->searchBy = $searchBy;
    }

    public function listUsersTableColumns(): array
    {
        $usersTableColumns = Schema::getColumnListing('users');

        return array_combine($usersTableColumns, $usersTableColumns);
    }


    public function listUsersTableColumnsExcept(...$values): array
    {
        return collect($this->listUsersTableColumns())
            ->except($values)
            ->toArray();
    }



    public function whereFirstName(string $term): self
    {
        $this->query->when($term !== '' && in_array('first_name', $this->searchBy, true), function (Builder $query) use ($term) {

            $query->whereFullText('first_name', "{$term}*", ['mode' => 'boolean'], 'or');
        });

        return $this;
    }

    public function whereLastName(string $term): self
    {
        $this->query->when($term !== '' && in_array('last_name', $this->searchBy, true), function (Builder $query) use ($term) {
            $query->whereFullText('last_name', "{$term}*", ['mode' => 'boolean'], 'or');
        });

        return $this;
    }

    public function whereEmail(string $term): self
    {
        $this->query->when($term !== ''  && in_array('email', $this->searchBy, true), function (Builder $query) use ($term) {
            $query->whereFullText('email', "{$term}*", ['mode' => 'boolean'], 'or');
        });

        return $this;
    }

    public function whereUsername(string $term): self
    {
        $this->query->when($term !== ''  && in_array('username', $this->searchBy, true), function (Builder $query) use ($term) {
            $query->whereFullText('username', "{$term}*", ['mode' => 'boolean'], 'or');
        });

        return $this;
    }

    public function whereAny(string $term): self
    {
        $this->query->when(empty($this->searchBy) && $term !== '' , function (Builder $query) use ($term) {
            $query->whereFullText(['first_name', 'last_name', 'email', "username"], "{$term}*", ['mode' => 'boolean']);
        });

        return $this;
    }
    public function filterByAccountStatus(string $status): self
    {
        $this->query
            ->when($status !== '' , static fn(Builder $query) => $query->where('locked',  $status));

        return $this;
    }

    public function filterByGender(string $gender = ''): self
    {
        $this->query
            ->whereRelation('profile', 'gender', $gender);

        return $this;
    }

    public function orderBy(string $column = 'id', string $dir = 'asc'): static
    {
        $this->query->orderBy($column, $dir);

        return $this;
    }



    public function selectColumnsFromUsers(array $columns): static
    {
        $this->query->select(...$columns);

        return $this;
    }

    public function profile(): static
    {
        $this->query->with('profile');
        return $this;
    }

    public function getQuery(): Builder
    {
        return $this->query;
    }

}
