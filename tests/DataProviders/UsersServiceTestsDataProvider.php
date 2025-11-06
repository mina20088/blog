<?php

namespace Tests\DataProviders;

use App\Enums\Countries;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Arr;
use Faker\Factory as FakerFactory;

class UsersServiceTestsDataProvider
{



    public static function searchableUsersProvider(): array
    {
        $Egypt = Countries::getCitiesAccoc("Egypt");

        $Ukraine = Countries::getCitiesAccoc("Ukraine");

        $spain = Countries::getCitiesAccoc("Spain");



        $usersToCreate = [
            ['first_name' => 'mina', 'last_name' => 'shaker', 'email' => 'minakiroollos@gmail.com', 'username' => 'mina20088'],
            ['first_name' => 'mina', 'last_name' => 'nader', 'email' => 'minanader@gmail.com', 'username' => 'mina_nader'],
            ['first_name' => 'george', 'last_name' => 'wadi', 'email' => 'georget@yahoo.com', 'username' => 'gyr99000'],
            ['first_name' => 'mina', 'last_name' => 'adel', 'email' => 'minaadel@gmail.com', 'username' => 'mina_adel'],
            ['first_name' => 'hany', 'last_name' => 'shawky', 'email' => 'hero@gmail.com', 'username' => 're_shawky'],
            ['first_name' => 'human', 'last_name' => 'lecter', 'email' => 'hanz@gmail.com', 'username' => 'ssasd899'],
            ['first_name' => 'samer', 'last_name' => 'ahmed', 'email' => 'samer@gmail.com', 'username' => 'sam39384'],
            ['first_name' => 'mina', 'last_name' => 'gamal', 'email' => 'minagamal@gmail.com', 'username' => 'mina_gamal']
        ];

        $profilesToCreate = [
            ["country" => "Egypt", 'city' => Arr::get($Egypt, 'Alexandria') ],
            ["country" => "Egypt", 'city' => Arr::get($Egypt, 'Alexandria')],
            ["country" => "Spain" , "city"=> Arr::get($spain, "Madrid")],
            ["country" => "Ukraine" , "city"=> Arr::get($Ukraine, "Kyiv")],
            ["country" => "Ukraine", 'city' => Arr::get($Ukraine, 'Donetsk')],
            ["country" => "Egypt", 'city' => Arr::get($Egypt, 'Cairo')],
            ["country" => "Egypt", "city"=> Arr::get($Egypt, "Suez")],
            ["country" => "Egypt", 'city' => Arr::get($Egypt, 'Cairo')]
        ];


        return [
            "search" => [
                'searchCriteria' => [
                    'generalSearch' => [
                        'users' => $usersToCreate,
                        'term' => 'mina',
                        'count' => 4,
                        'expected' => ['shaker', 'nader', 'adel', 'gamal'],
                    ],
                    'search_by _first_name_and_email' => [
                        'users' => $usersToCreate,
                        'term' => 'han',
                        'searchBy' => ['first_name', 'email'],
                        'count' => 2,
                        'expected' => ['hany', 'human'],
                    ],
                    'search_by_with_no_results' => [
                        'users' => $usersToCreate,
                        'term' => 'han',
                        'searchBy' => ['last_name', 'username'],
                        'count' => 0,
                        'expected' => [],
                    ],
                    'filter_by_country' => [
                        'users' => $usersToCreate,
                        'profiles' => $profilesToCreate,
                        'filters' => ['country' => 'Ukraine'],
                        'count' => 2,
                        'expected' => ['mina', 'hany'],
                    ],
                        'search_with_country_filter' => [
                        'users' => $usersToCreate,
                        'profiles' => $profilesToCreate,
                        'term' => 'mina',
                        'filters' => ['country' => 'Egypt'],
                        'count' => 3 ,
                        'expected'  => [
                            ['first_name' => 'mina', 'last_name' => 'shaker', 'email' => 'minakiroollos@gmail.com', 'username' => 'mina20088'],
                            ['first_name' => 'mina', 'last_name' => 'nader', 'email' => 'minanader@gmail.com', 'username' => 'mina_nader'],
                            ['first_name' => 'mina', 'last_name' => 'gamal', 'email' => 'minagamal@gmail.com', 'username' => 'mina_gamal']

                        ]
                    ],
                    'search_with_search_by_filterd_by_country' => [
                        'users' => $usersToCreate,
                        'profiles' => $profilesToCreate,
                        'term' => 's',
                        'searchBy' => ['last_name'],
                        'filters' => ['country' => "Egypt"],
                        'count' => 1,
                        'expected' => ['mina20088']

                    ],
                    'filter_by_city' => [
                        'users' => $usersToCreate,
                        'profiles' => $profilesToCreate,
                        'filters' => ['city' => 'Alexandria'],
                        'count' => 2,
                        'expected' => ['shaker', 'nader']
                    ] ,
                    'filter_by_country_and_city' => [
                        'users' => $usersToCreate,
                        'profiles' => $profilesToCreate,
                        'filters' => ['country' => 'Egypt', 'city' => 'Alexandria'],
                        'count' => 2,
                        'expected' => ['shaker', 'nader']

                    ],
                    'search_with_search_by_filterd_by_country_and_city' => [
                        'users' => $usersToCreate,
                        'profiles' => $profilesToCreate,
                        'term' => 'mina',
                        'searchBy' => ['first_name'],
                        'filters' => ['country' => 'Ukraine' , 'city' => 'Kyiv'],
                        'count' => 1,
                        'expected' => ['minaadel@gmail.com']
                    ]

                ]
            ]
        ]   ;
    }

    public static function createNewUserProvider() :array
    {
        $faker = FakerFactory::create();
        $country = $faker->randomElement(Countries::getAllCountries());
        $city = collect(Countries::getCities($country))->random();
        return [
             'create' => [
                 'passedCreation' => [
                     'user' => [
                         'first_name' => $faker->firstName,
                         'last_name' => $faker->lastName,
                         'username' => $faker->userName,
                         'email' => $faker->email,
                         'password' => $faker->password,
                         'locked' => $faker->randomElement([1, 0]),
                     ]   ,
                     'profile' =>  [
                         'date_of_birth' => $faker->dateTime(),
                         'gender' => $faker->randomElement([0, 1]),
                         'phone_number' => $faker->phoneNumber,
                         'country' => $country,
                         'city' => $city

                     ]
                 ]
             ]
        ]   ;
    }

    public static function userColumnsProvider(): array
    {
        return [
            'columns' => [
                'data' => [
                    'all' => '',
                    'ignored' => [
                        'email_verified_at', 'created_at', 'updated_at', 'deleted_at', 'remember_token'
                    ]
                ],
                'expected' => [
                    'all' => [
                        'id',
                        'first_name',
                        'last_name',
                        'email',
                        'email_verified_at',
                        'username',
                        'password',
                        'locked',
                        'remember_token',
                        'created_at',
                        'updated_at',
                        'deleted_at'
                    ]   ,
                    'returned' => [
                        'id',
                        'first_name',
                        'last_name',
                        'email',
                        'username',
                        'password',
                        'locked',
                    ]

                ]
            ]
        ];
    }

}
