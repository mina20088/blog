@use(App\Helpers\DashboardUsersViewHelpers);
@use(Illuminate\Support\Facades\Session)
@extends('layouts.dashboard')
@section('title', 'users')


@section('content')
    <div x-data="{ show: $persist(false) }">
        @if ($users->count() > 0 || DashboardUsersViewHelpers::requestHas())
            <div class="flex xs:flex-col sm:flex-row sm:justify-between sm:items-center my-4 sm:my-9 xs:gap-3">
                <h1 class="font-bold text-2xl">Users</h1>
                <div class="flex gap-3 xs:justify-between sm:items-center">
                    <button x-on:click.prevent="show =! show"
                        class="flex gap-1 border border-1 xs:px-4 xs:py-4 rounded-lg items-center ">
                        <span><x-svgs.filter class="w-4" /></span>
                        <span>Filters/Search</span>
                    </button>
                    <a href="{{ route('dashboard.users.create') }}"
                        class="bg-blue-600 text-white xs:px-4 xs:py-4 basis-28 rounded-lg text-center ">Create</a>
                </div>
            </div>
        @else
            <div class="flex justify-between xs:items-center xs:my-9">
                <h1 class="font-bold text-2xl">Users</h1>
                <a href="{{ route('dashboard.users.create') }}"
                    class="bg-blue-600 text-white xs:px-4 xs:py-4 basis-28 rounded-lg text-center ">Create</a>
            </div>
        @endif

        <x-users.users_filters_serach_form :users="$users">
            <x-users.users_filters_serach_form_search_sort :columns="$columns" />
            <x-users.users_filter_search_form_serach_by :columns="$columns" />
            <x-users.users_filter_search_form_filters />
            <div class="flex xs:w-full">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none xs:w-full md:w-28">
                    Apply
                </button>

                @if (DashboardUsersViewHelpers::requestHas())
                    <a href="{{ route('dashboard.users.reset-filters') }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">
                        Reset
                    </a>
                @endif
            </div>
        </x-users.users_filters_serach_form>

    </div>

    <div class="relative overflow-x-auto mt-4">
        @if($users->count() > 0 | DashboardUsersViewHelpers::requestHas())
            <div class="flex flex-col">
                {{ $users->links() }}
            </div>

            <table id="users-table" class="w-full text-sm text-left rtl:text-right text-gray-500 rounded-xl">
                <thead class="text-xs text-gray-700 bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">

                            <div class="flex items-center gap-2">

                                <a
                                    href="{{ route('dashboard.users', ['sortBy' => 'id', 'dir' => DashboardUsersViewHelpers::sortTogglers(request())]) }}">
                                    <span>#</span>
                                </a>
                                <x-svgs.sort class="w-3" upper-color="#acb0b7" />
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center gap-2">
                                <a
                                    href="{{ route('dashboard.users', ['sortBy' => 'first_name', 'dir' => DashboardUsersViewHelpers::sortTogglers(request())]) }}">
                                    <span>Full Name</span>
                                </a>
                                <x-svgs.sort class="w-3" upper-color="#acb0b7" />
                            </div>

                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center gap-2">
                                <a
                                    href="{{ route('dashboard.users', ['sortBy' => 'email', 'dir' => DashboardUsersViewHelpers::sortTogglers(request())]) }}">
                                    <span>Email</span>
                                </a>
                                <x-svgs.sort class="w-3" upper-color="#acb0b7" />
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center gap-2">
                                <a
                                    href="{{ route('dashboard.users', ['sortBy' => 'username', 'dir' => DashboardUsersViewHelpers::sortTogglers(request())]) }}">
                                    <span>Username</span>
                                </a>
                                <x-svgs.sort class="w-3" upper-color="#acb0b7" />
                            </div>

                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center gap-2">
                                <a
                                    href="{{ route('dashboard.users', ['sortBy', 'locked', 'dir' => DashboardUsersViewHelpers::sortTogglers(request())]) }}">
                                    <span>Active</span>
                                </a>
                                <x-svgs.sort class="w-3" upper-color="#acb0b7" />
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)

                        <tr class="bg-white border-b border-gray-200">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $user->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $user->first_name . ' ' . $user->last_name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->username }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->locked  }}
                            </td>
                            <td class="px-6 py-4">

                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>


        @else
            <div class="flex flex-col items-center justify-center min-h-[60vh] w-full overflow-hidden px-4 py-8">
                <div class="flex flex-col items-center justify-center gap-2 xs:gap-3 max-w-full">
                    <x-svgs.user class="w-24 h-24 xs:w-32 xs:h-32 sm:w-40 sm:h-40 md:w-48 md:h-48 flex-shrink-0" />
                    <h1 class="font-bold text-xl xs:text-2xl sm:text-3xl text-center break-words">No Users Added Yet</h1>
                    <div class="text-slate-400 max-w-xs xs:max-w-sm text-center">
                        <p class="text-xs xs:text-sm leading-relaxed break-words">Users Will Appear here once they are
                            registerd or added by admin</p>
                        <p class="text-xs xs:text-sm leading-relaxed break-words">please Register New User</p>
                    </div>
                </div>
            </div>
        @endif


    </div>

@endsection
