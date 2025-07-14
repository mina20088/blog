
@extends('layouts.app')

@section('title', 'login')

@section('content')
    <section class="flex flex-col gap-6 items-center justify-center min-h-screen h-fit">

        <figure class="mt-5 flex justify-center">
           <img src="{{ Vite::asset('resources/images/logo.png') }}" width="100">
        </figure>

        <section class="flex flex-col gap-5 xs:px-8">
            <x-rate-limiter-error/>

            <div class="flex flex-col gap-4">
                <h1 class="xs:text-2xl xs:leading-4 xs:font-bold">Welcome back!</h1>
                <p class="text-gray-500">Please log in to your account below.</p>
            </div>

            <form class="grid gap-5" action="/login" method="post">
                @csrf
                <x-form.input-feild-wrapper>
                    <x-form.label for="email" title="email"  class="mb-2"/>
                    <x-form.text-input id="email"  name="email" value="{{old('email')}}" placeholder="email"/>
                    <x-single-error field-name="email"/>
                </x-form.input-feild-wrapper>
                <x-form.input-feild-wrapper>
                    <x-form.label for="password" title="password"  class="mb-2"/>
                    <x-form.password-input id="password" name="password" value="{{ old('password') }}" placeholder="password" />
                    <x-single-error field-name="password"/>
                </x-form.input-feild-wrapper>
                <x-form.input-feild-wrapper class="flex justify-between gap-3 mb-4">
                    <div class='flex flex-row items-center gap-x-1'>
                        <x-form.hidden-feild name="remember" value="0"/>
                        <x-form.checkbox-feild id="remember" name="remember" value="1" :expression="old('remember')" />
                        <x-form.label for="remember" class="mb-0" title="remember"/>
                    </div>

                    <a class="text-blue-500" href="#">Forget Password?</a>
                </x-form.input-feild-wrapper>

                <div class="mb-6 flex gap-3">
                    <x-buttons.button type="submit"  class="bg-green-600 hover:bg-green-200 xs:w-full xs:py-2 xs:basis-1/2" :rounded_lg="true" content="login"/>
                    <x-buttons.link-button class="bg-red-600 xs:basis-1/2" content="back" :text_white="true" :rounded_lg="true"  href="{{ route('home') }}"/>
                </div>
            </form>
        </section>
    </section>
@endsection


