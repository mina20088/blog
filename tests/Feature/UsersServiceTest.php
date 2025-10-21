<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Arr;
use App\services\UsersService;
use Tests\helpers\UsersTestsHelpers;
use PHPUnit\Framework\Attributes\Test;
use Tests\DataProviders\UsersDataProvider;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\DataProvider;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use Illuminate\Contracts\Container\BindingResolutionException;

class UsersServiceTest extends TestCase
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


    #[DataProviderExternal(UsersDataProvider::class, 'userColumnsProvider')]
    #[Test]
    public function returns_expected_column_names(array $data, array $expected): void
    {


        $service = UsersTestsHelpers::createUsersService();

        $column = $service->listUsersTableColumns(Arr::get($data, 'all'));

        $keys = array_values($column);

        $this->assertCount(count(Arr::get($expected, 'all')), $column);

        $this->assertEqualsCanonicalizing(Arr::get($expected, 'all'), $keys);

    }


    #[DataProviderExternal(UsersDataProvider::class, 'userColumnsProvider')]
    #[Test]
    public function lists_user_table_columns_excluding_ignored_columns(array $data, array $expected): void
    {
        $service = UsersTestsHelpers::createUsersService();

        $columns = $service->listUsersTableColumnsExcept(...Arr::get($data, 'ignored'));

        $this->assertCount(count(Arr::get($expected, 'returned')), $columns);

        $this->assertEqualsCanonicalizing(Arr::get($expected, 'returned'), $columns);

    }


    #[DataProviderExternal(UsersDataProvider::class, 'searchableUsersProvider')]
    #[Test]
    public function search_returns_expected_users(array $searchCriteria): void
    {
        [
            'usersToCreate' => $users,
            'searchTerm' => $term,
            'expectedCount' => $count,
            'expectedLastNames' => $expected
        ] = $searchCriteria['generalSearch'];


        User::factory()->createMany($users);

        $service = UsersTestsHelpers::createUsersService(['term' => $term]);
        
        $users = $service->search()->getQuery()->get();

        $lastNames = $users->pluck('last_name')->toArray();

        $this->assertCount($count, $users);

        $this->assertEqualsCanonicalizing($expected, $lastNames);

    }


    #[Test]
    #[DataProviderExternal(UsersDataProvider::class, 'searchableUsersProvider')]
    public function search_by_returns_expected_users(array $searchCriteria): void
    {
        [
            'usersToCreate' => $users,
            'searchTerm' => $term,
            'searchBy' => $searchBy,
            'expectedCount' => $count,
            'expectedFirstNames' => $expected,
        ] = $searchCriteria['search_by _first_name_and_email'];


        User::factory()->createMany($users);

        $service = UsersTestsHelpers::createUsersService([
            'term' => $term,
            'searchBy' => $searchBy
        ]);


        $user = $service->search()->searchBy()->getQuery()->get();

        $emails = $user->pluck('first_name');

        $this->assertCount($count, $user);

        $this->assertEqualsCanonicalizing($expected, $emails->toArray());

    }

    /**
     * @throws BindingResolutionException
     */

    #[DataProviderExternal(UsersDataProvider::class, 'searchableUsersProvider')]
    #[Test]
    public function search_by_returns_no_users_when_none_match(array $searchCriteria): void
    {
        [
            'usersToCreate' => $users,
            'searchTerm' => $term,
            'searchBy' => $searchBy,
            'expectedCount' => $count,
            'expectedUsers' => $expected,
        ] = $searchCriteria['search_by_with_no_results'];

        User::factory()->createMany($users);

        $service = $this->app->make(UsersService::class, $this->userServiceParams([
            'term' => $term,
            'searchBy' => $searchBy
        ]));

        $users = $service->search()->searchBy()->getQuery()->get();

        $this->assertCount($count, $users);

        $this->assertEqualsCanonicalizing($expected, $users->toArray());

    }

    /**
     * @throws BindingResolutionException
     */
    #[Test]
    #[DataProviderExternal(UsersDataProvider::class, 'searchableUsersProvider')]
    public function get_users_filterd_by_country(array $searchCriteria): void
    {
        [
            'usersToCreate' => $users,
            'profilesToCreate' => $profiles,
            'filters' => $filters,
            'expectedCount' => $count,
            'expectedFirstNames' => $expected
        ] = $searchCriteria['filter_by_country'];


        User::factory()
            ->has(Profile::factory()->state(new Sequence(...$profiles)))
            ->createMany($users);

        $service = $this->app->make(UsersService::class, $this->userServiceParams([
            'filters' => $filters
        ]));


        $users = $service->search()->filterByCountry()->getQuery()->get();

        $names = $users->pluck('first_name');

        $this->assertDatabaseCount('profiles', count($profiles));

        $this->assertCount($count, $users);

        $this->assertEqualsCanonicalizing($expected, $names->toArray());

    }

    /**
     * @throws BindingResolutionException
     */
    #[Test]
    #[DataProviderExternal(UsersDataProvider::class, 'searchableUsersProvider')]
    public function search_with_country_filter(array $searchCriteria): void
    {
        [
            'usersToCreate' => $users,
            'profilesToCreate' => $profiles,
            'searchTerm' => $term,
            'filters' => $filters,
            'expectedCount' => $count,
            'expectedUsers' => $expected
        ] = $searchCriteria['search_with_country_filter'];


        User::factory()
            ->has(Profile::factory()->state(new Sequence(...$profiles)))
            ->createMany($users);

        $service = $this->app->make(UsersService::class, $this->userServiceParams([
            'term' => $term,
            'filters' => $filters
        ]));

        $users = $service->search()->filterByCountry()->getQuery()->get();

        $mappedUses = $users->map(function ($user) {
            return [
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'username' => $user->username
            ];
        });

        $this->assertCount($count, $mappedUses->toArray());

        $this->assertEqualsCanonicalizing($expected, $mappedUses->toArray());
    }

    /**
     * @throws BindingResolutionException
     */
    #[Test]
    #[DataProviderExternal(UsersDataProvider::class, 'searchableUsersProvider')]
    public function search_with_search_by_filterd_by_country(array $searchCriteria): void
    {
        [
            'usersToCreate' => $users,
            'profilesToCreate' => $profiles,
            'searchTerm' => $term,
            'searchBy' => $searchBy,
            'filters' => $filters,
            'expectedCount' => $count,
            'expectedUsername' => $expected
        ]
            = $searchCriteria['search_with_search_by_filterd_by_country'];

        User::factory()
            ->has(Profile::factory()->state(new Sequence(...$profiles)))
            ->createMany($users);

        $service = $this->app->make(UsersService::class, $this->userServiceParams([
            'term' => $term,
            'searchBy' => $searchBy,
            'filters' => $filters
        ]));

        $users = $service->search()->searchBy()->filterByCountry()->getQuery()->get();

        $username = $users->pluck('username')->toArray();

        $this->assertCount($count, $users);

        $this->assertEqualsCanonicalizing($expected, $username);

    }

    #[Test]
    #[DataProviderExternal(UsersDataProvider::class,'searchableUsersProvider')]
    public function get_users_filterd_by_city(array $searchCriteria): void
    {
        [
            'usersToCreate' => $users,
            'profilesToCreate' => $profiles,
            'filters' => $filters,
            'expectedCount' => $count,
            'expectedLastNames' => $expected
        ] 
        = $searchCriteria['filter_by_city'];

        User::factory()
        ->has(Profile::factory()->state(new Sequence(...$profiles)))
        ->createMany($users);

        $service = $this->app->make(UsersService::class, $this->userServiceParams([
            'filters' => $filters
        ]));

        $users = $service
            ->search()
            ->searchBy()
            ->filterByCity()
            ->getQuery()
            ->get();
        
        $lastNames = $users->pluck('last_name')->toArray();

        $this->assertCount($count, $users);

        $this->assertEqualsCanonicalizing($expected, $lastNames);
    }



}


