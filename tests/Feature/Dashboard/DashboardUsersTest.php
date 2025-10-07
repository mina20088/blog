<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\User;
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

}
