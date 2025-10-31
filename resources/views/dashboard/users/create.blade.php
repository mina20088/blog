@use (App\Enums\Gender);
@use (App\Enums\CountryCity);
@extends('layouts.dashboard')


@section('title', 'create')

@section('content')
    {{-- Header Section --}}
    <section class="my-10">
        {{-- Page Header with Add More Button --}}
        <section class="flex xs:justify-between xs:items-center xs:py-8 lg:py-10">

            <h1 class="font-bold xs:text-lg md:text-2xl">Create User</h1>

        </section>

        {{-- Main Form Content --}}
        <section >

            <form
                class="flex flex-col gap-3" method="post" action="{{ route('dashboard.users.store') }}"  enctype="multipart/form-data">

                @csrf

                {{-- Personal Information Card --}}

                <x-users.user-create-personal-information-card/>

                {{-- User Account Information --}}

                <x-users.user-create-account-information-card/>

                {{-- User Adderess Information --}}

                <x-users.user-create-address-information-card/>

                {{-- User Social Information --}}

                <x-users.user-create-social-information-card/>


                <section class="grid justify-end grid-col-2">

                    <section class="col-span-1">
                        <x-button type="submit" class="!bg-blue-600 text-white font-bold" :rounded_lg="true" content="Submit" />
                        <x-link-button :link="route('dashboard.users')" class="font-bold !bg-red-600 " :rounded_lg="true" :text_white="true" content="Cancel" />
                    </section>

                </section>
            </form>
        </section>
        <section/>

@endsection

