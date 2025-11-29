@use(App\Helpers\DashboardUsersViewHelpers)

@use(Illuminate\Support\Facades\Session)

@extends('layouts.dashboard')

@section('title')
    Users
@endsection

@section('content')

    <div class="xs:mt-16"   x-data="{ show: $persist(false)}">
        @if ($users->count() > 0 || DashboardUsersViewHelpers::requestHasActiveFilters())

           @if(Session::has('success'))
               <x-alert type="success" :message="Session::get('success')"/>
           @endif

            <div class="flex xs:flex-col md:flex-col sm:justify-between xs:my-4 sm:mt-24 sm:mb-4 xs:gap-3">
                <div class='flex xs:flex-col xs:gap-3 sm:flex-row  sm:justify-between sm:basis-full sm:items-center'>
                    <h1 class="font-bold text-2xl sm:basis-40">Users</h1>

                    <div class="flex gap-3 xs:justify-between sm:items-center sm:basis-80">

                        <button x-on:click.prevent="show =! show"
                                class="flex gap-1 border-1 xs:px-4 xs:py-1 xs:basis-1/2 rounded-lg items-center justify-center ">

                            <span class="xs:basis-3 text-center">
                                <x-svgs.filter class="xs:w-3 xs:text-center"/>
                            </span>

                            <span class="xs:basis-full text-center xs:font-semibold">Filters/Search</span>

                        </button>

                        <a href="{{ route('dashboard.users.create') }}"
                           class="bg-blue-600 text-white xs:px-4 xs:py-1 xs:basis-1/2 rounded-lg text-center ">Create</a>
                    </div>
                </div>
            </div>

        @else

            <div class="flex justify-between xs:items-center xs:my-9">

                <h1 class="font-bold text-2xl">Users</h1>

                <a href="{{ route('dashboard.users.create') }}"
                   class="bg-blue-600 text-white xs:px-4 xs:py-4 basis-28 rounded-lg text-center ">Create</a>

            </div>

        @endif

        <x-users.user-filters-box :users="$users" >

            <x-users.user-search-controls :columns="$columns">
                <x-users.user-sort-controls :columns="$columns" />
            </x-users.user-search-controls>

            <x-users.user-search-by :columns="$columns"/>

            <x-users.user-filters/>

            <x-users.users_per_page/>

            <div class="flex xs:w-full">

                <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none xs:w-full md:w-28">
                    Apply
                </button>

                @if(DashboardUsersViewHelpers::requestHasActiveFilters())

                    <a href="{{ route('dashboard.users.reset-filters') }}"
                       class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">
                        Reset
                    </a>

                @endif
            </div>

        </x-users.user-filters-box>

    </div>



    <div class="relative overflow-x-auto mt-4">

        <x-users.user-table :users="$users"/>

    </div>

    <div class="flex flex-col">

       {{-- TODO:  will be uncomminted when the finish users filters new updat in the UsersService --}}

       {{-- {{ $users->links() }}--}}

    </div>



@endsection
