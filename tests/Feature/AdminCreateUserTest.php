<?php

namespace Tests\Feature;


use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\Attributes\Test;
use Tests\DataProviders\AdminUserCreationTestsDataProvider;
use Tests\TestCase;

class AdminCreateUserTest extends TestCase
{
    #[Test]
    #[DataProviderExternal(AdminUserCreationTestsDataProvider::class, 'adminUserCreationProvider')]
    public function required_validation_return_error(array $validations):void
    {
        extract($validations);

        $response = $this->post('/dashboard/users', $check_required_validation) ;


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
}
