<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * UserModelTest
 *
 * Feature test class for testing the User model functionality.
 * This class tests various aspects of the User model including
 * mass assignment, fillable attributes, and guarded attributes.
 *
 * @package Tests\Feature
 */
class UserModelTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test that a user can be mass assigned with fillable attributes.
     *
     * This test verifies that the User model correctly allows mass assignment
     * of fillable attributes (first_name, last_name, email, username, password)
     * and that the data is properly stored in the database.
     *
     * @return void
     */
    public function test_user_can_be_mass_assigned_with_fillable_attributes(): void
    {

        $userData = [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'username' => $this->faker->unique()->userName(),
            'password' => 'password123',
        ];

        User::create($userData);

        $this->assertDatabaseHas('users', [
            'first_name' => $userData['first_name'],
            'last_name' => $userData['last_name'],
            'email' => $userData['email'],
            'username' => $userData['username'],
        ]);
    }

    /**
     * Test that user guarded attributes are not fillable via mass assignment.
     *
     * This test verifies that the User model properly protects guarded attributes
     * (id, locked, created_at, updated_at, deleted_at) from being mass assigned.
     * It ensures that these attributes maintain their default values or are
     * automatically managed by Laravel, even when explicitly provided during creation.
     *
     * @return void
     */
    public function test_user_guraded_attributes_is_not_fillable()
    {
        $user = User::create([
            'id' => "",
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'username' => $this->faker->unique()->userName(),
            'password' => 'password123',
            'locked' => true,
            'updated_at' => '2020-01-01',
            'created_at' => '2020-01-01',
            'deleted_at' => '2020-01-01',
        ]);

        $this->assertNotEquals("", $user->id);
        $this->assertNotNull($user->created_at);
        $this->assertNotEquals('2020-01-01', $user->created_at);
        $this->assertNotNull($user->updated_at);
        $this->assertNotEquals('2020-01-01', $user->updated_at);
        $this->assertNull($user->deleted_at);
        $this->assertNotEquals('2020-01-01', $user->deleted_at);
        $this->assertNotEquals(true, $user->locked);
        $this->assertFalse($user->locked);
    }
}
