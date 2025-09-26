@use(App\Helpers\DashboardUsersViewHelpers)

@props(['users'])

@if($users->count() > 0 | DashboardUsersViewHelpers::requestHas())

    {{-- <div class="flex flex-col">

        {{ $users->links() }}

    </div> --}}

    <table id="users-table" class="w-full text-sm text-left rtl:text-right text-gray-500 rounded-xl">
        <thead class="text-sm text-nowrap text-gray-700 bg-gray-50 ">
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

                <tr class="bg-white border-b text-nowrap border-gray-200">

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
