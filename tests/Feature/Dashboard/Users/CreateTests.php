<?php

namespace Dashboard\Users;


use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use JsonException;
use Tests\TestCase;

class CreateTests extends TestCase
{
    use RefreshDatabase, WithFaker;

    private function validData(array $override = []): array
    {
        return array_merge([
            'profile_picture' => UploadedFile::fake()->image('profile_photo.png', 600, 600),
            'bio' => 'Passionate software developer with 5 years of experience in web development. Love building scalable applications and contributing to open source projects.',
            'github_repo_url' => 'https://github.com/johndoe/awesome-project',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'username' => 'johndoe2025',
            'password' => 'SecurePass123!',
            'date_of_birth' => '1995-03-15',
            'gender' => 1,
            'phone_number' => '+1-555-123-4567',
            'country' => 'United States',
            'city' => 'San Francisco',
            'street' => '123 Main Street',
            'state' => 'California',
            'website' => 'https://johndoe.dev',
            'zip_code' => '94102',
            'x_url' => 'https://x.com/johndoe',
            'instagram_url' => 'https://instagram.com/johndoe'
        ], $override);
    }

    public function test_create_user_required_validation(): void
    {
        $response = $this->post('/dashboard/users', $this->validData([
            'first_name' => '',
            'last_name' => '',
            'profile_picture' => '',
            'email' => '',
            'username' => '',
            'password' => '',
            'phone_number' => '',
            'country' => '',
            'city' => 'CA'
        ]));

        $response->assertSessionHasErrors([
            'first_name' => 'The first name field is required.',
            'last_name' => "The last name field is required.",
            'profile_picture' => "The profile picture field is required.",
            'email' => "The email field is mandatory.",
            'username' => "The username field is required.",
            'password' => "The password field is required.",
            'phone_number' => "The phone number field is required.",
            'country' => "The country field is required.",
        ]);


    }

    public function test_create_user_city_required_with_country(): void
    {
        $response = $this->post('/dashboard/users', $this->validData([
            'country' => 'USA',
            'city' => ''
        ]));

        $response->assertSessionHasErrors([
            'city' => 'The city field is required when country is present.'
        ]);
    }


    public function test_profile_picture_validations(): void
    {
        $response = $this->post('/dashboard/users', $this->validData([
            'profile_picture' => UploadedFile::fake()
                ->image('profile_photo.png', 600, 600)
                ->size(60000)
        ]));

        $response->assertSessionHasErrors([
            'profile_picture' => 'The profile picture field must not be greater than 50000 kilobytes.',
        ]);

        $response = $this->post('/dashboard/users', $this->validData([
            'profile_picture' => UploadedFile::fake()
                ->image('profile_photo.png', 600, 600)
                ->mimeType('application/pdf')
        ]));

        $response->assertSessionHasErrors([
            'profile_picture' => 'The profile picture field must be an image.',
        ]);

        $response = $this->post('/dashboard/users', $this->validData([
            'profile_picture' => UploadedFile::fake()
                ->image('profile_photo.bmp', 600, 600)
        ]));

        $response->assertSessionHasErrors([
            'profile_picture' => 'The profile picture field must be a file of type: png, jpeg.',
        ]);
    }


    public function test_max_length_fields(): void
    {
        $response = $this->post('/dashboard/users', $this->validData([
            'bio' => $this->faker()->sentence(600),
            'username' => $this->faker()->sentence(25),
            'phone_number' => $this->faker()->words(23)
        ]));

        $response->assertSessionHasErrors([
            'bio' => 'The bio field must not be greater than 500 characters.',
            'username' => 'The username field must not be greater than 20 characters.',
            'phone_number' => 'The phone number field must not be greater than 20 characters.'
        ]);
    }

    public function test_min_width_fields(): void
    {
        $response = $this->post('/dashboard/users', $this->validData([
            'username' => 'min',
            'password' => 'Heca'
        ]));

        $response->assertSessionHasErrors([
            'username' => 'The username field must be at least 5 characters.',
            'password' => 'The password field must be at least 8 characters.'
        ]);
    }


    public function test_github_rebo_url_is_url_and_nullable(): void
    {
        $response = $this->post('/dashboard/users', $this->validData([
            'github_repo_url' => $this->faker()->sentence(5)
        ]));

        $response->assertSessionHasErrors([
            'github_repo_url' => "The github repo url field must be a valid URL."
        ]);

    }


    public function test_must_be_string_fields(): void
    {
        $response = $this->post('/dashboard/users', $this->validData([
            'first_name' => $this->faker()->randomNumber(),
            'last_name' => $this->faker()->randomNumber(),
            'password' => $this->faker()->randomNumber(8),
            'street' => $this->faker()->randomNumber(),
            'state' => $this->faker()->randomNumber(),
            'zip_code' => $this->faker()->randomNumber()
        ]));

        $response->assertSessionHasErrors([
            'first_name' => 'The first name field must be a string.',
            'last_name' => 'The last name field must be a string.',
            'password' => "The password field must be a string.",
            'street' => "The street field must be a string.",
            'state' => "The state field must be a string.",
            'zip_code' => "The zip code field must be a string."
        ]);
    }


    /**
     * @throws JsonException
     */
    public function test_nullable_fields(): void
    {
        $response = $this->post('/dashboard/users', $this->validData([
            'bio' => null,
            'github_repo_url' => null,
            'date_of_birth' => null,
            'gender' => null,
            'street' => null,
            'state' => null,
            'website' => null,
            'zip_code' => null,
            'x-url' => null,
            'instagram_url' => null
        ]));

        $response->assertSessionDoesntHaveErrors([
            'bio',
            'github_repo_url',
            'date_of_birth',
            'gender',
            'street',
            'state',
            'website',
            'zip_code',
            'x-url',
            'instagram_url'
        ]);

        $response->assertSessionHasNoErrors();
    }

    public function test_filed_is_email(): void
    {
        $response = $this->post('/dashboard/users', $this->validData([
            'email' => 'minaremon@'
        ]));

        $response->assertSessionHasErrors([
            'email' => 'The email field must be a valid email address.'
        ]);
    }

    public function test_unique_fields(): void
    {
        $user = User::create($this->validData([
            'email' => 'john.doe@example.com',
            'username' => 'johndoe2025'

        ]));

        $response = $this->post('/dashboard/users', $this->validData([
            'email' => 'john.doe@example.com',
            'username' => 'johndoe2025'
        ]));

        $response->assertSessionHasErrors([
            'email' => 'The email has already been taken.',
            'username' => 'The username has already been taken.'


        ]);

    }

    public function test_integer_fields(): void
    {
        $response = $this->post('/dashboard/users', $this->validData([
            'gender' => "Male"
        ]));

        $response->assertSessionHasErrors([
            'gender' => 'The gender field must be an integer.'

        ]);
    }

    public function test_if_value_is_in_array():void
    {
        $response = $this->post('/dashboard/users', $this->validData([
            'gender' => 3
        ]));

        $response->assertSessionHasErrors([
           'gender' => 'The selected gender is invalid.'
        ]);
    }


}
