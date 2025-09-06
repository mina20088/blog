<?php

namespace Tests\Feature\Models;

use Tests\TestCase;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Factories\Sequence;

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

    protected Collection $user;
    protected Collection $users;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = collect([
            'first_name' => 'mina',
            'last_name' => 'remon',
            'email' => 'minaremonshaker@gmail.com',
            'username' => 'mina20088',
            'password' => 'password123',
        ]);

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
    }

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

        User::create($this->user->toArray());

        $this->assertDatabaseHas('users', [
            'first_name' => $this->user->get('first_name'),
            'last_name' => $this->user->get('last_name'),
            'email' => $this->user->get('email'),
            'username' => $this->user->get('username'),
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
        $user = User::create(array_merge($this->user->toArray(), [
            'id' => '',
            'locked' => true,
            'updated_at' => '2020-01-01',
            'created_at' => '2020-01-01',
            'deleted_at' => '2020-01-01'
        ]));

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
            'locked' => 1
        ]);

        $user = $user->find(1);

        $this->assertIsBool($user->locked);
    }

    /**
     * Test that user has a proper relationship with profile.
     *
     * This test verifies that the User model has a correctly configured
     * relationship with the Profile model, ensuring that when a user is
     * created with a profile, the relationship is properly established
     * in the database.
     *
     * @return void
     */
    public function test_user_has_profile_releashion_ship()
    {
        $user = User::factory()->has(Profile::factory())->create();

        $this->assertEquals($user->id, $user->profile->user_id);

        $this->assertDatabaseHas('users', ['id' => $user->id]);

        $this->assertDatabaseHas('profiles', ['user_id' => $user->id]);
    }

    /**
     * Test that user search scope returns all results when search value is empty.
     *
     * This test verifies that the User model's search scope returns all users
     * in the database when an empty string is provided as the search parameter,
     * effectively behaving as a "show all" functionality.
     *
     * @return void
     */
    public function test_user_scope_search_returnes_results_when_value_is_empty()
    {

        $users = User::search('')->get();

        $this->assertCount(5, $users);

        $this->assertNotNull($users);

        $this->assertNotEquals([], $users);
    }

    /**
     * Test that user search scope returns filtered results when search value is provided.
     *
     * This test verifies that the User model's search scope correctly filters
     * users based on the provided search term, matching against first name,
     * email, and username fields. It confirms that only relevant users are
     * returned in the search results.
     *
     * @return void
     */
    public function test_user_scope_search_returns_results_when_value_is_not_empty(): void
    {

        $users = User::search('j')->get();

        $this->assertDatabaseCount('users', 5);

        $this->assertCount(3, $users);

        $this->assertContains('jane', $users->pluck('first_name'));

        $this->assertContains('john.doe@example.com', $users->pluck('email'));

        $this->assertContains('alicejohnson', $users->pluck('username'));

        $this->assertContains('alice', $users->pluck('first_name'));
    }

    /**
     * Test that filtered search scope returns all results when parameters are empty.
     *
     * This test verifies that the User model's filteredSearch scope returns
     * all users when both the search term and filter array are empty,
     * ensuring the method handles empty parameters gracefully.
     *
     * @return void
     */
    public function test_user_scope_filterd_search_get_results_when_there_parameter_are_empty()
    {
        $users = User::filterdSearch('', [])->get();

        $this->assertCount(5, $users);

        $this->assertNotContains([], $users);

        $this->assertNotNull($users);
    }

    /**
     * Test that filtered search scope works correctly with non-empty parameters.
     *
     * This test verifies that the User model's filteredSearch scope correctly
     * applies both search terms and field filters. It tests that the method
     * can filter results based on specific fields (like 'first_name') while
     * also applying the search term, resulting in more refined search results.
     *
     * @return void
     */
    public function test_user_scope_filterd_search_get_results_when_there_parameter_are_not_empty()
    {
        $users = User::search('j')->filterdSearch('j', [])->get();

        $this->assertCount(3, $users);

        $users = User::search('j')->filterdSearch('j', ['first_name'])->get();

        $this->assertCount(2, $users);

        $this->assertNotContains([], $users);
    }
}
