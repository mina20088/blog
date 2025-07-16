@extends('layouts.app')

@section('title', $user->username)

@section('content')
    <main class="flex-1">
        <section class="flex xs:flex-col lg:flex-row xs:px-3 xs:py-3 h-auto overflow-hidden lg:gap-16">
            <aside class="lg:basis-1/3 xs:basis-full">
                <section class="flex flex-col xs:rounded-2xl bg-gray-50 xs:my-6 divide-y divide-gray-700">
                    <header class="flex xs:gap-4 xs:py-3 xs:px-6">
                        <img src="{{ Vite::asset('resources/images/Aron.png') }}" class="xs:h-[100px] xs:w-[100px] rounded-2xl">
                        <div class="flex flex-col justify-center">
                            <h3 class="font-bold text-xl">minaremonshaker</h3>
                            <p>Web Developer</p>
                        </div>
                    </header>
                    <article class="grid grid-flow-col text-sm xs:py-3 xs:px-6">
                        <p>Laravel developer specializing in building modern web applications with Laravel and Vite. Experienced in database management, RESTful API development, and UI optimization. Passionate about clean code,</p>
                    </article>
                    <section class="grid xs:py-6 xs:gap-2 xs:px-6">
                        <div class="grid grid-cols-2 justify-around ">
                            <span class="flex items-center gap-2">
                                <x-svgs.pin class="w-8"/> Location
                            </span>
                            <p class="text-end">Egypt ,Cairo</p>
                        </div>
                        <div class="grid grid-cols-2 justify-around">
                            <span class="flex items-center gap-2">
                                <x-svgs.time class="w-7"/> Member Since
                            </span>
                            <p class="text-end">3 weeks ago</p>
                        </div>
                    </section>
                    <section class="flex justify-center xs:py-3 xs:px-6">
                        <x-buttons.link-button-gradiant-blue class="xs:w-full xl:w-1/2 xs:px-12" href="#" content="Edit Profile" :rounded_lg="true"/>
                    </section>
                </section>
            </aside>
            <section class="">
            </section>
        </section>
    </main>

@endsection




