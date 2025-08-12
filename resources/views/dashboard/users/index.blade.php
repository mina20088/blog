@extends('layouts.dashboard')

@section('title', 'users')


@section('content')
    <div x-data="{ show: $persist(false) }">
        <div class="flex justify-between items-center my-4 sm:my-9 ">
            <h1 class="font-bold text-2xl">Users</h1>
            <button x-on:click.prevent="show =! show" class="flex gap-1 border border-1 xs:px-4 xs:py-4 rounded-lg items-center">
                <span><x-svgs.filter class="w-4"/></span>
                <span>Filters/Search</span>
            </button>
        </div>

        <div
               class="border bg-gray-200 xs:py-3 xs:px-3 lg:py-5 lg:px-5 rounded-lg"
               x-show="show"
               x-transition:enter="transition ease-out duration-500"
               x-transition:enter-start="opacity-20 -translate-y-20"
               x-transition:enter-end="opacity-100 translate-y-0"
               x-transition:leave="transition ease-in duration-300"
               x-transition:leave-start="opacity-100 translate-y-0"
               x-transition:leave-end="opacity-20 -translate-y-20"
        >
            <form class="flex flex-col xs:gap-3 m-0" method="GET" action="{{ route('dashboard.users') }}">
                <div class="flex xs:flex-col md:flex-row justify-between xs:gap-3">
                    <input type="text" id="large-input"
                           class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500"
                           name="search" value="{{ request()->query('search') ?? '' }}" placeholder="search...">
                    <select
                        class="g-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 "
                        name="sortBy">
                        <option value="-1" @selected(request('sortBy') === "-1")>Sort By</option>
                        @foreach($columns as $column)
                            <option value="{{ $column }}" @selected(request('sortBy') === $column)>{{ $column }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex xs:justify-start  md:justify-center">

                    <div class="flex xs:flex-col xs:justify-start md:flex-row md:flex-wrap  items-start mb-4 gap-2">

                        @php
                            $checked = $selectedSearchBy = request()->query('searchBy', []);
                        @endphp
                        @foreach($columns as $column)

                            <div class="flex items-center">
                                <input
                                    id="{{ $column }}" type="checkbox"
                                    value="{{ $column }}"
                                    name="searchBy[]"
                                    @checked(in_array($column, $selectedSearchBy, true))
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500">
                                <label for="checkbox-1"
                                       class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $column }}</label>
                            </div>

                        @endforeach
                    </div>
                </div>
                <div class="">
                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Apply
                    </button>
                </div>
            </form>
        </div>
    </div>



    <div class="relative overflow-x-auto mt-4">

        <table id="users-table" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded-xl">
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

@endsection
