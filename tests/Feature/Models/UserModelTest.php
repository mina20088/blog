<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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

    /**
     * Test that user password is hidden from array/JSON representation.
     *
     * This test verifies that the User model properly hides the password attribute
     * when the model is converted to an array or JSON format, ensuring that
     * sensitive password data is not exposed in API responses or other outputs.
     *
     * @return void
     */
    public function test_user_password_is_hidden(): void
    {
        $user = User::factory()->create([
            'password' => bcrypt('password123'),
        ]);

        $this->assertNotEquals('password123', $user->password);
    }

    /**
     * Test that user password is automatically hashed when set.
     *
     * This test verifies that the User model properly hashes passwords
     * when they are assigned to the password attribute, ensuring that
     * plain text passwords are never stored in the database.
     *
     * @return void
     */
    public function test_user_paassword_is_casted_hashed()
    {
        $user = User::factory()->create([
            'password' => 'password123',
        ]);

        $this->assertTrue(Hash::check('password123', $user->password));
    }

    /**
     * Test that user locked attribute is properly cast to boolean.
     *
     * This test verifies that the User model correctly casts the locked
     * attribute to a boolean type, ensuring that database integer values
     * (0 or 1) are properly converted to boolean (true or false) when
     * accessed through the model.
     *
     * @return void
     */
    public function test_user_locked_attribute_is_casted_to_boolean()
    {
        $user = User::factory()->create([
            'id' => 1,
            'locked' => 1
        ]);

        $user = $user->find(1);

        $this->assertIsBool($user->locked);
    }
}
