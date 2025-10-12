<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * UserRegistrationTest
 *
 * This test class contains integration tests for the user registration process.
 * It covers a variety of scenarios including
 *   - Successful registration with valid data
 *   - Validation errors for invalid or missing fields (name, email, username, password, etc.)
 *   - Uniqueness constraints for username and email
 *   - Password complexity and confirmation rules
 *   - Rate limiting on registration attempts
 *   - Form repopulation after validation errors
 *
 * The tests use Laravel's built-in HTTP testing utilities and database refresh trait to ensure
 * a clean state for each test. The validData() helper provides a default valid payload for registration,
 * which can be overridden as needed in each test case.
 *
 * @see \Tests\TestCase
 * @see \App\Models\User
 * @see \Illuminate\Foundation\Testing\RefreshDatabase
 */

class UserRegistrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Returns a valid set of user registration data, allowing overrides for specific fields.
     * This helper is used to generate default valid input for registration tests.
     *
     * @param array $overrides Key-value pairs to override default data.
     * @return array The merged registration data.
     */
    private function validData(array $overrides = []): array
    {
        return array_merge([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'jhoneDoe@example.com',
            'username' => 'Jhon20099',
            'password' => 'Password1!',
            'confirmPassword' => 'Password1!'
        ], $overrides);
    }

    /**
     * Test user registration with valid data.
     *
     * This test submits a valid registration form and asserts:
     * - No validation errors are present in the session.
     * - The user is redirected to the registration page.
     * - A success message is present in the session.
     * - The user is created in the database with the provided email.
     *
     * @throws \JsonException
     */
    public function test_user_registration_with_valid_data(): void
    {
        $response = $this->post('/register', $this->validData());

        $response->assertSessionHasNoErrors();

        $response->assertRedirect('/register');

        $response->assertSessionHas('success', 'Registration was successful!');

        $this->assertDatabaseHas('users', ['email' => "jhoneDoe@example.com"]);
    }

    /**
     * Test user registration with invalid data.
     *
     * This test submits a registration form with invalid email, short password, and mismatched confirmation.
     * It asserts that validation errors are present for the email, password, and confirmPassword fields,
     * and that the user is redirected back to the form.
     */
    public function test_user_registration_with_invalid_data(): void
    {
        $response = $this->post('/register', $this->validData([
            'email' => 'invalid-email',
            'password' => 'short',
            'confirmPassword' => 'different'
        ]));
        $response->assertSessionHasErrors([
            'email',
            'password',
            'confirmPassword'
        ])->assertRedirectBack();
    }

    /**
     * Test user registration with too short or missing first and last names.
     *
     * This test submits registration forms with first and last names that are too short or empty,
     * and asserts that validation errors are present for both fields and the user is redirected back.
     */
    public function test_user_registration_with_first_name_too_short_and_required(): void
    {
        $response = $this->post('/register', $this->validData([
            'first_name' => 'Jo',
            'last_name' => 'Do',
        ]));

        $response->assertSessionHasErrors(['first_name', 'last_name'])->assertRedirectBack();

        $response = $this->post('/register', $this->validData([
            'first_name' => '',
            'last_name' => '',
        ]));

        $response->assertSessionHasErrors(['first_name', 'last_name'])->assertRedirectBack();
    }

    /**
     * Test user registration with username required, min, and max length validation.
     *
     * This test submits registration forms with empty, too short, and too long usernames,
     * and asserts that validation errors are present for the username field and the user is redirected back.
     */
    public function test_user_registration_with_username_required_and_max_length_min_length(): void
    {
        $response = $this->post('/register', $this->validData([
            'username' => '',
        ]));

        $response->assertSessionHasErrors(['username'])->assertRedirectBack();

        $response = $this->post('/register', $this->validData([
            'username' => 'ab',
        ]));

        $response->assertSessionHasErrors(['username'])->assertRedirectBack();

        $response = $this->post('/register', $this->validData([
            'username' => 'averylongusernamethatiswaytoobig',
        ]));

        $response->assertSessionHasErrors(['username'])->assertRedirectBack();
    }

    /**
     * Test user registration with a non-unique username.
     *
     * This test creates a user with a specific username, then attempts to register another user with the same username.
     * It asserts that a validation error is present for the username field and the user is redirected back.
     */
    public function test_user_registration_username_with_unique_value(): void
    {
        $user = User::factory(1, ['username' => 'Jhon2009'])->create();

        $response = $this->post('/register', $this->validData([
            'username' => $user->first()->username,
        ]));

        $response->assertSessionHasErrors(['username'])->assertRedirectBack();
    }

    /**
     * Test user registration with email required, valid format, and uniqueness validation.
     *
     * This test submits registration forms with empty, invalid, and duplicate emails,
     * and asserts that validation errors are present for the email field and the user is redirected back.
     */
    public function test_user_registration_email_required_and_is_email_and_unique(): void
    {
        $response = $this->post('/register', $this->validData([
            'email' => ''
        ]));

        $response->assertSessionHasErrors('email')->assertRedirectBack();

        $response = $this->post('/register', $this->validData([
            'email' => 'ssjsjsjsjddshsj'
        ]));

        $response->assertSessionHasErrors('email')->assertRedirectBack();

        $user = User::factory(1, ['email' => 'minaremon@gmail.com'])->create();

        $response = $this->post('/register', $this->validData([
            'email' => $user->first()->email,
        ]));

        $response->assertSessionHasErrors('email')->assertRedirectBack();
    }

    /**
     * Test user registration with required password and confirm password fields.
     *
     * This test submits a registration form with empty password and confirmPassword fields,
     * and asserts that a validation error is present for the password field and the user is redirected back.
     */
    public function test_user_registration_password_and_confirm_password_is_required(): void
    {
        $response = $this->post('/register', $this->validData([
            'password' => '',
            'confirmPassword' => '',
        ]));

        $response->assertSessionHasErrors(['password'])->assertRedirectBack();
    }

    /**
     * Test user registration with mismatched password and confirm password fields.
     *
     * This test submits a registration form where the password and confirmPassword fields do not match,
     * and asserts that a validation error is present for the confirmPassword field and the user is redirected back.
     */
    public function test_user_registration_confirm_password_matched_password(): void
    {
        $response = $this->post('/register', $this->validData([
            'password' => 'Hecaro198@',
            'confirmPassword' => 'Hecaro1986',
        ]));

        $response->assertSessionHasErrors(['confirmPassword'])->assertRedirectBack();
    }

    /**
     * Test user registration password validation rules.
     *
     * This test disables rate limiting and submits registration forms with passwords that are too short, too long,
     * missing letters, missing numbers, or missing symbols, and asserts that validation errors are present for the password field.
     * It also tests a valid password to ensure no validation errors occur.
     *
     * @throws \JsonException
     */
    public function test_user_registration_password_validation_rules(): void
    {
        $this->withoutMiddleware(\App\Http\Middleware\RateLimiterMiddleWare::class);
        // Too short
        $response = $this->post('/register', $this->validData([
            'password' => 'A1@a',
            'confirmPassword' => 'A1@a',
        ]));
        $response->assertSessionHasErrors(['password'])->assertRedirectBack();

        // Too long
        $response = $this->post('/register', $this->validData([
            'password' => 'A1@aaaaaaaaaaaaaa', // 16 chars
            'confirmPassword' => 'A1@aaaaaaaaaaaaaa',
        ]));
        $response->assertSessionHasErrors(['password'])->assertRedirectBack();

        // Missing letters
        $response = $this->post('/register', $this->validData([
            'password' => '12345678@',
            'confirmPassword' => '12345678@',
        ]));
        $response->assertSessionHasErrors(['password'])->assertRedirectBack();

        // Missing numbers
        $response = $this->post('/register', $this->validData([
            'password' => 'Password@',
            'confirmPassword' => 'Password@',
        ]));
        $response->assertSessionHasErrors(['password'])->assertRedirectBack();

        // Missing symbols
        $response = $this->post('/register', $this->validData([
            'password' => 'Password1',
            'confirmPassword' => 'Password1',
        ]));
        $response->assertSessionHasErrors(['password'])->assertRedirectBack();

        // Valid password
        $response = $this->post('/register', $this->validData([
            'password' => 'Valid1@pw',
            'confirmPassword' => 'Valid1@pw',
        ]));
        $response->assertSessionHasNoErrors();
    }

    /**
     * Test user registration rate limiting.
     *
     * This test submits the registration form multiple times in quick succession to trigger rate limiting,
     * and asserts that a validation error is present for the rate-limiter field and the user is redirected back.
     */
    public function test_user_registration_rate_limiting(): void
    {
        $response = null;

        for ($i = 0; $i < 5; $i++) {
            $response = $this->post('/register', $this->validData([
                'email' => "minsremon@gmail.com"
            ]));
        }
        $response->assertRedirectBack()->assertSessionHasErrors('rate-limiter');
    }


}
