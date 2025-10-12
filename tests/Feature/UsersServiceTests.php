<?php

namespace Tests\Feature;

use App\Models\User;
use App\services\UsersService;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
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
    public function test_list_user_table_column_return_columns(): void
    {
        $service = $this->app->make(UsersService::class);

        $columns = $service->listUsersTableColumns();

        $this->assertCount(12, $columns);

        $this->assertArrayIsEqualToArrayOnlyConsideringListOfKeys(
            expected: array(
                'id' => 'id',
                'first_name' => 'first_name',
                'last_name' => 'last_name',
                'email' => 'email',
                'email_verified_at' => 'email_verified_at',
                'username' => 'username',
                'password' => 'password',
                'locked' => 'locked',
                'remember_token' => 'remember_token',
                'created_at' => 'created_at',
                'updated_at' => 'updated_at',
                'deleted_at' => 'deleted_at'
            ),
            actual: $columns,
            keysToBeConsidered: [
                'id',
                'first_name',
                'last_name',
                'email',
                'email_verified_at',
                'username',
                'password',
                'locked',
                'remember_token',
                'created_at',
                'updated_at',
                'deleted_at'
            ]);


    }

    /**
     * @throws BindingResolutionException
     */
    public function test_list_user_table_columns_except_spacifc_columns_return_columns(): void
    {
        $service = $this->app->make(UsersService::class);

        $columns = $service->listUsersTableColumnsExcept('email_verified_at', 'created_at', 'updated_at', 'deleted_at', 'remember_token');

        $this->assertCount(7, $columns);

        $this->assertArrayNotHasKey('email_verified_at', $columns);

        $this->assertArrayNotHasKey('created_at', $columns);

        $this->assertArrayNotHasKey('updated_at', $columns);

        $this->assertArrayNotHasKey('deleted_at', $columns);

        $this->assertArrayNotHasKey('remember_token', $columns);
    }

    /**
     * @throws BindingResolutionException
     */
    public function test_user_search(): void
    {
        $createUser = User::factory()->createMany([
            [
                "first_name" => "mina",
                "last_name" => "remon",
                "email" => "minaremonshaker@gmail.com",
                "username" => "mina20088"
            ],
            [
                "first_name" => "georget",
                "last_name" => "wadi",
                "email" => "georget@yahoo.com",
                "username" => "gyr99000"
            ],
        ]);

        $service = $this->app->make(UsersService::class, $this->userServiceParams([
            'term' => 'mina'
        ]));

        $user = $service->search()->getQuery()->first();

        $this->assertModelExists($user);

        $this->assertSame('mina', $user->first_name);

        $this->assertSame('remon', $user->last_name);

        $this->assertSame('minaremonshaker@gmail.com', $user->email);

    }

    /**
     * @throws BindingResolutionException
     */
    public function test_user_search_with_searchBy():void
    {
        $userCreate = User::factory()->createMany([
            [
                "first_name" => "georget",
                "last_name" => "wadi",
                "email" => "georget@yahoo.com",
                "username" => "gyr99000"
            ],
            [
                "first_name" => 'gorgena' ,
                "last_name" =>   'lalerona',
                "email"  =>  $this->faker()->email(),
                "username" => $this->faker->userName()
            ]
        ]) ;
        $service = $this->app->make(UsersService::class, $this->userServiceParams([
            'term' => 'ge',
            'searchBy' => ['first_name']
        ]));

        $query = $service->search()->searchBy()->getQuery();

        $users = $query->get();

        $this->assertCount(2, $users);

        $this->assertInstanceOf(Collection::class, $users);

        $userNames = $users->pluck('first_name');

        $this->assertContains('georget', $userNames);

    }

    /**
     * @throws BindingResolutionException
     */
    public function test_users_serach_with_searchBy_is_empty_result_return():void
    {
        $creatUsers = User::factory()->createMany([
            [
                "first_name" => "George",
                "last_name" => "Best",
                "email" => "best@gmail.com",
                "username" => 'best',
            ],
            [
                "first_name" => "Geoff",
                "last_name" => "Hurst",
                "email" => "hurst@gmail.com",
                "username" => 'hurst',
            ]
        ]);

        $service = $this->app->make(UsersService::class, $this->userServiceParams([
            'term' => 'Ge',
            'searchBy' => ['last_name','email','username']
        ]));

        $users = $service->search()->searchBy()->getQuery()->get();

        $this->assertCount(0, $users);

        $this->assertSame([], $users->all());
    }
}
