<?php

namespace Dashboard\Users;


use App\Http\Requests\SearchRequest;
use App\Models\User;
use App\services\UsersService;

use App\Traits\HandlesUserOperations;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;


use Tests\TestCase;

class FiltersTest extends TestCase
{
    use RefreshDatabase, WithFaker, HandlesUserOperations ;

    protected UsersService $userService;

    protected \Illuminate\Http\Request $fakeRequest;

    public function setUp(): void
    {
        parent::setUp();

        User::factory(3)->state(new Sequence(
            ['first_name' => 'mina', 'last_name' => 'remon', 'email' => 'minaremonshaker@gmail.com', 'username' => 'mina20088',] ,
            ['first_name' => 'georget', 'last_name' => 'wadi', 'email' => 'georget@yahoo.com', 'username' => 'gyr99000', ] ,
            ['first_name' => 'john', 'last_name' => 'doe', 'email' => 'john.doe@example.com', 'username' => 'johndoe', ]  ,
        ))->create();


    }

    public function test_search_users():void
    {


        $params = ['search' => 'mina'];

        $response = $this->get('dashboard/users?search=mina' );

        dump($response->original);


    }

}
