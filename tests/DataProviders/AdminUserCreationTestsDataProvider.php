<?php

namespace Tests\DataProviders;

use Illuminate\Http\UploadedFile;
use Faker\Factory as FakerFactory;

class AdminUserCreationTestsDataProvider
{


    public static function adminUserCreationProvider(): array
    {

        $faker = FakerFactory::create();

        return [
            'create' => [
                'validations' => [
                    'check_required_validation_return_error' =>
                        [
                            'input' => [
                                'profile_picture' => '',
                                'first_name' => '',
                                'last_name' => '',
                                'email' => '',
                                'username' => '',
                                'password' => '',
                                'phone_number' => '',
                                'country' => '',
                            ],
                            'status' => 422,
                            'excepted' => [
                                'first_name' => 'The first name field is required.',
                                'last_name' => 'The last name field is required.',
                                'profile_picture' => 'The profile picture field is required.',
                                'email' => 'The email field is mandatory.',
                                'username' => 'The username field is required.',
                                'password' => 'The password field is required.',
                                'phone_number' => 'The phone number field is required.',
                                'country' => 'The country field is required.',
                            ]
                        ],
                    'check_profile_picture_is_not_image_return_error' =>
                        [
                            'input' => [
                                'profile_picture' => UploadedFile::fake()
                                    ->create('profile_photo.txt')
                            ],
                            'status' => 422,
                            'excepted' => [
                                'profile_picture' => 'The profile picture field must be an image.'
                            ]


                        ],
                    'check_profile_picture_exceed_max_length_return_error' =>
                        [
                            'input' => [
                                'profile_picture' => UploadedFile::fake()
                                    ->create('profile_picture.jpg', 60000),
                            ],
                            'status' => 422,
                            'expected' => [
                                'profile_picture' => 'The profile picture field must not be greater than 50000 kilobytes.'
                            ]
                        ],
                    'check_max_validation_error_return_error' =>
                        [
                            'input' => [
                                'bio' => $faker->sentence(500),
                                'username' => $faker->sentence(21),
                                'phone_number' => $faker->sentence(21)
                            ],
                            'status' => 422,
                            'expected' => [
                                'bio' => 'The bio field must not be greater than 500 characters.',
                                'username' => 'The username field must not be greater than 20 characters.',
                                'phone_number' => 'The phone number field must not be greater than 20 characters.'
                            ]
                        ],
                    'check_attributes_has_null_value_return_no_error' =>
                        [
                            'input' => [
                                'bio' => null,
                                'github_repo_url' => null,
                                'date_of_birth' => null,
                                'street' => null,
                                'state' => null,
                                'website' => null,
                                'zip_code' => null,
                                'x-url' => null,
                                'instagram_url' => null

                            ],
                            'status' => 200,
                            'expected' => [

                            ]
                        ],
                    'check_attributes_has_string_validation_return_error' =>
                        [
                            'input' => [
                                'first_name' => $faker->randomNumber(),
                                'last_name' => $faker->randomNumber(),
                                'password' => $faker->randomNumber(8),
                                'street' => $faker->randomNumber(),
                                'state' => $faker->randomNumber(),
                                'zip_code' => $faker->randomNumber()
                            ],
                            'status' => 422,
                            'expected' => [
                                'first_name' => 'The first name field must be a string.',
                                'last_name' => 'The last name field must be a string.',
                                'password' => 'The password field must be a string.',
                                'street' => 'The street field must be a string.',
                                'state' => 'The state field must be a string.',
                                'zip_code' => 'The zip code field must be a string.'
                            ]
                        ],
                    'check_email_attribute_is_not_email_return_error' =>
                        [
                            'input' => [
                                'email' => 'minaremon@'
                            ],
                            'status' => 422,
                            'expected' => [
                                'email' => 'The email field must be a valid email address.'

                            ]
                        ],
                    'check_email_and_username_is_not_unique_return_error' =>
                        [
                            'user' => [
                                'first_name' => 'mina',
                                'last_name' => 'shaker',
                                'email' => 'minaremonshaker@gmail.com',
                                'username' => 'mina200888',
                                'password' => 'Hecaro1986@',
                                'locked' => false

                            ],
                            'input' => [
                                'email' => 'minaremonshaker@gmail.com',
                                'username' => 'mina200888'
                            ],
                            'status' => 422,
                            'expected' => [
                                'email' => 'The email has already been taken.',
                                'username' => 'The username has already been taken.'
                            ]
                        ],
                    'check_attribute_min_width_validation_return_error' =>
                        [
                            'input' => [
                                'username' => 'min',
                                'password' => 'Heca'
                            ]  ,
                            'status' => 422,
                            'expected' => [
                                'username' => 'The username field must be at least 5 characters.',
                                'password' => 'The password field must be at least 8 characters.'
                            ]
                        ],
                    'check_attribute_has_date_validation_return_error' =>
                        [
                            'input' => [
                                'date_of_birth' => '17/12/1986'
                            ],
                            'status' => 422,
                            'expected' => [
                                'date_of_birth' => 'The date of birth field must be a valid date.'
                            ]
                        ]    ,
                    'check_attribute_url_validation_return_error' =>
                        [
                            'input' => [
                                'github_repo_url' => 'localhost.com',
                                'website' => 'localhost.com',
                                'x-url' => 'localhost.com',
                                'instagram_url' => 'localhost.com'
                            ],
                            'status' => 422,
                            'expected' => [
                                'github_repo_url' => 'The github repo url field must be a valid URL.',
                                'website' => 'The website field must be a valid URL.',
                      /*          'x-url' => 'The x url field must be a valid URL.',*/
                                'instagram_url' => 'The instagram url field must be a valid URL.',
                            ]

                        ]
                ]
            ],
        ];
    }

}
