<?php

namespace Tests\Feature\Services;

use Tests\TestCase;
use App\Models\User;
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

    public function test_user_search_service_dose_not_return_empty_array()
    {
        $users = $this->service->search('j')->get();

        $this->assertNotEmpty($users);

    }

    public function test_user_service_returns_three_items(){

         $users = $this->service->search('j')->get();

         $this->assertCount(3, $users);
    }

    
}
