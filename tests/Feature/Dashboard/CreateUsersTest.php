<?php

namespace Tests\Feature\Dashboard;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use JsonException;
use Tests\TestCase;

class CreateUsersTest extends TestCase
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

    public function test_create_user_required_validation():void
    {
        $response = $this->post('/dashboard/users' ,$this->validData([
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
            'first_name' => 'The first name field is required.' ,
            'last_name' => "The last name field is required."  ,
            'profile_picture' => "The profile picture field is required." ,
            'email' => "The email field is mandatory." ,
            'username' => "The username field is required.",
            'password' => "The password field is required." ,
            'phone_number' => "The phone number field is required." ,
            'country' => "The country field is required." ,
        ]);


    }

    public function test_create_user_city_required_with_country():void
    {
        $response = $this->post('/dashboard/users', $this->validData([
            'country' => 'USA',
            'city' => ''
        ]) );

        $response->assertSessionHasErrors([
          'city' => 'The city field is required when country is present.'
        ]);
    }


    public function test_profile_picture_validations():void
    {
        $response = $this->post('/dashboard/users', $this->validData([
            'profile_picture' =>  UploadedFile::fake()
                ->image('profile_photo.png', 600, 600)
                ->size(60000)
        ]));

        $response->assertSessionHasErrors([
            'profile_picture' => 'The profile picture field must not be greater than 50000 kilobytes.',
        ]);

        $response = $this->post('/dashboard/users', $this->validData([
            'profile_picture' =>  UploadedFile::fake()
                ->image('profile_photo.png', 600, 600)
                ->mimeType('application/pdf')
        ]));

        $response->assertSessionHasErrors([
            'profile_picture' => 'The profile picture field must be an image.',
        ]);

        $response = $this->post('/dashboard/users', $this->validData([
            'profile_picture' =>  UploadedFile::fake()
                ->image('profile_photo.bmp', 600, 600)
        ]));

        $response->assertSessionHasErrors([
            'profile_picture' => 'The profile picture field must be a file of type: png, jpeg.',
        ]);
    }


    /**
     * @throws JsonException
     */
    public function test_bio_max_length_and_nullable() :void
    {
        $response = $this->post('/dashboard/users', $this->validData([
             'bio' =>  $this->faker()->sentence(400)
        ]));

        $response->assertSessionHasErrors([
            'bio' => 'The bio field must not be greater than 500 characters.'
        ]);

        $response = $this->post('/dashboard/users', $this->validData([
            'bio' => null
        ]));

        $response->assertSessionHasNoErrors();
    }




}
