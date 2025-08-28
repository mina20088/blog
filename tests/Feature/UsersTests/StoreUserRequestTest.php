<?php

namespace Tests\Feature\UsersTests;

use Tests\TestCase;
use App\Models\User;
use App\Enums\Gender;
use App\Models\Profile;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StoreUserRequestTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Generate valid user data for testing, with optional overrides.
     */
    private function validData($overrides = [])
    {
        return array_merge([
            'profile_picture' => UploadedFile::fake()->image('avatar.png'),
            'bio' => 'This is a short bio.',
            'github_repo_url' => 'https://github.com/example',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john' . Str::random(5) . '@example.com',
            'username' => 'user' . Str::random(5),
            'password' => 'Password1!',
            'date_of_birth' => '2000-01-01',
            'gender' => Gender::male->value,
            'phone_number' => '(578)-123-33444',
            'country' => "Egypt",
            'city' => 'cairo',
            'street' => '23 abn matroh shoupra',
            'state' => "Shoupra",
            'zip_code' => '12345',
            'x_url' => 'https://twitter.com/example',
            'instagram_url' => 'https://instagram.com/example'
        ], $overrides);
    }

    /**
     * Test that profile_picture is required and must be an image file.
     */
    public function test_profile_image_is_required_and_must_be_image(): void
    {
        $response = $this->post('/dashboard/users', $this->validData(['profile_picture' => null]));
        $response->assertSessionHasErrors('profile_picture');

        $response = $this->post('/dashboard/users', $this->validData(['profile_picture' => UploadedFile::fake()->create('file.pdf', 10, 'application/pdf')]));
        $response->assertSessionHasErrors('profile_picture');
    }

    /**
     * Test that bio does not exceed the maximum allowed length.
     */
    public function test_bio_max_length(): void
    {
        $response = $this->post('/dashboard/users', $this->validData(['bio' => Str::random(501)]));
        $response->assertSessionHasErrors('bio');
    }

    /**
     * Test that github_repo_url must be a valid URL.
     */
    public function test_git_hub_link_must_be_url(): void
    {
        $response = $this->post('/dashboard/users', $this->validData(['github_repo_url' => 'not-a-url']));
        $response->assertSessionHasErrors('github_repo_url');
    }

    /**
     * Test that first_name and last_name are required fields.
     */
    public function test_first_and_last_name_are_required(): void
    {
        $response = $this->post('/dashboard/users', $this->validData(['first_name' => null]));
        $response->assertSessionHasErrors('first_name');
        $response = $this->post('/dashboard/users', $this->validData(['last_name' => null]));
        $response->assertSessionHasErrors('last_name');
    }

    /**
     * Test that email is required, unique, and valid.
     */
    public function test_email_is_required_and_unique_and_valid(): void
    {
        $user = User::factory()->create(['email' => 'test@example.com']);
        $response = $this->post('/dashboard/users', $this->validData(['email' => null]));
        $response->assertSessionHasErrors('email');
        $response = $this->post('/dashboard/users', $this->validData(['email' => 'not-an-email']));
        $response->assertSessionHasErrors('email');
        $response = $this->post('/dashboard/users', $this->validData(['email' => $user->email]));
        $response->assertSessionHasErrors('email');
    }

    /**
     * Test that username is required, unique, and within the allowed length.
     */
    public function test_username_is_required_unique_and_length(): void
    {
        $user = User::factory()->create(['username' => 'uniqueuser']);
        $response = $this->post('/dashboard/users', $this->validData(['username' => null]));
        $response->assertSessionHasErrors('username');
        $response = $this->post('/dashboard/users', $this->validData(['username' => 'usr']));
        $response->assertSessionHasErrors('username');
        $response = $this->post('/dashboard/users', $this->validData(['username' => Str::random(21)]));
        $response->assertSessionHasErrors('username');
        $response = $this->post('/dashboard/users', $this->validData(['username' => $user->username]));
        $response->assertSessionHasErrors('username');
    }

    /**
     * Test that a password is required and meets strength requirements.
     */
    public function test_password_is_required_and_strong(): void
    {
        $response = $this->post('/dashboard/users', $this->validData(['password' => null]));
        $response->assertSessionHasErrors('password');
        $response = $this->post('/dashboard/users', $this->validData(['password' => 'week']));
        $response->assertSessionHasErrors('password');
    }

    /**
     * Test that date_of_birth is a valid date or nullable.
     */
    public function test_date_of_birth_is_date_or_nullable(): void
    {
        $response = $this->post('/dashboard/users', $this->validData(['date_of_birth' => 'not-a-date']));
        $response->assertSessionHasErrors('date_of_birth');
        $response = $this->post('/dashboard/users', $this->validData(['date_of_birth' => null]));
        $response->assertSessionDoesntHaveErrors('date_of_birth');
    }

    /**
     * Test that gender is nullable.
     */
    public function test_gender_is_nullable(): void
    {
        $response = $this->post('/dashboard/users', $this->validData(['gender' => null]));
        $response->assertSessionDoesntHaveErrors('gender');
    }

    /**
     * Test that valid data passes validation.
     */
    public function test_valid_data_passes_validation(): void
    {
        $response = $this->post('/dashboard/users', $this->validData());
        $response->assertSessionDoesntHaveErrors();
    }

    /**
     * Test that the phone number does not exceed the maximum allowed length.
     */
    public function test_phone_max_length(): void
    {
        $response = $this->post('/dashboard/users', $this->validData(['phone_number' => Str::random(21)]));
        $response->assertSessionHasErrors('phone_number');
    }

    /**
     * Test that country is a required field.
     */
    public function test_country_is_required(): void
    {
        $response = $this->post('/dashboard/users', $this->validData(['country' => '']));
        $response->assertSessionHasErrors();
    }

    /**
     * Test that city is required when a country is present.
     */
    public function test_city_is_required_with_country(): void{
        $response = $this->post('/dashboard/users', $this->validData(['country' => 'USA', 'city' => '']));
        $response->assertSessionHasErrors('city');
    }

    public function test_street_is_not_string(): void
    {
        $response = $this->post('/dashboard/users', $this->validData(['street' => [] ]));
        $response->assertSessionHasErrors('street');
    }

    public function test_street_is_null() :void{
        $response = $this->post('/dashboard/users', $this->validData(['street' => null ]));
        $response->assertSessionDoesntHaveErrors('street');
    }

    public function test_state_is_not_string(): void
    {
        $response = $this->post('/dashboard/users', $this->validData(['state' => [] ]));
        $response->assertSessionHasErrors('state');
    }

    public function test_state_is_null() :void{
        $response = $this->post('/dashboard/users', $this->validData(['state' => null ]));
        $response->assertSessionDoesntHaveErrors('state');
    }



    public function test_zip_code_is_string_or_nullable(): void
    {
        $response = $this->post('/dashboard/users', $this->validData(['zip_code' => null]));

        $response->assertSessionDoesntHaveErrors('zip_code');

        $response = $this->post('/dashboard/users', $this->validData(['zip_code' => 12345]));

        $response->assertSessionHasErrors('zip_code');

        $response = $this->post('/dashboard/users', $this->validData(['zip_code' => 'ABCDE']));

        $response->assertSessionDoesntHaveErrors('zip_code');
    }

    public function test_instagram_is_url_or_nullable(): void
    {
        $response = $this->post('/dashboard/users', $this->validData(['instagram' => null]));

        $response->assertSessionDoesntHaveErrors('instagram');

        $response = $this->post('/dashboard/users', $this->validData(['instagram' => 'not-a-url']));

        $response->assertSessionHasErrors('instagram');

        $response = $this->post('/dashboard/users', $this->validData(['instagram' => 'https://instagram.com/example']));

        $response->assertSessionDoesntHaveErrors('instagram');
    }

    public function test_website_is_url_or_nullable(): void
    {
        $response = $this->post('/dashboard/users', $this->validData(['website' => null]));

        $response->assertSessionDoesntHaveErrors('website');

        $response = $this->post('/dashboard/users', $this->validData(['website' => 'not-a-url']));

        $response->assertSessionHasErrors('website');

        $response = $this->post('/dashboard/users', $this->validData(['website' => 'https://example.com']));

        $response->assertSessionDoesntHaveErrors('website');
    }

    public function test_twitter_profile_is_url(): void
    {
        $user = User::factory(1)->has(Profile::factory(1)->state(['x_url' => 'uuuuiiiuiui']))->create()->first();

        $response = $this->post('/dashboard/users', $this->validData(['x_url' => $user->profile->{'x_url'}]));

        $response->assertSessionHasErrors(['x_url']);
    }

    public function test_only_users_data_returned()
    {
        $usersData = collect($this->validData())->only(['first_name', 'last_name','username' ,'email', 'password'])->toArray();

        $userProfileData = collect($this->validData())->except(['first_name', 'last_name','username' ,'email', 'password'])->toArray();

        foreach($usersData as $key => $value){
            $this->assertArrayNotHasKey($key, $userProfileData);
        }
    }
}
