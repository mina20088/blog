<?php

namespace Tests\Feature;

use App\Models\Profile;
use App\Models\User;
use App\services\UsersService;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Arr;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use Tests\DataProviders\UsersDataProvider;
use Tests\TestCase;

class UsersServiceTests extends TestCase
{
    use DatabaseTruncation, WithFaker;


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

    #[DataProviderExternal(UsersDataProvider::class, 'userColumnsProvider')]
    public function test_list_user_table_column_return_columns(array $data, array $expected): void
    {


        $service = $this->app->make(UsersService::class);

        $column = $service->listUsersTableColumns(Arr::get($data, 'all'));

        $keys = array_values($column);

        $this->assertCount(count(Arr::get($expected, 'all')), $column);

        $this->assertEqualsCanonicalizing(Arr::get($expected, 'all'), $keys);

    }

    /**
     *
     * @throws BindingResolutionException
     */

    #[DataProviderExternal(UsersDataProvider::class, 'userColumnsProvider')]
    public function test_list_user_table_columns_except_spacifc_columns_return_columns(array $data, array $expected): void
    {
        $service = $this->app->make(UsersService::class);

        $columns = $service->listUsersTableColumnsExcept(...Arr::get($data, 'ignored'));

        $this->assertCount(count(Arr::get($expected, 'returned')), $columns);

        $this->assertEqualsCanonicalizing(Arr::get($expected, 'returned'), $columns);

    }


    /**
     * @throws BindingResolutionException
     */
    #[DataProviderExternal(UsersDataProvider::class, 'searchableUsersProvider')]
    public function test_user_search(array $data,array $searchCriteria ,array $expected): void
    {

        User::factory()->createMany(Arr::get($data, 'users'));

        $service = $this->app->make(UsersService::class, $this->userServiceParams([
            'term' => Arr::get($searchCriteria, 'term.noFiltersTerm')
        ]));

        $users = $service->search()->getQuery()->get();

        $lastNames = $users->pluck('last_name')->toArray();

        ds($lastNames);

        $this->assertCount(count(Arr::get($expected, 'noFiltersResult.users')), $users);

        $this->assertEqualsCanonicalizing(Arr::get($expected, 'noFiltersResult.last_names'), $lastNames);

    }


    /**
     * @throws BindingResolutionException
     */
    #[DataProviderExternal(UsersDataProvider::class, 'searchableUsersProvider')]
    public function test_user_search_with_searchBy(array $data,array $searchCriteria ,array $expected): void
    {

        User::factory()->createMany(Arr::get($data, 'users'));

        $service = $this->app->make(UsersService::class, $this->userServiceParams([
            'term' => Arr::get($searchCriteria, 'term.searchByTerm'),
            'searchBy' => Arr::get($searchCriteria, 'searchBy.searchByFirstNameAndEmail')
        ]));

        $user = $service->search()->searchBy()->getQuery()->get();

        $emails = $user->pluck('first_name');

        $this->assertCount(count(Arr::get($expected, 'multipleSearchByResults.first_names')), $user);

        $this->assertEqualsCanonicalizing(Arr::get($expected, 'multipleSearchByResults.first_names'), $emails->toArray());

    }

    /**
     * @throws BindingResolutionException
     */

    #[DataProviderExternal(UsersDataProvider::class, 'searchableUsersProvider')]
    public function test_users_search_with_searchBy_return_empty_results(array $users, array $term, array $searchBy, array $expected): void
    {
        $creatUsers = User::factory()->createMany($users);


        $service = $this->app->make(UsersService::class, $this->userServiceParams([
            'term' => $term['multipleSearchByTerm'],
            'searchBy' => $searchBy['multipleSearchByItemsEmptyResults']
        ]));


        $users = $service->search()->searchBy()->getQuery()->get();

        $this->assertCount(count($expected['multipleSearchByItemsEmptyResults']), $users);

        $this->assertEqualsCanonicalizing($expected['multipleSearchByItemsEmptyResults'], $users->toArray());

    }

    /**
     * @throws BindingResolutionException
     */
    #[DataProviderExternal(UsersDataProvider::class, 'searchableUsersProvider')]
    public function test_get_users_filterd_by_country(array $data, array $term, array $searchBy,array $filters , array $expected):void
    {
        $creatUsers = User::factory()
            ->has(Profile::factory()->state(new Sequence(...$data['profiles'])))
            ->createMany($data['users']);


        $service = $this->app->make(UsersService::class, $this->userServiceParams([
            'filters' => $filters['countryFilters']
        ]));

        $users = $service->search()->filterByCountry()->getQuery()->get();

        $names = $users->pluck('first_name');

        $this->assertDatabaseCount('profiles', count($data['profiles']));

        $this->assertCount(count(Arr::get($expected, 'countryFilterItems.users')), $users);

        $this->assertEqualsCanonicalizing(Arr::get($expected, 'countryFilterItems.names'), $names->toArray());


    }


}
