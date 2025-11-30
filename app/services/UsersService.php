<?php

namespace App\services;


use App\Models\Profile;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Builder;
use LaravelIdea\Helper\App\Models\_IH_User_C;


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


    public static function listUsers(array $validatedData): array|LengthAwarePaginator|_IH_User_C
    {
        return User::query()
            ->select('users.first_name', 'users.last_name', 'users.email', 'users.username', 'users.id', 'users.locked')
            ->when(Arr::hasAny($validatedData, ['search', 'searchBy']), function (Builder $query) use ($validatedData) {
                $query->whereFullText($validatedData['searchBy'] ?? ['first_name', 'last_name', 'email', 'username'], "{$validatedData['search']}*", ['mode' => 'boolean']);
            })
            ->when(Arr::has($validatedData, 'filters') && Arr::has($validatedData, 'filters.locked'), function (Builder $query) use ($validatedData) {
                $query->where('locked', (int)Arr::get($validatedData, 'filters.locked'));
            })
            ->when(Arr::has($validatedData, 'filters') && Arr::hasAny($validatedData, ['filters.gender', 'filters.country', 'filters.city']), function (Builder $query) use ($validatedData) {
                 $query->whereHas('profile', function ($query) use ($validatedData) {
                     $query
                         ->whereCountry(Arr::get($validatedData, 'filters.country'))
                         ->orWhere('city', Arr::get($validatedData, 'filters.city'))
                         ->orwhere('gender', Arr::get($validatedData, 'filters.gender'));
                 });
            })
            ->with('profile:user_id,gender')
            ->orderBy($validatedData['orderBy'] ?? 'id', $validatedData['dir'] ?? 'asc')
            ->paginate($validatedData['per_page'] ?? 10)
            ->withQueryString();
    }


    /**
     * Search for users by a search term.
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
     * Get the current query builder instance.
     * @return Builder
     */
    public function getQuery(): Builder
    {
        return $this->query;
    }

}
