@use('App\Enums\DashboardNavigationSideBarItems')

<aside id="logo-sidebar"
       class="xs:fixed  top-0 left-0 xl:sticky xs:w-full md:w-6/12 lg:w-4/12  xl:w-[30rem] xs:z-40  xl:z-0 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 xl:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
       aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        @if(request()->routeIs('/profile'))
            <ul class="space-y-2 font-medium">
                <li>
                    <x-dashboard.cards.user-info-card username="minaremonshaker" job="Web Developer" city="Cairo"
                                                      country="Egypt" member-since="3 weeks ago">
                        Laravel developer specializing in building modern web applications with Laravel and Vite.Experienced in
                        database management, RESTful API development, and UI optimization. Passionate about clean code,
                    </x-dashboard.cards.user-info-card>
                </li>
            </ul>
        @endif

        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('dashboard') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <div class="flex items-center justify-center gap-2">
                        <x-svgs.dashboard class="w-7"/>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <div class="flex items-center justify-center gap-2">
                        <x-svgs.users class="w-7"/>
                        <span>Users</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <div class="flex items-center justify-center gap-2">
                        <x-svgs.posts class="w-7"/>
                        <span>Posts</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <div class="flex items-center justify-center gap-2">
                        <x-svgs.sign-out class="w-7"/>
                        <span>Sign Out</span>
                    </div>
                </a>
            </li>
        </ul>

    </div>
</aside>
