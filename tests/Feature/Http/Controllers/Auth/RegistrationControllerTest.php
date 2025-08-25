<?php

namespace Tests\Feature\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class RegistrationControllerTest extends TestCase
{
    use RefreshDatabase;

    private function validData($overrides = [])
    {
        return array_merge([
            'firstName' => 'John',
            'lastName' => 'Doe',
            'username' => 'user' . Str::random(5),
            'email' => 'john' . Str::random(5) . '@example.com',
            'password' => 'Password1!',
            'confirmPassword' => 'Password1!',
        ], $overrides);
    }

    public function test_store_creates_user_and_redirects_on_success()
    {
        $response = $this->post('/register', $this->validData());
        $response->assertRedirect('/register');
        $response->assertSessionHas('success', 'Registration was successful!');
        $this->assertDatabaseHas('users', [
            'email' => $this->validData()['email'],
        ]);
    }

    public function test_store_fails_with_invalid_data()
    {
        $fields = [
            'firstName' => '',
            'lastName' => '',
            'username' => '',
            'email' => 'not-an-email',
            'password' => '123',
            'confirmPassword' => 'notmatching',
        ];
        foreach ($fields as $field => $badValue) {
            $data = $this->validData([$field => $badValue]);
            $response = $this->post('/register', $data);
            $response->assertSessionHasErrors($field);
        }
    }

    public function test_password_is_hashed()
    {
        $data = $this->validData();
        $this->post('/register', $data);
        $user = User::where('email', $data['email'])->first();
        $this->assertNotNull($user);
        $this->assertNotEquals($data['password'], $user->password);
        $this->assertTrue(password_verify($data['password'], $user->password));
    }
}

