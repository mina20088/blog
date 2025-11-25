@extends('layouts.dashboard')

@section('title' , $user->username)


@section('content')
    {{-- Main content section --}}
    <section class="grid xs:mt-16 grid-cols-12 xl:gap-3">
        {{-- User profile sidebar --}}
        @include('partials.users.dashboard.show.user-profile-sidebar')

        {{-- Personal Information Section --}}
        @include('partials.users.dashboard.show.user-personal-information')

    </section>

@endsection
