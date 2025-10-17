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

    protected string $term;

    protected array $filters;

    protected array|string $searchBy;

    protected string $orderBy;

    protected string $orderDir;


    public function __construct(Builder $query, string $term , array|string $searchBy = []  , array $filters = [], string $orderBy = 'id', string $orderDir = 'asc')
    {
        $this->query = $query;

        $this->term = $term;

        $this->filters = $filters;

        $this->searchBy = $searchBy;

        $this->orderBy = $orderBy;

        $this->orderDir = $orderDir;
    }

    public function listUsersTableColumns(...$values): array
    {
        $usersTableColumns = Schema::getColumnListing('users');

        if(!empty($values)){
            return collect($usersTableColumns)
                ->except($values)
                ->toArray();
        }

        return array_combine($usersTableColumns, $usersTableColumns);
    }


    public function listUsersTableColumnsExcept(...$values): array
    {
        return collect($this->listUsersTableColumns())
            ->except($values)
            ->toArray();
    }


    public function search(): self
    {

        $this->query->when(  $this->term  !== "" && empty($this->searchBy)  , function(Builder $query){
            $query->whereFullText(['first_name', 'last_name', 'email', 'username'], "{$this->term}*", ['mode' => 'boolean']);
        });

        return $this;
    }

    public function searchBy(): self
    {
        $this->query->when($this->term !== ""  && !empty($this->searchBy), function (Builder $query)  {
            $query->where(function (builder $query)  {
                $query->whereFullText($this->searchBy, "{$this->term}*", ['mode' => 'boolean'], 'or');
            });
        });


        return $this;
    }


    public function filterByAccountStatus(): self
    {
        $this->query->when(
            array_key_exists('locked', $this->filters) && $this->filters['locked'] !== "", function (Builder $query) {
            $query->where('locked', $this->filters['locked']);
        });

        return $this;
    }

    public function filterByGender(): self
    {
        $this->query->when(array_key_exists('gender', $this->filters) && $this->filters['gender'] !== "",
            function (Builder $query) {
                $query->WhereRelation('profile', 'gender', $this->filters['gender']);
            });

        return $this;
    }

    public function filterByCountry(): self
    {
        $this->query->when(array_key_exists('country', $this->filters) && $this->filters['country'] !== "",
            function(Builder $query){
               $query->whereRelation('profile', 'country' , $this->filters['country'] );
            });
        return $this;
    }

    public function filterByCity():self
    {
        $this->query->when(array_key_exists('city' , $this->filters) && $this->filters['city'] !== "" ,
            function (Builder $query){
                    $query->whereRelation('profile', 'city', $this->filters['city']);
            });
        return $this;
    }

    public function orderBy(): static
    {

        $this->query->when($this->orderBy !== '' && $this->orderDir !== '', function (Builder $query) {
            $query->orderBy($this->orderBy, $this->orderDir);
        });

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
