<?php
namespace Tests\helpers;

use App\Models\User;
use App\services\UsersService;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Facades\App;

class UsersTestsHelpers
{
    public static function usersServiceParams(array $override = []) :array{
        return array_merge([
            User::query(),
            "term" => "",
            "searchBy" => [],
            "filters" => [],
            "orderBy" => "id",
            "orderDir" => "asc"
        ], $override);
    }

    /**
     * @throws BindingResolutionException
     */
    public static function createUsersService(array $override = [])
    {
        return App::make(UsersService::class, self::usersServiceParams($override));
    }


}
