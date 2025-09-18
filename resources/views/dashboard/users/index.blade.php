@use(App\Helpers\DashboardUsersViewHelpers);
@use(Illuminate\Support\Facades\Session)
@extends('layouts.dashboard')
@section('title', 'users')


@section('content')
    <div x-data="{ show: $persist(false) }">
        @if (count($users) > 0)
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
        @if (count($users) > 0)
            <div class="border bg-gray-200 xs:py-3 xs:px-3 lg:py-5 lg:px-5 rounded-lg" x-show="show"
                x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-20 -translate-y-20"
                x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-20 -translate-y-20">
                <form class="flex flex-col xs:gap-3 m-0" method="Get" action="{{ route('dashboard.users') }}">
                    <div class="flex xs:flex-col md:flex-row justify-between xs:gap-3">
                        <input type="text" id="large-input"
                            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500"
                            name="search" value="{{ request('search', old('search')) }}" value = ""
                            placeholder="search...">
                        <select
                            class="g-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 "
                            name="orderBy">
                            <option value="">Order By</option>
                            @foreach ($columns as $column)
                                <option value="{{ $column }}" @selected(request('orderBy') === $column ?? '')>{{ $column }}
                                </option>
                            @endforeach
                        </select>
                        <select
                            class="g-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 "
                            name="dir">
                            <option value="">Diriction</option>
                            <option value="asc" @selected(request('dir') === 'acs')>Ascending</option>
                            <option value="desc" @selected(request('dir') === 'desc')>Descending</option>
                        </select>
                    </div>
                    <div class="flex xs:flex-col xs:justify-start xs:gap-3 md:flex-row md:items-center">
                        <div class="flex flex-col justify-center xs:basis-full xs:order-2 md:order-1">
                            <h1>search By</h1>
                            <div
                                class="flex xs:flex-col xs:justify-start md:flex-row md:flex-wrap items-start md:jus gap-2 md:py-2.5">
                                @foreach ($columns as $column)
                                    <div class="flex items-center">
                                        <input id="{{ $column }}" type="checkbox" value="{{ $column }}"
                                            name="searchBy[]" @checked(in_array($column, request('searchBy') ?? []))
                                            class="w-4 h-4 text-blue-600 bg-gra y-100 border-gray-300 rounded-sm focus:ring-blue-500">
                                        <label for="checkbox-1"
                                            class="ms-2 text-sm font-medium text-gray-900">{{ $column }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="flex xs:flex-col xs:order-1 md:order-2">
                            <h1 class='xs:basis-full'>filter By</h1>
                            <select
                                class="g-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 xs:basis-full "
                                name="dir">
                                <option value="">Diriction</option>
                                <option value="asc" @selected(request('dir') === 'acs')>Ascending</option>
                                <option value="desc" @selected(request('dir') === 'desc')>Descending</option>
                            </select>
                        </div>
                    </div>

                    <div class="xs:w-full">
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
                </form>
            </div>
        @endif
    </div>



    <div class="relative overflow-x-auto mt-4">
        @if (count($users) > 0)
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
                                {{ $user->locked ? 'locked' : 'unlocked' }}
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
