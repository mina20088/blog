<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @vite(['resources/js/dashboard.js', 'resources/css/app.css'])
</head>
<body>

<x-dashboard.navigation>
    <x-dashboard.sidebar.sidebar-button>
        <x-svgs.sidebar-hamburger/>
    </x-dashboard.sidebar.sidebar-button>
    <x-dashboard.logo>
        <x-svgs.logo class="w-32 text-black"/>
    </x-dashboard.logo>
    <x-slot name="userMenu">
        <div class="flex items-center ms-3">
            <div>
                <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user" data-dropdown-placement="bottom"  data-dropdown-offset-skidding="-70" data-dropdown-offset-distance="8">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                </button>
            </div>
            <div class="z-50 hidden  my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-sm shadow-xl dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
                <div class="px-4 py-3" role="none">
                    <p class="text-sm text-gray-900 dark:text-white" role="none">
                        Neil Sims
                    </p>
                    <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                        neil.sims@flowbite.com
                    </p>
                </div>
                <ul class="py-1" role="none">
                    <li>
                        <a href="{{route('home')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Home</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Profile</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Sign out</a>
                    </li>
                </ul>
            </div>
        </div>
    </x-slot>
</x-dashboard.navigation>



<main class="flex">
    <x-dashboard.sidebar.sidebar/>
    <section class="p-4 lg:w-full">
        @yield('content')
    </section>
</main>




</body>
</html>
