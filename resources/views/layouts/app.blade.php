<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="min-h-screen flex flex-col">

@section('header')

    <x-header.header class="xs:px-3 xl:px-16">
        <x-header.header_logo/>
        <x-header.header_navigation/>
        <x-header.header_login_register_buttons_desktop/>
        <x-header.header_mobile_login_register_buttons_hamburger>
            <x-slot:authentication_dropdown>
              <x-login_register_menu/>
            </x-slot:authentication_dropdown>
        </x-header.header_mobile_login_register_buttons_hamburger>
        <x-sidebar.sidebar/>
    </x-header.header>
@show

     @yield('content')

<x-footer>

</x-footer>

</body>
</html>
