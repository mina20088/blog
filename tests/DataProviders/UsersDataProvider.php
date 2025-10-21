<?php

namespace Tests\DataProviders;

use App\Enums\Countries;
use Illuminate\Support\Arr;
use Doctrine\Common\Lexer\AbstractLexer;
use Illuminate\Database\Eloquent\Collection;

class UsersDataProvider
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
                        'usersToCreate' => $usersToCreate,
                        'searchTerm' => 'mina',
                        'expectedCount' => 4,
                        'expectedLastNames' => ['shaker', 'nader', 'adel', 'gamal'],
                    ],

                    'search_by _first_name_and_email' => [
                        'usersToCreate' => $usersToCreate,
                        'searchTerm' => 'han',
                        'searchBy' => ['first_name', 'email'],
                        'expectedCount' => 2,
                        'expectedFirstNames' => ['hany', 'human'],
                    ],

                    'search_by_with_no_results' => [
                        'usersToCreate' => $usersToCreate,
                        'searchTerm' => 'han',
                        'searchBy' => ['last_name', 'username'],
                        'expectedCount' => 0,
                        'expectedUsers' => [],
                    ],

                    'filter_by_country' => [
                        'usersToCreate' => $usersToCreate,
                        'profilesToCreate' => $profilesToCreate,
                        'filters' => ['country' => 'Ukraine'],
                        'expectedCount' => 2,
                        'expectedFirstNames' => ['mina', 'hany'],
                    ],
                    'search_with_country_filter' => [
                        'usersToCreate' => $usersToCreate,
                        'profilesToCreate' => $profilesToCreate,
                        'searchTerm' => 'mina',
                        'filters' => ['country' => 'Egypt'],
                        'expectedCount' => 2 ,
                        'expectedUsers'  => [
                            ['first_name' => 'mina', 'last_name' => 'shaker', 'email' => 'minakiroollos@gmail.com', 'username' => 'mina20088'],
                            ['first_name' => 'mina', 'last_name' => 'nader', 'email' => 'minanader@gmail.com', 'username' => 'mina_nader'],
                        ]
                    ],
                    'search_with_search_by_filterd_by_country' => [
                        'usersToCreate' => $usersToCreate,
                        'profilesToCreate' => $profilesToCreate,
                        'searchTerm' => 's',
                        'searchBy' => ['last_name'],
                        'filters' => ['country' => "Egypt"],
                        'expectedCount' => 1,
                        'expectedUsername' => ['mina20088']

                    ],
                    'filter_by_city' => [
                        'usersToCreate' => $usersToCreate,
                        'profilesToCreate' => $profilesToCreate,
                        'filters' => ['city' => 'Alexandria'],
                        'expectedCount' => 2,
                        'expectedLastNames' => ['shaker', 'nader']
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
