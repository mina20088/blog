@extends('layouts.app')

@section('title', $user->username)


<div class="xs:relative">
    <div class="xs:absolute xs:w-full xs:max-h-[34rem] xs:top-24 sm:top-28 md:top-28">
        <div class="xs:relative">
            <img class="sm:max-h-80" src="{{  Vite::asset('resources/images/placeholder.jpg')}}" width="100%" alt="placeholder">
            <a class="xs:absolute xs:w-5 xs:h-5 xs:top-3 xs:right-3"><x-svgs.upload class="text-white "/></a>
            <img src="{{ Vite::asset('resources/images/Aron.png') }}" class="xs:absolute xs:w-52 xs:h-52 xs:rounded-full xs:-bottom-12 xs:right-1/2 translate-x-1/2 xs:z-10" alt="aron">
        </div>

        <div class="xs:relative xs:h-64 xs:bg-gray-300 xs:z-0 xs:py-20">
            <div class="grid xs:justify-center gap-5">
                <h1 class="xs:text-center xs:font-bold xs:text-white xs:text-3xl" >Mina Remon Shaker</h1>
                <p class="xs:text-center xs:font-normal">Web Developer</p>
                <a href="#" class="bg-blue-500 xs:inline  xs:px-3 xs:py-3 xs:text-center xs:text-white rounded-lg">Edit Profile</a>
            </div>
        </div>
    </div>
</div>

