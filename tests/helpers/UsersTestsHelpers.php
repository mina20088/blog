<?php
namespace Tests\helpers;

use App\Models\User;
use App\services\UsersService;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\App;

class UsersTestsHelpers
{
    public static function usersServiceParams(array $override = []) :array{
        return array_merge([
            User::query(),
            "term" => "",
            "searchBy" => [],
            "filters" => [],
            "orderBy" => "id",
            "orderDir" => "asc"
        ], $override);
    }

    public static function adminUserCreateValidData(array $override = []): array
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

    /**
     * @throws BindingResolutionException
     */
    public static function createUsersService(array $override = [])
    {
        return App::make(UsersService::class, self::usersServiceParams($override));
    }


}
