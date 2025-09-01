<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Testing\Fakes\Fake;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Factories\Sequence;

/**
 * Feature tests for the Dashboard Users functionality.
 *
 * This test class covers the main features of the dashboard users page,
 * including page loading, sorting, searching, and validation scenarios.
 * Tests ensure the users listing, search functionality, and proper
 * error handling work as expected.
 */
class DashboardUsersTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Set up the test environment before each test.
     *
     * This method is called before each test method and ensures
     * the parent setUp is called to initialize the testing environment.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test that the dashboard users page loads successfully.
     *
     * This test verifies that the users index page loads correctly,
     * returns the proper view with the expected data including users
     * and table columns, and ensures no search results are in session.
     */
    public function test_dashboard_users_page_loads_successfully()
    {
        User::factory()->count(3)->create();

        $columns = User::listUsersTableColumns('password', 'email_verified_at', 'remember_token', 'deleted_at');

        $response = $this->get('/dashboard/users');

        $response->assertOk()
            ->assertOk()
            ->assertViewIs('dashboard.users.index')
            ->assertViewHas('users', User::sort()->get())
            ->assertViewHas('columns', $columns)
            ->assertSessionMissing('results');
    }

    /**
     * Test that the dashboard users page can sort by different columns.
     *
     * This test verifies that the users listing can be sorted by
     * different columns (like email) and in different directions (desc)
     * through URL query parameters.
     */
    public function test_dashboard_users_can_sort_by_different_columns()
    {
        User::factory()->count(3)->create();

        $response = $this->get('/dashboard/users?sortBy=email&dir=desc');

        $response->assertOk()
            ->assertViewHas('users');
    }

    /**
     * Test that the search field is required when performing a search.
     *
     * This test ensures that submitting a search request without
     * providing a search term results in a validation error for
     * the 'search' field.
     */
    public function test_dashboard_users_search_field_is_required()
    {

        $response = $this->post('dashboard/users/search', [
            'searchBy' => ''
        ]);

        $response->assertSessionHasErrors('search');
    }

    /**
     * Test that the searchBy field is required when a search term is provided.
     *
     * This test verifies that when a search term is provided, the searchBy
     * field (which specifies which columns to search in) is also required,
     * ensuring proper validation of search requests.
     */
    public function test_dashboard_users_searchby_field_is_required_when_search_is_present()
    {

        $response = $this->post('dashboard/users/search', [
            'search' => 'John'
        ]);

        $response->assertSessionHasErrors('searchBy');
    }

    /**
     * Test that dashboard search returns the expected results.
     *
     * This test creates users with specific first names, performs a search
     * for one of them, and verifies that the search functionality works
     * correctly by ensuring no validation errors occur, proper redirection
     * happens, and search results are stored in the session.
     */
    public function test_dashboard_search_returns_expected_results()
    {
        User::factory(2)->state(new Sequence(['first_name' => "mina"], ['first_name' => "ahmed"]))->create();

        $response = $this->post('dashboard/users/search', [
            'search' => 'mina',
            'searchBy' => ['first_name']
        ]);

        $response->assertSessionHasNoErrors()
            ->assertRedirectToRoute('dashboard.users')
            ->assertSessionHas('results');
    }
}
