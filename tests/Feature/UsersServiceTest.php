<?php

namespace Tests\Feature;

use App\Models\Upload;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Arr;
use Tests\helpers\UsersTestsHelpers;
use PHPUnit\Framework\Attributes\Test;
use Tests\DataProviders\UsersServiceTestsDataProvider;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use Illuminate\Contracts\Container\BindingResolutionException;

class UsersServiceTest extends TestCase
{
    use DatabaseTruncation, WithFaker;

    /**
     * @throws BindingResolutionException
     */
    #[DataProviderExternal(UsersServiceTestsDataProvider::class, 'userColumnsProvider')]
    #[Test]
    public function returns_expected_column_names(array $data, array $expected): void
    {
        $service = UsersTestsHelpers::createUsersService();

        $column = $service->listUsersTableColumns(Arr::get($data, 'all'));

        $keys = array_values($column);

        $this->assertCount(count(Arr::get($expected, 'all')), $column);

        $this->assertEqualsCanonicalizing(Arr::get($expected, 'all'), $keys);

    }


    /**
     * @throws BindingResolutionException
     */
    #[DataProviderExternal(UsersServiceTestsDataProvider::class, 'userColumnsProvider')]
    #[Test]
    public function lists_user_table_columns_excluding_ignored_columns(array $data, array $expected): void
    {
        $service = UsersTestsHelpers::createUsersService();

        $columns = $service->listUsersTableColumnsExcept(...Arr::get($data, 'ignored'));

        $this->assertCount(count(Arr::get($expected, 'returned')), $columns);

        $this->assertEqualsCanonicalizing(Arr::get($expected, 'returned'), $columns);

    }


    /**
     * @throws BindingResolutionException
     */
    #[DataProviderExternal(UsersServiceTestsDataProvider::class, 'searchableUsersProvider')]
    #[Test]
    public function search_returns_expected_users(array $searchCriteria): void
    {

        extract($searchCriteria['generalSearch'], EXTR_SKIP);

        User::factory()->createMany($users);

        $service = UsersTestsHelpers::createUsersService(['term' => $term]);

        $users = $service->search()->getQuery()->get();

        $lastNames = $users->pluck('last_name')->toArray();

        $this->assertCount($count, $users);

        $this->assertEqualsCanonicalizing($expected, $lastNames);

    }


    /**
     * @throws BindingResolutionException
     */
    #[Test]
    #[DataProviderExternal(UsersServiceTestsDataProvider::class, 'searchableUsersProvider')]
    public function search_by_returns_expected_users(array $searchCriteria): void
    {

        extract($searchCriteria['search_by _first_name_and_email'], EXTR_SKIP);

        User::factory()->createMany($users);

        $service = UsersTestsHelpers::createUsersService(['term' => $term, 'searchBy' => $searchBy]);

        $user = $service->search()->searchBy()->getQuery()->get();

        $emails = $user->pluck('first_name');

        $this->assertCount($count, $user);

        $this->assertEqualsCanonicalizing($expected, $emails->toArray());

    }

    /**
     * @throws BindingResolutionException
     */

    #[DataProviderExternal(UsersServiceTestsDataProvider::class, 'searchableUsersProvider')]
    #[Test]
    public function search_by_returns_no_users_when_none_match(array $searchCriteria): void
    {

        extract($searchCriteria['search_by_with_no_results'], EXTR_SKIP);

        User::factory()->createMany($users);

        $service = UsersTestsHelpers::createUsersService(['term' =>  $term, 'searchBy' => $searchBy]) ;

        $users = $service->search()->searchBy()->getQuery()->get();

        $this->assertCount($count, $users);

        $this->assertEqualsCanonicalizing($expected, $users->toArray());

    }

