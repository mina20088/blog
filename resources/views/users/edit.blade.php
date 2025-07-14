@use('Illuminate\Support\Str')
@extends('layouts.app')

@section('title' , $title)


@section('content')
    <div class="grid xs:grid-col-1 xs:h-fit xs:items-center lg:grid-rows-1 lg:grid-cols-2 xs:py-28">
        <div>
            <x-svgs.edit/>
        </div>
        <div class="grid grid-flow-row gap-3">

            @if(session()->has('success'))
                <x-alert type="success" class="w-full" :message="session('success')"/>
            @endif

            @if($errors->has('rate-limiter'))
                <div>
                  <x-alert type="danger" class="w-full" :message="$errors->first('rate-limiter')"/>
                </div>
            @endif

            <h1 class="xs:text-center xs:font-bold xs:text-3xl lg:text-6xl lg:text-start">{{Str::ucfirst($user->username) }} Edit</h1>
            <p class="xs:text-center xs:font-semibold xs:text-sm lg:text-3xl lg:text-start text-gray-500">Do Your Job And Edit...</p>
            <form class="grid grid-flow-row gap-8" method="post" action="{{ route('user.update', ['username' => $user->username]) }}">
                @csrf
                @method('PUT')

                <div class="grid xs:grid-cols-1 md:grid-cols-2 gap-3">
                    <div class="">
                        <x-form.label for="name" title="name"/>
                        <x-form.text-input name="name" class="h-14" placeholder="name" value="{{ $user->name }}"/>
                        <x-single-error field-name="name"/>
                    </div >
                    <div class="">
                        <x-form.label for="email" title="email"/>
                        <x-form.text-input name="email" class="h-14" placeholder="email" value="{{ $user->email }}"/>
                        <x-single-error field-name="email"/>
                    </div>
                </div>
                <div class="grid grid-col-1">
                    <div class="">
                        <x-form.label for="username" title="username"/>
                        <x-form.text-input name="username" class="h-14" placeholder="username" value="{{ $user->username }}"  autocomplete="username"/>
                        <x-single-error field-name="username"/>
                    </div >
                </div>

                <div class="grid grid-flow-col gap-6">
                    <button type="submit" class="bg-blue-500 text-white p-6">Update</button>
                    <a  href="{{ route('user.index')}}" class="bg-red-500 text-white p-6 text-center">back</a>
                </div>

            </form>
        </div>

    </div>
@endsection
