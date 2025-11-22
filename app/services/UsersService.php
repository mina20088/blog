<?php

namespace App\services;


use App\Models\Profile;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Builder;


class UsersService
{
    protected Builder $query;

    protected string $term;

    protected array $filters;

    protected array|string $searchBy;

    protected string $orderBy;

    protected string $orderDir;

    protected User $user;

    protected Profile $profile;

    protected Upload $upload;


    /**
     * UsersService constructor.
     * @param Builder $query
     * @param string $term
     * @param array|string $searchBy
     * @param array $filters
     * @param string $orderBy
     * @param string $orderDir
     */
    public function __construct(Builder $query, string $term, array|string $searchBy = [], array $filters = [], string $orderBy = 'id', string $orderDir = 'asc')
    {
        $this->query = $query;

        $this->term = $term;

        $this->filters = $filters;

        $this->searchBy = $searchBy;

        $this->orderBy = $orderBy;

        $this->orderDir = $orderDir;


    }

    /**
     * Get the columns of the users table.
     * @param mixed ...$values
     * @return array
     */
    public function listUsersTableColumns(...$values): array
    {
        $usersTableColumns = Schema::getColumnListing('users');

        if (!empty($values)) {
            return collect($usersTableColumns)
                ->except($values)
                ->toArray();
        }

        return array_combine($usersTableColumns, $usersTableColumns);
    }


    /**
     * Get the columns of the users table except for the given values.
     * @param mixed ...$values
     * @return array
     */
    public function listUsersTableColumnsExcept(...$values): array
    {
        return collect($this->listUsersTableColumns())
            ->except($values)
            ->toArray();
    }


    /**
     * Search for users by a search term.
     * @return $this
     */
    public function search(): self
    {

        $this->query->when($this->term !== "" && empty($this->searchBy), function (Builder $query) {
            $query->whereFullText(['first_name', 'last_name', 'email', 'username'], "{$this->term}*", ['mode' => 'boolean']);
        });

        return $this;
    }

    /**
     * Search for users by a search term in specific columns.
     * @return $this
     */
    public function searchBy(): self
    {
        $this->query->when($this->term !== "" && !empty($this->searchBy), function (Builder $query) {
            $query->where(function (builder $query) {
                $query->whereFullText($this->searchBy, "{$this->term}*", ['mode' => 'boolean'], 'or');
            });
        });


        return $this;
    }


    /**
     * Filter users by account status.
     * @return $this
     */
    public function filterByAccountStatus(): self
    {
        $this->query->when(
            array_key_exists('locked', $this->filters) && $this->filters['locked'] !== "", function (Builder $query) {
            $query->where('locked', $this->filters['locked']);
        });

        return $this;
    }

    /**
     * Filter users by gender.
     * @return $this
     */
    public function filterByGender(): self
    {
        $this->query->when(array_key_exists('gender', $this->filters) && $this->filters['gender'] !== "",
            function (Builder $query) {
                $query->WhereRelation('profile', 'gender', $this->filters['gender']);
            });

        return $this;
    }

    /**
     * Filter users by country.
     * @return $this
     */
    public function filterByCountry(): self
    {
        $this->query->when(array_key_exists('country', $this->filters) && $this->filters['country'] !== "",
            function (Builder $query) {
                $query->whereRelation('profile', 'country', $this->filters['country']);
            });
        return $this;
    }

    /**
     * Filter users by city.
     * @return $this
     */
    public function filterByCity(): self
    {
        $this->query->when(array_key_exists('city', $this->filters) && $this->filters['city'] !== "",
            function (Builder $query) {
                $query->whereRelation('profile', 'city', $this->filters['city']);
            });
        return $this;
    }

    /**
     * Order the users by a specific column.
     * @return $this
     */
    public function orderBy(): static
    {

        $this->query->when($this->orderBy !== '' && $this->orderDir !== '', function (Builder $query) {
            $query->orderBy($this->orderBy, $this->orderDir);
        });

        return $this;
    }


    /**
     * Select specific columns from the users table.
     * @param array $columns
     * @return $this
     */
    public function selectColumnsFromUsers(array $columns): static
    {
        $this->query->select(...$columns);

        return $this;
    }

    /**
     * Eager load the user's profile.
     * @return $this
     */
    public function profile(): static
    {
        $this->query->with('profile');
        return $this;
    }

    public function gender(): static
    {
        $this->query->with('profile:user_id,gender');

        return $this;
    }

    /**
     * Create a new user.
     * @param array $user
     * @return User
     */
    public function createUser(array $user): User
    {
        $this->user = User::create($user);

        return $this->user;
    }

    /**
     * Create a new profile for a user.
     * @param array $profile
     * @return Profile
     */
    public function createProfile(array $profile): Profile
    {
        if (isset($this->user)) {
            $this->profile = $this->user->profile()->create($profile);
        }

        return $this->profile;
    }

    /**
     * Upload a profile image for a user.
     * @param array $image
     * @return Upload
     */
    public function uploadProfileImage(array $image): Upload
    {
        if (isset($this->profile, $this->user)) {
            $this->upload = $this->user->upload()->create($image);
        }
        return $this->upload;
    }

    /**
     * Edit a user's username.
     * @param User $user
     * @param string $value
     * @return User
     */
    public function editUsername(User $user, string $value): User
    {
         $user->username = $value;

         $user->save();

         return $user;
    }

    /**
     * Get the user's profile image.
     * @param User $user
     * @return Model|MorphOne|null
     */
    public function profileImage(User $user): Model|MorphOne|null
    {
        return $user->upload;
    }


    /**
     * Get the current query builder instance.
     * @return Builder
     */
    public function getQuery(): Builder
    {
        return $this->query;
    }

}
