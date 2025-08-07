@extends('layouts.dashboard')

@section('title', 'users')


@section('content')
    <div class="sm:my-9">
        <h1 class="font-bold text-2xl">Users</h1>
    </div>
    <div class="flex flex-col">
        <form class="" method="GET" action="{{ route('dashboard.users') }}">
            <div class="flex justify-between">
                <input type="text" id="large-input"
                       class="block  p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500"
                       name="search" value="{{ request()->query('search') ?? '' }}" placeholder="search...">
                <select
                    class="g-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 "
                    name="sortBy">
                    <option value="id" @selected(request('sortBy') === "id")>Sort By</option>
                    @foreach($columns as $column)
                        <option value="{{ $column }}" @selected(request('sortBy') === $column)>{{ $column }}</option>
                    @endforeach
                </select>
            </div>
            <div class="my-3">
                <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Apply
                </button>
            </div>
        </form>
    </div>

    <div class="relative overflow-x-auto">
        <table id="users-table"
               class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded-xl">
            <thead class="text-xs text-gray-700 bg-gray-50 ">
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
    </div>

@endsection
