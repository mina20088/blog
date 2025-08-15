<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="min-h-screen flex flex-col">
    <!-- Header -->
    <header class="xs:grid md:flex items-center justify-center bg-zinc-900 xs:grid-cols-2 md:grid-flow-col xs:px-2 xs:py-2 md:py-2.5 xl:px-16">
        <!-- Logo -->
        <a class="text-white" href="{{ route('home') }}">
            <x-svgs.logo class="xs:w-32" />
        </a>

        <!-- Navigation -->
        <x-nvigation.navigation class="hidden md:grid items-center h-full basis-full">
            <x-nvigation.navigation_items />
        </x-nvigation.navigation>

        <!-- Login/Register Buttons (Desktop Only) -->
        <div class="xs:hidden md:grid md:col-span-1 justify-end items-center">
            <div class="grid grid-flow-col gap-4 justify-end xs:w-fit">
                <x-buttons.link-button-gradiant-blue class="md:w-24" link="{{ route('login') }}" content="Login" :rounded_lg="true" :text_white="true" />
                <x-buttons.link-button-gradiant-orange class="md:w-24" content="Register" link="{{ route('register') }}" :rounded_lg="true" :text_white="true" />
            </div>
        </div>

        <!-- Mobile auth Dropdown & Hamburger -->
        <div class="xs:justify-end xs:gap-2 md:hidden h-full grid grid-flow-col items-center md:justify-center">
            <div>
                <div class="relative" x-data="{ show: false }">

                    <!-- Button: Login/Register -->
                    <x-buttons.button
                        @click="show = !show"
                        content="Login/Register"
                        :rounded_lg="true"
                        class="bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl xs:py-2"
                    />

                    <!-- Dropdown Menu -->
                    <div class="fixed z-10 top-20 xs:w-48 xs:right-3 sm:w-52 sm:right-4 h-fit p-4 bg-white rounded-lg shadow-lg transform origin-top transition-all duration-300 ease-out"
                         x-show="show"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 scale-y-50"
                         x-transition:enter-end="opacity-100 scale-y-100"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 scale-y-100"
                         x-transition:leave-end="opacity-0 scale-y-50"
                         @click.outside="show = false">
                        <div class="grid grid-flow-row gap-3">

                            <!-- Login Link -->
                            <x-buttons.link-button-gradiant-blue class="xs:text-sm md:text-xl xs:px-5 xs:py-2.5 md:px-8 md:py-4" content="Login" href="{{ route('login') }}" :rounded_lg="true" />

                            <!-- Register Link -->
                            <x-buttons.link-button-gradiant-orange class="xs:text-sm md:text-xl xs:px-5 xs:py-2.5 md:px-8 md:py-4" href="{{ route('register') }}" content="Register" :rounded_lg="true" />
                        </div>
                    </div>
                </div>
            </div>

            <a href="#" id="sidebar-button">
                <x-svgs.menu-hamburger class="text-white w-6" />
            </a>
        </div>

        <!-- Sidebar -->
        <x-sidebar.sidebar />

    </header>

    @yield('content')


    <footer class="flex xs:flex-row lg:flex-col bg-zinc-900 h-60 sticky">

    </footer>
</body>
</html>
