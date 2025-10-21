<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

/**
 * Feature tests for user login functionality.
 *
 * This class contains tests to verify the login process, including validation,
 * session handling, and the remember me feature.
 */
class UserLoginTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * Returns a valid set of login credentials, allowing overrides for specific fields.
     *
     * @param array $override
     * @return array
     */
    private function validData(array $override = []): array
    {
        return array_merge([
            'email' => 'minaremonshaker@gmail.com',
            'password' => 'Hecaro1986@'
        ], $override);
    }

    /**
     * Test that a user can log in with valid credentials.
     *
     * @throws \JsonException
     * @return void
     */
    public function test_user_login_with_valid_data(): void
    {
        $response = $this->post('/login', $this->validData());
        $response->assertSessionHasNoErrors();
    }

    /**
     * Test that login fails with invalid (empty) credentials and returns errors for the email field.
     *
     * @return void
     */
    public function test_user_login_with_invalid_data(): void
    {
        $response = $this->post('/login', $this->validData(['email' => '', 'password' => '']));
        $response->assertSessionHasErrors('email');
    }

    /**
     * Test that login fails when the email is not a valid email address.
     *
     * @return void
     */
    public function test_user_login_is_email(): void
    {
        $response = $this->post('/login', $this->validData(['email' => 'invalid-email']));
        $response->assertSessionHasErrors('email');
    }

    /**
     * Test that the 'remember me' option is checked and passed correctly during login.
     *
     * @return void
     */
    public function test_user_login_remember_me_is_checked()
    {
        $response = $this->post('/login', $this->validData(['remember' => true]));
        $this->assertTrue($response->baseRequest->get('remember') === true);
    }

    /**
     * Test that the 'remember me' option is unchecked and passed correctly during login.
     *
     * @return void
     */
    public function test_user_login_remember_me_is_unchecked()
    {
        $response = $this->post('/login', $this->validData(['remember' => false]));
        $this->assertTrue($response->baseRequest->get('remember') === false);
    }
}
