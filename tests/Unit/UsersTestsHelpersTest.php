<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\services\UsersService;
use Tests\Helpers\UsersTestsHelpers;
use Illuminate\Database\Eloquent\Builder;

class UsersTestsHelpersTest extends TestCase
{
    public function test_users_service_params_returns_default_values(): void
    {
        $params = UsersTestsHelpers::usersServiceParams();

        $this->assertInstanceOf(Builder::class, $params[0]);
        $this->assertEquals("", $params["term"]);
        $this->assertEquals([], $params["searchBy"]);
        $this->assertEquals([], $params["filters"]);
        $this->assertEquals("id", $params["orderBy"]);
        $this->assertEquals("asc", $params["orderDir"]);
    }

    public function test_users_service_params_overrides_default_values(): void
    {
        $override = [
            "term" => "test",
            "searchBy" => ["name"],
            "filters" => ["active" => true],
            "orderBy" => "name",
            "orderDir" => "desc"
        ];

        $params = UsersTestsHelpers::usersServiceParams($override);

        $this->assertInstanceOf(Builder::class, $params[0]);
        $this->assertEquals("test", $params["term"]);
        $this->assertEquals(["name"], $params["searchBy"]);
        $this->assertEquals(["active" => true], $params["filters"]);
        $this->assertEquals("name", $params["orderBy"]);
        $this->assertEquals("desc", $params["orderDir"]);
    }

    public function test_users_service_creation_without_override_value()
    {
        
        $createService = UsersTestsHelpers::createUsersService();

        
        $this->assertInstanceOf(UsersService::class, $createService);
        $this->assertObjectHasProperty('term', $createService);
        $this->assertObjectHasProperty('filters', $createService);   
        $this->assertObjectHasProperty('searchBy', $createService);
        $this->assertObjectHasProperty('orderBy', $createService);
        $this->assertObjectHasProperty('orderDir', $createService);
        $this->assertObjectHasProperty('query', $createService);
        
    }
}
