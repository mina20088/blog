@use(App\Helpers\DashboardUsersViewHelpers)
@props(['users'])


@if (count($users) > 0 || DashboardUsersViewHelpers::requestHas())
    <div class="border bg-gray-200 xs:py-3 xs:px-3 lg:py-5 lg:px-5 rounded-lg" x-show="show"
        x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-20 -translate-y-20"
        x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-20 -translate-y-20">
        <form class="flex flex-col xs:gap-3 m-0" method="Get" action="{{ route('dashboard.users') }}">
            {{ $slot }}
        </form>
    </div>
@endif
