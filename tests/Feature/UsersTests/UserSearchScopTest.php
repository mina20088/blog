<?php

namespace Tests\Feature\UsersTests;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class UserSearchScopTest extends TestCase
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

    public function test_users_search_scope(): void
    {

        $this->createTestUsers();

        $users = collect(User::all());

        $user = User::search('mina')->first();

        $this->assertModelExists($user);

        $this->assertDatabaseHas('users' , [
            'username' => $user->username
        ]);

        $this->assertTrue($users->contains($user));

    }

    public function test_user_search_scope_no_results(): void
    {
        $this->createTestUsers();

        $user = User::search('nonexistent')->first();

        $this->assertNull($user);
    }

    #[Test]
    public function test_user_search_scope_by_email() :void
    {
        $this->createTestUsers();

        $user = User::search('jhoneDoe@hotmail.com')->first();

        $this->assertNotNull($user);

        $this->assertEquals('jhoneDoe@hotmail.com' , $user->email);
    }
}


