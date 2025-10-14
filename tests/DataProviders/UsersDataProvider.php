<?php

namespace Tests\DataProviders;

class UsersDataProvider
{
    public static function searchableUsersProvider(): array
    {
        return [
            'search' => [
                'users' => [
                    ['first_name' => 'mina' , 'last_name' => 'shaker', 'email' => 'minakiroollos@gmail.com', 'username' => 'mina20088'],
                    ['first_name' => 'mina' , 'last_name' => 'nader', 'email' => 'minanader@gmail.com', 'username' => 'mina_nader'],
                    ['first_name' => 'george' , 'last_name' => 'wadi', 'email' => 'georget@yahoo.com', 'username' => 'gyr99000'],
                    ['first_name' => 'mina' , 'last_name' => 'adel', 'email' => 'minaadel@gmail.com', 'username' => 'mina_adel'],
                ],
                'term' =>  'mina',
                'searchBy' => [],
                'expected' => [
                    ['first_name' => 'mina' , 'last_name' => 'shaker'],
                    ['first_name' => 'mina' , 'last_name' => 'nader'],
                    ['first_name' => 'mina' , 'last_name' => 'adel']
                ]
            ] ,

        ];

    }

    public static function searchableUsersWithSearchByProvider(): array
    {
          return [
              'search_with_searchBy' => [
                  'users' => [
                      ['first_name' => 'mina' , 'last_name' => 'shaker', 'email' => 'minakiroollos@gmail.com', 'username' => 'mina20088'],
                      ['first_name' => 'mina' , 'last_name' => 'nader', 'email' => 'minanader@yahoo.com', 'username' => 'mina_nader'],
                      ['first_name' => 'george' , 'last_name' => 'wadi', 'email' => 'georget@yahoo.com', 'username' => 'gyr99000'],
                      ['first_name' => 'mina' , 'last_name' => 'adel', 'email' => 'minaadel@gmail.com', 'username' => 'mina_adel'],
                  ],
                  'term' => [
                     'email' => '@yahoo',
                  ],
                  'searchBy' => [
                      'email' => 'email',
                      'username' => 'username'
                  ],
                  'expected' => [
                      'email' => [
                          'minanader@yahoo.com',
                          'georget@yahoo.com'
                      ] ,
                      'users' => []

                  ]
              ]
          ];
    }


    public static function provideAllUsersTableColumns():array
    {
        return [
            'all_columns' => [
                'data' => [],
                'expected' => [  // Just wrap the array directly
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
                ]
            ]
        ];
    }

    public static function selectedUserColumnsProvider():array
    {
        return [
            'all_columns' => [
                'data' => ['email_verified_at', 'created_at', 'updated_at', 'deleted_at', 'remember_token'],
                'expected' => [
                    'id' ,// Just wrap the array directly
                    'first_name',
                    'last_name',
                    'email',
                    'username',
                    'password',
                    'locked',
                ]
            ]
        ];
    }
}