    /**
     * @throws BindingResolutionException
     */
    #[Test]
    #[DataProviderExternal(UsersServiceTestsDataProvider::class, 'searchableUsersProvider')]
    public function get_users_filterd_by_country(array $searchCriteria): void
    {

        extract($searchCriteria['filter_by_country'], EXTR_SKIP);

        User::factory()
            ->has(Profile::factory()->state(new Sequence(...$profiles)))
            ->createMany($users);

        $service = UsersTestsHelpers::createUsersService(['filters' => $filters])  ;

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
    #[DataProviderExternal(UsersServiceTestsDataProvider::class, 'searchableUsersProvider')]
    public function search_with_country_filter(array $searchCriteria): void
    {

        extract($searchCriteria['search_with_country_filter'], EXTR_SKIP);

        User::factory()
            ->has(Profile::factory()->state(new Sequence(...$profiles)))
            ->createMany($users);

        $service = UsersTestsHelpers::createUsersService(['term' => $term, 'filters' => $filters]);

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
    #[DataProviderExternal(UsersServiceTestsDataProvider::class, 'searchableUsersProvider')]
    public function search_with_search_by_filterd_by_country(array $searchCriteria): void
    {

        extract($searchCriteria['search_with_search_by_filterd_by_country'], EXTR_SKIP);

        User::factory()
            ->has(Profile::factory()->state(new Sequence(...$profiles)))
            ->createMany($users);

        $service = UsersTestsHelpers::createUsersService([
            'term' => $term,
            'searchBy' => $searchBy,
            'filters' => $filters
        ]);

        $users = $service->search()->searchBy()->filterByCountry()->getQuery()->get();

        $username = $users->pluck('username')->toArray();

        $this->assertCount($count, $users);

        $this->assertEqualsCanonicalizing($expected, $username);

    }

    /**
     * @throws BindingResolutionException
     */
    #[Test]
    #[DataProviderExternal(UsersServiceTestsDataProvider::class,'searchableUsersProvider')]
    public function get_users_filterd_by_city(array $searchCriteria): void
    {

        extract($searchCriteria['filter_by_city'], EXTR_SKIP);

        User::factory()
        ->has(Profile::factory()->state(new Sequence(...$profiles)))
        ->createMany($users);

        $service = UsersTestsHelpers::createUsersService(['filters' => $filters]);

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

    /**
     * @throws BindingResolutionException
     */
    #[Test]
    #[DataProviderExternal(UsersServiceTestsDataProvider::class,'searchableUsersProvider')]
    public function get_users_filterd_by_country_and_city(array $searchCriteria):void
    {
        extract($searchCriteria['filter_by_country_and_city'], EXTR_SKIP);

        User::factory()
            ->has(Profile::factory()->state(new Sequence(...$profiles)))
            ->createMany($users);

        $service = UsersTestsHelpers::createUsersService(['filters' => $filters]);

       $users = $service->filterByCountry()->filterByCity()->getQuery()->get();

       $lastNames = $users->pluck('last_name')->toArray();

       $this->assertCount($count, $users);

       $this->assertEqualsCanonicalizing($expected, $lastNames);

    }

    /**
     * @throws BindingResolutionException
     */
    #[Test]
    #[DataProviderExternal(UsersServiceTestsDataProvider::class,'searchableUsersProvider')]
    public function search_users_with_search_by_and_filter_by_country_and_city(array $searchCriteria) :void
    {
        extract($searchCriteria['search_with_search_by_filterd_by_country_and_city'], EXTR_SKIP);

        User::factory()
            ->has(Profile::factory()->state(new Sequence(...$profiles)))
            ->createMany($users);

        $service = UsersTestsHelpers::createUsersService([
            'term' => $term,
            'searchBy' => $searchBy,
            'filters' => $filters
        ]);

        $users = $service
            ->search()->searchBy()->filterByCountry()->filterByCity()->getQuery()->get();

        $emails = $users->pluck('email')->toArray();

        $this->assertCount($count, $users);

        $this->assertEqualsCanonicalizing($expected, $emails);

    }

    /**
     * @throws BindingResolutionException
     */
    #[Test]
    #[DataProviderExternal(UsersServiceTestsDataProvider::class,'createNewUserProvider')]
    public function admin_create_new_user_add_record_to_database(array $passedCreation):void
    {
         extract($passedCreation);

         $service = UsersTestsHelpers::createUsersService();

         $user =  $service->createUser($user);

         $this
             ->assertDatabaseCount('users', 1)
             ->assertModelExists($user)
             ->assertModelMissing(Profile::class)
             ->assertModelMissing(Upload::class);

    }

    /**
     * @throws BindingResolutionException
     */
    #[Test]
    #[DataProviderExternal(UsersServiceTestsDataProvider::class,'createNewUserProvider')]
    public function admin_create_new_user_and_profile_add_record_to_database(array $passedCreation):void
    {
        extract($passedCreation);

        $service = UsersTestsHelpers::createUsersService();

        $user = $service->createUser($user);

        $profile = $service->createProfile($profile);

        $this->assertDatabaseCount('users', 1);

        $this->assertModelExists($user);

        $this->assertDatabaseCount('profiles', 1);

        $this->assertModelExists($profile);

        $this->assertModelMissing(Upload::class);
    }

    /**
     * @throws BindingResolutionException
     */
    #[Test]
    #[DataProviderExternal(UsersServiceTestsDataProvider::class,'createNewUserProvider')]
    public function admin_create_new_user_and_profile_upload_profile_image_add_record_to_database(array $passedCreation): void
    {
        extract($passedCreation);

        $service = UsersTestsHelpers::createUsersService();

        $user = $service->createUser($user);

        $profile = $service->createProfile($profile);

        $upload = $service->uploadProfileImage($profile_picture);

        ds($upload);

        $this->assertDatabaseCount('users', 1);

        $this->assertModelExists($user);

        $this->assertDatabaseCount('profiles', 1);

        $this->assertModelExists($profile);

        $this->assertDatabaseCount('uploads', 1);

        $this->assertModelExists($upload);
    }



}


