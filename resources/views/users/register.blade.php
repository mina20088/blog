
@extends('layouts.app')

@section('title', 'register')

@section('content')
    <main class="flex-1">
        <section class="grid xs:grid-cols-1 md:grid-cols-1 lg:grid-cols-2 xs:gap-2 md:gap-10 xs:mt-0 lg:my-24">

            <figure  class="xs:mt-3 flex justify-center xl:pl-16">
                <img src="{{ Vite::asset('resources/images/signup.png') }}" alt="signup" class="w-full lg:aspect-video xl:aspect-auto">
            </figure>

            <section class="flex gap-6 xs:flex-col justify-center xs:mt-3 xs:px-3 xl:pr-16">

                <x-rate-limiter-error />

                <div  class="flex flex-col gap-4">
                    <h1 class="xs:text-2xl xs:leading-4 xs:font-bold">Welcome!</h1>
                    <p>Please fill out the form below to create your account.</p>
                </div>



                <x-flash_messages/>

                <form action="/register" method="post">
                    @csrf

                    <x-form.input-feild-wrapper class="xs:py-3 grid xs:grid-cols-1 xs:gap-y-2  lg:grid-cols-2 lg:gap-3">
                        <div class="grid gap-2">
                            <x-form.label for="first_name" title="first name"/>
                            <x-form.text-input id="first_name" name="firstName" value="{{ old('firstName') }}"
                                               placeholder="first name"/>
                            <x-single-error field-name="firstName"/>
                        </div>
                        <div class="grid gap-2">
                            <x-form.label for="last_name" title="last name"/>
                            <x-form.text-input id="last_name" name="lastName" value="{{ old('lastName') }}"
                                               placeholder="last name"/>
                            <x-single-error field-name="lastName"/>
                        </div>
                    </x-form.input-feild-wrapper>

                    <x-form.input-feild-wrapper class="grid xs:grid-cols-1 xs:gap-y-2 lg:grid-cols-2 lg:gap-3">
                        <div class="grid gap-2">
                            <x-form.label for="username" title="username"/>
                            <x-form.text-input id="username" name="username" :value="old('username')" placeholder="username"/>
                            <x-single-error field-name="username"/>
                        </div>
                        <div class="grid gap-2">
                            <x-form.label for="email" title="email"/>
                            <x-form.text-input id="email" name="email" value="{{ old('email') }}" placeholder="email"/>
                            <x-single-error field-name="email"/>
                        </div>

                    </x-form.input-feild-wrapper>

                    <x-form.input-feild-wrapper class="grid xs:py-3 gap-2">
                        <x-form.label for="password" title="password"/>
                        <x-form.text-input type="password" id="password" name="password" placeholder="password" value=""/>
                        <x-single-error field-name="password"/>
                    </x-form.input-feild-wrapper>

                    <x-form.input-feild-wrapper class="grid xs:py-3 gap-2">
                        <x-form.label for="confirm-password" title="confirm-password"/>
                        <x-form.text-input type="password" id="confirm-password" name="confirmPassword" placeholder="confirm-password" value=""/>
                        <x-single-error field-name="confirmPassword"/>
                    </x-form.input-feild-wrapper>

                    <x-form.input-feild-wrapper class="xs:py-3 flex gap-3">
                        <x-buttons.button type="submit" class="bg-blue-700 hover:bg-blue-800 xs:basis-48" content="Register" :rounded_lg="true"/>
                        <x-buttons.link-button type="submit" class="bg-red-600 hover:bg-red-800 xs:basis-48" href="{{route('home')}}" content="Back" :rounded_lg="true"/>
                    </x-form.input-feild-wrapper>


                </form>

            </section>
        </section>
    </main>
@endsection
