@use (App\Enums\Gender);
@use (App\Enums\CountryCity);
@extends('layouts.dashboard')


@section('title', 'create')

@section('content')
    @ds(session()->has('errors'))
    {{-- Header Section --}}
    <section class="my-10">
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


            </form>
        </section>
        <section/>

@endsection

