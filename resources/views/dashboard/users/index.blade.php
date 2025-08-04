@extends('layouts.dashboard')

@section('title', 'users')


@section('content')
    <h1>Users</h1>
    <div class="relative overflow-x-auto">
        <table id="pagination-table" class="">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 ">
            <tr>
                <th scope="col" class="px-6 py-3">
                   #
                </th>
                <th scope="col" class="px-6 py-3">
                    Full Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Username
                </th>
                <th scope="col" class="px-6 py-3">
                    Active
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{  $user->id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $user->first_name . " " . $user->last_name}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $user->email  }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $user->username  }}
                    </td>
                    <td class="px-6 py-4">
                       {{  $user->locked  ? 'locked' : "unlocked" }}
                    </td>
                    <td class="px-6 py-4">

                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>



@endsection
