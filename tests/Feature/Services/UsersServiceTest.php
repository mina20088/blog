<?php

namespace Tests\Feature\Services;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Arr;
use App\services\UsersService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Factories\Sequence;

class UsersServiceTest extends TestCase
{
    use RefreshDatabase;

    protected UsersService $service;

    protected $users;

    protected function setUp(): void
    {
        parent::setUp();

        $this->users = User::factory(5)->state(new Sequence(
            [
                'first_name' => 'georget',
                'last_name' => 'wadi',
                'email' => 'georget',
                'username' => 'gyr99000',
                'password' => 'password123',
                'locked' => false,
            ],
            [
                'first_name' => 'john',
                'last_name' => 'doe',
                'email' => 'john.doe@example.com',
                'username' => 'johndoe',
                'password' => 'securepass456',
                'locked' => false,
            ],
            [
                'first_name' => 'jane',
                'last_name' => 'smith',
                'email' => 'jane.smith@example.com',
                'username' => 'janesmith',
                'password' => 'mypassword789',
                'locked' => true,
            ],
            [
                'first_name' => 'bob',
                'last_name' => 'wilson',
                'email' => 'bob.wilson@test.com',
                'username' => 'bobwilson',
                'password' => 'testpass123',
                'locked' => false,
            ],
            [
                'first_name' => 'alice',
                'last_name' => 'johnson',
                'email' => 'alice.johnson@demo.com',
                'username' => 'alicejohnson',
                'password' => 'demopass456',
                'locked' => true,
            ],
        ))->create();

        $this->service = app(UsersService::class);
    }
    public function test_list_of_columns_users_table_returned()
    {
        $listOfColumns = $this->service->listUsersTableColumns();

        $this->assertNotEquals([], $listOfColumns);

        $this->assertArrayHasKey('id', $listOfColumns);

        $this->assertArrayHasKey('first_name', $listOfColumns);

        $this->assertArrayHasKey('last_name', $listOfColumns);

        $this->assertArrayHasKey('email', $listOfColumns);

        $this->assertArrayHasKey('username', $listOfColumns);
    }

    public function test_dose_not_return_empty_when_search_term_is_empty_or_not_set()
    {
       $users = $this->service
            ->search()
            ->getQuery()
            ->get();

        $this->assertCount(5 , $users);

        $this->assertNotEmpty($users);

    }

    public function test_dose_not_return_empty_array()
    {
        $users = $this->service
            ->search('j')
            ->getQuery()
            ->get();

        $this->assertNotEmpty($users);
    }

    public function test_returns_three_items()
    {

        $users = $this->service
            ->search('j')
            ->getQuery()
            ->get();

        $this->assertCount(3, $users);
    }

    public function test_contains_first_name_has_j_letter()
    {
        $users = $this->service
            ->search('j')
            ->getQuery()
            ->get();

        $this->assertTrue($users->contains('first_name', 'john'));

        $this->assertTrue($users->contains('first_name', 'jane'));
    }

    public function test_returns_two_items_when_searhBy_first_name_is_set()
    {
        $users = $this->service
            ->search('j', ['first_name'])
            ->getQuery()
            ->get();
        $this->assertCount(2, $users);
    }

    public function test_result_is_sortable()
    {
        $users = $this->service
            ->search()
            ->sort('first_name')
            ->getQuery()
            ->get();

        $first_names = Arr::flatten($users->pluck('first_name'));

        $this->assertEquals(["alice",'bob', 'georget', 'jane', 'john'], $first_names);

    }
}
