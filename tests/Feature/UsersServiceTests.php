<?php

namespace Tests\Feature;

use App\Models\User;
use App\services\UsersService;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Arr;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use Tests\DataProviders\UsersDataProvider;
use Tests\TestCase;

class UsersServiceTests extends TestCase
{
    use DatabaseMigrations, WithFaker;


    private function userServiceParams(array $override = []): array
    {
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

    #[DataProviderExternal(UsersDataProvider::class, 'provideAllUsersTableColumns')]
    public function test_list_user_table_column_return_columns(array $data, array $expected): void
    {

        $service = $this->app->make(UsersService::class);

        $column = $service->listUsersTableColumns(...$data);

        $keys = array_values($column);

        $this->assertCount(count($expected), $column);

        $this->assertEqualsCanonicalizing($expected, $keys);

    }

    /**
     *
     * @throws BindingResolutionException
     */

    #[DataProviderExternal(UsersDataProvider::class, 'selectedUserColumnsProvider')]
    public function test_list_user_table_columns_except_spacifc_columns_return_columns(array $data, array $expected): void
    {
        $service = $this->app->make(UsersService::class);

        $columns = $service->listUsersTableColumnsExcept(...$data);

        $this->assertCount(count($expected), $columns);

        $this->assertEqualsCanonicalizing($expected, $columns);

    }


    /**
     * @throws BindingResolutionException
     */
    #[DataProviderExternal(UsersDataProvider::class, 'searchableUsersProvider')]
    public function test_user_search(array $users, string $term, array $searchBy, array $expected): void
    {

        User::factory()->createMany($users);

        $service = $this->app->make(UsersService::class, $this->userServiceParams([
            'term' => $term
        ]));

        $user = $service->search()->getQuery()->get();

        $this->assertCount(count($expected), $user);

        $this->assertEqualsCanonicalizing(
            Arr::pluck(
                $expected, ['first_name', 'last_name']),
            $user->pluck(['first_name', 'last_name'])->toArray()
        );

    }


    /**
     * @throws BindingResolutionException
     */
    #[DataProviderExternal(UsersDataProvider::class, 'searchableUsersWithSearchByProvider')]
    public function test_user_search_with_searchBy(array $users, array $term, array $searchBy, array $expected): void
    {

        User::factory()->createMany($users);

        $service = $this->app->make(UsersService::class, $this->userServiceParams([
            'term' => $term['email'],
            'searchBy' => $searchBy['email']
        ]));

        $user = $service->search()->searchBy()->getQuery()->get();

        $this->assertCount(count($expected['email']), $user);

        $emails = $user->pluck('email');

        $this->assertEqualsCanonicalizing($expected['email'], $emails->toArray());

    }

    /**
     * @throws BindingResolutionException
     */

    #[DataProviderExternal(UsersDataProvider::class, 'searchableUsersWithSearchByProvider')]
    public function test_users_search_with_searchBy_return_empty_results(array $users, array $term, array $searchBy, array $expected): void
    {
        $creatUsers = User::factory()->createMany($users);


        $service = $this->app->make(UsersService::class, $this->userServiceParams([
            'term' => $term['email'],
            'searchBy' => $searchBy['username']
        ]));


        $users = $service->search()->searchBy()->getQuery()->get();

        $this->assertCount(count($expected['users']), $users);

        $this->assertEqualsCanonicalizing($expected['users'], $users->toArray());

    }


}
