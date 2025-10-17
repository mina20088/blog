<?php

namespace Tests\DataProviders;

class UsersDataProvider
{
    public static function searchableUsersProvider(): array
    {
        return [
            'search' => [
                'data' => [
                    'users' => [
                        ['first_name' => 'mina', 'last_name' => 'shaker', 'email' => 'minakiroollos@gmail.com', 'username' => 'mina20088'],
                        ['first_name' => 'mina', 'last_name' => 'nader', 'email' => 'minanader@gmail.com', 'username' => 'mina_nader'],
                        ['first_name' => 'george', 'last_name' => 'wadi', 'email' => 'georget@yahoo.com', 'username' => 'gyr99000'],
                        ['first_name' => 'mina', 'last_name' => 'adel', 'email' => 'minaadel@gmail.com', 'username' => 'mina_adel'],
                        ['first_name' => 'hany', 'last_name' => 'shawky', 'email' => 'hero@gmail.com', 'username' => 're_shawky'],
                        ['first_name' => 'human', 'last_name' => 'lecter', 'email' => 'hanz@gmail.com', 'username' => 'ssasd899'],
                    ],
                    'profiles' => [
                        ["country" => "Egypt"],
                        ["country" => "Egypt"],
                        ["country" => "Spain"],
                        ["country" => "Ukraine"],
                        ["country" => "Ukraine"],
                        ["country" => "Egypt"]
                    ],

                ],
                'searchCriteria' => [
                    'term' => [
                        'emptyTerm' => '',
                        'term' => 'mina',
                        'noFiltersTerm' => 'mina',
                        'searchByTerm' => 'han'
                    ],
                    'searchBy' => [
                        'noSearchByItems' => [],
                        'searchByFirstNameAndEmail' => ['first_name', 'email'],
                        'multipleSearchByItemsEmptyResults' => ['last_name', 'username']
                    ],
                    'filters' => [
                        'emptyFilters' => null,
                        'countryFilters' => [
                            'country' => 'Ukraine'
                        ]
                    ],
                ]   ,

                'expected' => [
                    'noFiltersResult' => [
                        'users' => [
                            ['first_name' => 'mina', 'last_name' => 'shaker'],
                            ['first_name' => 'mina', 'last_name' => 'nader'],
                            ['first_name' => 'mina', 'last_name' => 'adel'],
                        ] ,
                        'last_names' => [
                            'shaker',
                            'nader',
                            'adel'
                        ]

                    ],
                    'multipleSearchByResults' => [
                        'first_names' => [
                            'hany',
                            'human'
                        ]

                    ],
                    'multipleSearchByItemsEmptyResults' => [],
                    'countryFilterItems' =>  [
                        "users" => [
                            ['first_name' => 'mina', 'last_name' => 'adel', 'email' => 'minaadel@gmail.com', 'username' => 'mina_adel'],
                            ['first_name' => 'hany', 'last_name' => 'shawky', 'email' => 'hero@gmail.com', 'username' => 're_shawky']
                        ]   ,
                        'names' =>[
                            'mina',
                            'hany'
                        ]
                    ],


                ]
            ],
        ];

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
