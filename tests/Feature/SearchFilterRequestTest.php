<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class SearchFilterRequestTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    #[Test]
    public function it_requires_search_and_searchBy_fields(): void
    {
        $response = $this->post('dashboard/users/search', []);
        $response->assertSessionHasErrors([
            'search',
        ]);
    }

    #[Test]
    public function it_requires_searchBy_when_search_is_present(): void
    {
        $response = $this->post('dashboard/users/search', [
            'search' => 'john',
        ]);
        $response->assertSessionHasErrors(['searchBy']);
    }

    #[Test]
    public function it_accepts_valid_payload(): void
    {
        $response = $this->post('dashboard/users/search', [
            'search' => 'john',
            'searchBy' => 'name',
        ]);
        $response->assertSessionDoesntHaveErrors(['search', 'searchBy']);
    }

    #[Test]
    public function it_allows_optional_sortBy(): void
    {
        $response = $this->post('dashboard/users/search', [
            'search' => 'john',
            'searchBy' => 'name',
            'sortBy' => 'email',
        ]);
        $response->assertSessionDoesntHaveErrors(['sortBy']);
    }

}

