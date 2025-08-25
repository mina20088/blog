<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    private function validData($overrides = []): array
    {
        return array_merge([
            'firstName' => 'John',
            'lastName' => 'Doe',
            'username' =>  'johnDoe',
            'email' => 'johnDoe@gmail.com',
            'password' => "Hecaro1986@",
            'confirmPassword' => "Hecaro1986@"
        ], $overrides);
    }

    public function test_user_can_register_with_valid_data(): void
    {
        $response = $this->post('/register', $this->validData());

        $response
            ->assertRedirectToRoute('register')
            ->assertStatus((302))
            ->assertSessionHas('success', 'Registration was successful!');

        $this->assertDatabaseHas('users',[
            'first_name' => 'John',
            'last_name' => 'Doe',
            'username' => 'johnDoe',
            'email' => 'johnDoe@gmail.com' ,
        ]);

    }

    public function test_registration_fails_with_invalid_data(): void
    {
        $fields = [
            'firstName' => '',
            'lastName' => '',
            'username' => '',
            'email' => 'not-an-email',
        ];
        foreach ($fields as $field => $badValue) {
            $data = $this->validData([$field => $badValue]);
            $response = $this->post('/register', $data);
            $response->assertSessionHasErrors($field);
        }
    }

    public function test_first_name_is_required_and_min_length(): void
    {
        $response = $this->post('/register', $this->validData(['firstName' => '']));
        $response->assertSessionHasErrors('firstName');

        $response = $this->post('/register', $this->validData(['firstName' => 'Jo']));
        $response->assertSessionHasErrors('firstName');
    }

    public function test_username_is_required_and_unique(): void
    {
        $user = User::factory()->create([
            'username' => 'minah123'
        ]);

        $response = $this->post('/register', $this->validData(['username' => '']));

        $response->assertSessionHasErrors();

        $response = $this->post('/register' , $this->validData(['username' => $user->username]));

        $response->assertSessionHasErrors();

    }

    public function test_username_max_and_min_length(): void
    {
        $response = $this->post('/register', $this->validData(['username' => 'ab']));

        $response->assertSessionHasErrors('username');

        $response = $this->post('/register', $this->validData(['username' => Str::random(16)]));

        $response->assertSessionHasErrors('username');
    }



    public function test_password_is_hashed(): void
    {
        $data = $this->validData();
        $this->post('/register', $data);
        $user = User::where('email', $data['email'])->first();
        $this->assertNotNull($user);
        $this->assertNotEquals($data['password'], $user->password);
        $this->assertTrue(password_verify($data['password'], $user->password));
    }
}

