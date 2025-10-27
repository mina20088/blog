<?php

namespace Tests\Feature;


use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\Attributes\Test;
use Tests\DataProviders\AdminUserCreationTestsDataProvider;
use Tests\helpers\UsersTestsHelpers;
use Tests\TestCase;

class AdminCreateUserTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    #[DataProviderExternal(AdminUserCreationTestsDataProvider::class, 'adminUserCreationProvider')]
    public function attributes_with_required_validation_return_error(array $validations):void
    {
        extract($validations['check_required_validation_return_error']);

        $this
            ->post('/dashboard/users', UsersTestsHelpers::adminUserCreateValidData($input))
            ->assertSessionHasErrors($excepted);
        $this
            ->postJson('/dashboard/users', UsersTestsHelpers::adminUserCreateValidData($input))
            ->assertStatus($status)
            ->assertJsonValidationErrors($excepted)  ;

    }

    #[Test]
    #[DataProviderExternal(AdminUserCreationTestsDataProvider::class, 'adminUserCreationProvider')]
    public function attribute_profile_picture_is_not_image_return_error(array $validations):void
    {
        extract($validations['check_profile_picture_is_not_image_return_error']);

        $this
            ->postJson('/dashboard/users', UsersTestsHelpers::adminUserCreateValidData($input))
            ->assertJsonValidationErrors($excepted)
            ->assertStatus($status);

       $this
           ->post('/dashboard/users', UsersTestsHelpers::adminUserCreateValidData($input))
           ->assertSessionHasErrors($excepted);
    }

    #[Test]
    #[DataProviderExternal(AdminUserCreationTestsDataProvider::class, 'adminUserCreationProvider')]
    public function attribute_profile_picture_image_exceed_max_lenght_return_error(array $validations):void
    {
        extract($validations['check_profile_picture_exceed_max_length_return_error']);

        $this
            ->post('/dashboard/users', UsersTestsHelpers::adminUserCreateValidData($input))
            ->assertSessionHasErrors($expected);

        $this
            ->postJson('/dashboard/users', UsersTestsHelpers::adminUserCreateValidData($input))
            ->assertStatus($status)
            ->assertJsonValidationErrors($expected)  ;
    }

    #[Test]
    #[DataProviderExternal(AdminUserCreationTestsDataProvider::class, 'adminUserCreationProvider')]
    public function attribute_with_max_validation_return_error(array $validations):void
    {
        extract($validations['check_max_validation_error_return_error']);

        $this
            ->postJson('/dashboard/users', UsersTestsHelpers::adminUserCreateValidData($input))
            ->assertStatus($status)
            ->assertJsonValidationErrors($expected);

        $this
            ->post('/dashboard/users', UsersTestsHelpers::adminUserCreateValidData($input))
            ->assertSessionHasErrors($expected);
    }

    #[Test]
    #[DataProviderExternal(AdminUserCreationTestsDataProvider::class, 'adminUserCreationProvider')]
    public function attribute_with_nullable_return_no_error(array $validations):void
    {
        extract($validations['check_attributes_has_null_value_return_no_error']);

       $this
            ->followingRedirects()
            ->postJson('/dashboard/users', UsersTestsHelpers::adminUserCreateValidData($input))
            ->assertStatus($status)
            ->assertSessionDoesntHaveErrors();

    }

    #[Test]
    #[DataProviderExternal(AdminUserCreationTestsDataProvider::class, 'adminUserCreationProvider')]
    public function attribute_with_non_string_value_return_error(array $validations):void
    {
        extract($validations['check_attributes_has_string_validation_return_error']);

        $this
            ->postJson('/dashboard/users', UsersTestsHelpers::adminUserCreateValidData($input))
            ->assertStatus($status)
            ->assertJsonValidationErrors($expected) ;

        $this
            ->post('/dashboard/users', UsersTestsHelpers::adminUserCreateValidData($input))
            ->assertSessionHasErrors($expected);


    }

    #[Test]
    #[DataProviderExternal(AdminUserCreationTestsDataProvider::class, 'adminUserCreationProvider')]
    public function email_is_not_valid_return_error(array $validations)   :void
    {
        extract($validations['check_email_attribute_is_not_email_return_error']);

        $this
            ->postJson('/dashboard/users', UsersTestsHelpers::adminUserCreateValidData($input))
            ->assertStatus($status)
            ->assertJsonValidationErrors($expected)  ;
        $this
            ->post('/dashboard/users', UsersTestsHelpers::adminUserCreateValidData($input))
            ->assertSessionHasErrors($expected);
    }


    #[Test]
    #[DataProviderExternal(AdminUserCreationTestsDataProvider::class, 'adminUserCreationProvider')]
    public function email_and_username_is_not_unique_return_error(array $validations):void
    {
        extract($validations['check_email_and_username_is_not_unique_return_error']);

        User::factory()->create($user);

        $this
            ->postJson('/dashboard/users', UsersTestsHelpers::adminUserCreateValidData($input))
            ->assertStatus($status)
            ->assertJsonValidationErrors($expected) ;

        $this
            ->post('/dashboard/users', UsersTestsHelpers::adminUserCreateValidData($input))
            ->assertSessionHasErrors($expected);
    }

    #[Test]
    #[DataProviderExternal(AdminUserCreationTestsDataProvider::class, 'adminUserCreationProvider')]
    public function attributes_with_min_width_return_error(array $validations) :void
    {
        extract($validations['check_attribute_min_width_validation_return_error']);

        $this
            ->postJson('/dashboard/users', UsersTestsHelpers::adminUserCreateValidData($input))
            ->assertStatus($status)
            ->assertJsonValidationErrors($expected) ;

        $this
            ->post('/dashboard/users', UsersTestsHelpers::adminUserCreateValidData($input))
            ->assertSessionHasErrors($expected);


    }






}
