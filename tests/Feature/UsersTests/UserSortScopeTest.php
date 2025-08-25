<?php

namespace Tests\Feature\UsersTests;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserSortScopeTest extends TestCase
{
    use RefreshDatabase;
    private function createTestUsers(): void
    {
        $user1 = User::factory()->create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'jhoneDoe@hotmail.com',
            'username' => 'mina20099',
            'password' => 'billgates@123'
        ]);

        $user2 = User::factory()->create([
            'first_name' => 'mina',
            'last_name' => 'remon',
            'email' => 'minaremonshaker@gmail.com',
            'username' => 'milkshake',
            'password' => 'billgates@123'
        ]);
    }

    public function test_users_is_sorted_asc(): void
    {
        $this->createTestUsers();

        $user = User::sort('last_name')->get();

        $this->assertEquals('Doe', $user[0]->last_name);
    }


    public function test_users_is_sorted_desc(): void
    {
        $this->createTestUsers();

        $user = User::sort('last_name', 'desc')->get();

        $this->assertEquals('remon', $user[0]->last_name);
    }
}
