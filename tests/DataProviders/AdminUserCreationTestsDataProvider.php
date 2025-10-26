<?php

namespace Tests\DataProviders;

use Illuminate\Http\UploadedFile;

class AdminUserCreationTestsDataProvider
{
    public static function adminUserCreationProvider():array
    {
        return [
            'create' => [
                'validations' => [
                    'check_required_validation' => [
                        'profile_picture' => '',
                        'first_name' => '',
                        'last_name' => '',
                        'email' => '',
                        'username' => '',
                        'password' => '',
                        'phone_number' => '',
                        'country' => '',
                    ]
                ]

            ]

        ];
    }
}
