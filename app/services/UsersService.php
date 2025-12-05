<?php

namespace App\services;



use App\Jobs\ProcessUploadProfilePicture;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Builder;
use LaravelIdea\Helper\App\Models\_IH_User_C;


class UsersService
{

    /**
     * Get the columns of the users table.
     * @param mixed ...$values
     * @return array
     */
    public static function listUsersTableColumns(...$values): array
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
    public static function listUsersTableColumnsExcept(...$values): array
    {
        return collect(self::listUsersTableColumns())
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



    public static function create(array $user, array $profile = [], ?UploadedFile $uploadImage = null): User
    {
        $user = User::create($user);
        if($user)
        {
            $profile = ProfileService::create($profile, $user);

            //TODO:cant serialize the UploadableFile class , will solve this problem
            ProcessUploadProfilePicture::dispatchIf($profile, $user, $uploadImage);
        }
        return $user;
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
