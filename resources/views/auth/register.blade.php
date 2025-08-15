@extends('layouts.app')

@section('title', 'register')

@section('content')
    <main class="flex-1">
        <section class="grid xs:grid-cols-1 md:grid-cols-1 lg:grid-cols-2 xs:gap-2 md:gap-10 xs:mt-0 lg:my-24">
            <figure class="flex justify-center xs:mt-3 xl:pl-16">
                <img src="{{ Vite::asset('resources/images/signup.png') }}" alt="signup"
                    class="w-full lg:aspect-video xl:aspect-auto">
            </figure>

            <section class="flex xs:flex-col justify-center gap-6 xs:mt-3 xs:px-3 xl:pr-16">
                <x-rate-limiter-error />

                <div class="flex flex-col gap-4">
                    <h1 class="xs:text-2xl xs:leading-4 xs:font-bold">
                        Welcome!
                    </h1>
                    <p>
                        Please fill out the form below to create your account.
                    </p>
                </div>

                <x-flash_messages />

                <form action="/register" method="post">
                    @csrf
                    <div class="grid xs:grid-cols-1 md:grid-cols-2 md:gap-2">
                        <div class="mt-4">
                            <label for="first_name" class="block text-sm font-medium text-gray-900 mb-1">
                                first name
                            </label>
                            <input type="text" name="firstName" placeholder="first name" value="{{ old('firstName') }}" id="first_name"
                                class="block w-full p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm font-medium rounded-lg focus:ring-blue-500 focus:border-blue-500" />
                            <x-single-error field-name="firstName" />
                        </div>
                        <div class="mt-4">
                            <label for="last_name" class="block text-sm font-medium text-gray-900 mb-1">
                                last name
                            </label>
                            <input type="text" name="lastName" placeholder="last name" value="{{ old('lastName') }}" id="last_name"
                                class="block w-full p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm font-medium rounded-lg focus:ring-blue-500 focus:border-blue-500" />
                            <x-single-error field-name="lastName" />
                        </div>
                    </div>

                    <div class="grid xs:grid-cols-1 md:grid-cols-2 md:gap-2">
                        <div class="mt-4">
                            <label for="username" class="block text-sm font-medium text-gray-900 mb-1">
                                username
                            </label>
                            <input type="text" name="username" placeholder="username" value="{{ old('username') }}" id="username"
                                class="block w-full p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm font-medium rounded-lg focus:ring-blue-500 focus:border-blue-500" />
                            <x-single-error field-name="username" />
                        </div>
                        <div class="mt-4">
                            <label for="email" class="block text-sm font-medium text-gray-900 mb-1">
                                email
                            </label>
                            <input type="text" name="email" placeholder="email" value="{{ old('email') }}" id="email"
                                class="block w-full p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm font-medium rounded-lg focus:ring-blue-500 focus:border-blue-500" />
                            <x-single-error field-name="email" />
                        </div>
                    </div>

                    <div class="grid xs:py-3 gap-2">
                        <label for="password" class="block text-sm font-medium text-gray-900">
                            password
                        </label>
                        <input type="password" name="password" placeholder="password" value="" id="password"
                            class="block w-full p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm font-medium rounded-lg focus:ring-blue-500 focus:border-blue-500" />
                        <x-single-error field-name="password" />
                    </div>

                    <div class="grid xs:py-3 gap-2">
                        <label for="confirm-password" class="block text-sm font-medium text-gray-900">
                            confirm password
                        </label>
                        <input type="password" name="confirmPassword" placeholder="confirm password" value="" id="confirm-password"
                            class="block w-full p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm font-medium rounded-lg focus:ring-blue-500 focus:border-blue-500" />
                        <x-single-error field-name="confirmPassword" />
                    </div>

                    <div class="xs:py-3 flex gap-3">
                        <x-buttons.button type="submit" class="bg-blue-700 hover:bg-blue-800 xs:basis-48"
                            content="Register" :rounded_lg="true" />
                        <x-buttons.link-button type="submit" class="bg-red-600 hover:bg-red-800 xs:basis-48"
                            href="{{ route('home') }}" content="Back" :rounded_lg="true" />
                    </div>
                </form>
            </section>
        </section>
    </main>
@endsection
