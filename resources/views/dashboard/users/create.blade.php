@use (App\Enums\Gender);
@use (App\Enums\CountryCity);
@extends('layouts.dashboard')


@section('title', 'create')

@section('content')
    @ds(session()->has('errors'))
    {{-- Header Section --}}
    <section x-data="{
        show: @js(session()->has('errors'), JSON_THROW_ON_ERROR) ,countries: CountryCityUtils.getAllCountries(),cities : [],country:''}" class="my-10">
        {{-- Page Header with Add More Button --}}
        <section class="flex xs:justify-between xs:items-center xs:py-8 lg:py-10">

            <h1 class="font-bold xs:text-lg md:text-2xl">Create User</h1>

            <x-button
                @click="show = !show"
                class="bg-green-700 hover:bg-green-800 text-white font-bold"
                :rounded_lg="true" content="Add More"
            />

        </section>

        {{-- Main Form Content --}}
        <section class="">

            <form class="flex flex-col gap-3" method="post" action="{{ route('dashboard.users.store') }}"
                  enctype="multipart/form-data">

                @csrf

                <x-card>

                    <section class="flex xs:flex-col md:flex-row gap-3 items-center w-full">

                        {{-- Profile Picture Upload --}}

                        <img
                            src="{{ Vite::asset('resources/images/Aron.png') }}"
                            height="300"
                            class="rounded-lg xs:w-80 sm:w-48 md:w-72 h-auto"
                            alt="Profile Preview"
                        />

                        <section class="w-full grid items-start gap-2">

                            <section class="font-bold text-xl">
                                <h1>Personal Information</h1>
                            </section>

                            <section class="grid xs:grid-cols-1 md:grid-cols-2 md:gap-3">
                                <div>
                                    <x-label for="first_name" content="First Name"/>
                                    <x-input type="text" id="first_name" name="first_name" placeholder="First Name" />
                                </div>
                                <div>
                                    <x-label for="last_name" content="Last Name"/>
                                    <x-input type="last_name" id="last_name" name="last_name" placeholder="Last Name" />
                                </div>
                            </section>

                            <x-label for="profile_image" content="Upload picture"/>
                            <x-input type="file" id="profile_image" class="p-0" name="profile_picture"/>
                            <x-single-error fieldName="profile_picture"/>

                            <x-label for="bio" content="Bio"/>
                            <x-text-area id="bio" :rows="9" name="bio" placeholder="Add Bio..."/>
                            <x-single-error fieldName="bio"/>

                            <x-label for="git_hub_link" content="Git Hub"/>
                            <x-input id="git_hub_link" type="text" name="github_repo_url" placeholder="add github link"/>
                            <x-single-error fieldName="github_repo_url"/>

                        </section>

                    </section>

                </x-card>

                <x-card>
                    <section class="font-bold text-xl">
                        <h1>User Account Information</h1>
                    </section>

                    <section class="grid xs:grid-cols-1 md:grid-cols-2 md:gap-3">
                        <div>
                            <x-label for="email" content="Email"/>
                            <x-input type="text" id="email" name="email" placeholder="Email" />
                        </div>
                        <div>
                            <x-label for="username" content="Username"/>
                            <x-input type="text" id="username" name="username" placeholder="Username" />
                        </div>
                    </section>
                    <section class="grid xs:grid-cols-1 md:grid-cols-2 md:gap-3">
                        <div class="xs:col-span-2">
                            <x-label for="password" content="Password"/>
                            <x-input type="password" id="password" name="password" placeholder="Password" />
                        </div>
                    </section>

                </x-card>

            </form>
        </section>
    <section/>

@endsection
