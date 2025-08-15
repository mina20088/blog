
@extends('layouts.app')

@section('title', 'login')

@section('content')
    <main class="flex-1">
        <section class="flex flex-col gap-6 items-center justify-center
                        min-h-screen h-fit">

            <figure class="mt-5 flex justify-center">
                <img src="{{ Vite::asset('resources/images/logo.png') }}"
                     width="100"
                     alt="logo">
            </figure>

            <section class="flex flex-col gap-5 xs:px-8">
                <x-rate-limiter-error/>

                <div class="flex flex-col gap-4">
                    <h1 class="font-bold text-2xl leading-4 xs:text-2xl xs:leading-4 xs:font-bold">
                        Welcome back!
                    </h1>
                    <p class="text-gray-500">
                        Please log in to your account below.
                    </p>
                </div>

                <!-- Login Form -->
                <form class="grid gap-5"
                      action="/login"
                      method="post">
                    @csrf

                    <div>
                        <label for="email"
                               class="block text-sm font-medium text-gray-900">
                            email
                        </label>
                        <input type="text"
                               id="email"
                               name="email"
                               placeholder="email"
                               value="{{ old('email') }}"
                               class="block w-full p-2.5 mb-2
                                      text-sm font-medium text-gray-900
                                      bg-gray-50 border border-gray-300 rounded-lg
                                      focus:ring-blue-500 focus:border-blue-500"/>
                        <x-single-error field-name="email"/>
                    </div>

                    <div>
                        <label for="password"
                               class="block text-sm font-medium text-gray-900">
                            password
                        </label>
                        <input type="password"
                               id="password"
                               name="password"
                               placeholder="password"
                               value=""
                               class="block w-full p-2.5 mb-2
                                      text-sm font-medium text-gray-900
                                      bg-gray-50 border border-gray-300 rounded-lg
                                      focus:ring-blue-500 focus:border-blue-500"/>
                        <x-single-error field-name="password"/>
                    </div>

                    <div class="flex justify-between gap-3 mb-4">
                        <div class="flex flex-row items-center gap-x-1">
                            <input type="hidden"
                                   name="remember"
                                   value="0"/>
                            <input id="remember"
                                   type="checkbox"
                                   name="remember"
                                   value="1"
                                   @checked(old('remember') === 1 || old('remember') === 0)
                                   class="w-4 h-4 text-blue-600 bg-gray-100
                                          border-gray-300 rounded-sm focus:ring-2
                                          focus:ring-blue-500 dark:focus:ring-blue-600
                                          dark:ring-offset-gray-800"/>
                            <label for="remember"
                                   class="block mb-0 text-sm font-medium text-gray-900">
                                remember
                            </label>
                        </div>
                    </div>

                    <div class="mb-6 flex gap-3">
                        <x-buttons.button
                            type="submit"
                            class="bg-green-600 hover:bg-green-200
                                   xs:w-full xs:py-2 xs:basis-1/2"
                            :rounded_lg="true"
                            content="login"/>
                        <x-buttons.link-button
                            class="bg-red-600 xs:basis-1/2"
                            content="back"
                            :text_white="true"
                            :rounded_lg="true"
                            href="{{ route('home') }}"/>
                    </div>
                </form>
            </section>
        </section>
    </main>
@endsection


