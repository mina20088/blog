

@extends('layouts.dashboard')

@section('title' , $user->username)


@section('content')
    <section class="xs:mt-16">
        <section class="grid xs:grid-cols-1 xl:grid-cols-5 xl:gap-3 ">
             <x-card class="xl:col-span-2 bg-slate-50">
                 <div class="flex flex-col gap-4 divide-y-2">
                     <div class="xs:flex xs:gap-4 xs:justify-center xs:items-center">
                         <img
                             src="{{ Vite::asset('resources/images/Aron.png') }}"
                             height="300"
                             class="sm:hidden md:grid rounded-lg xs:w-24 xs:h-24 sm:w-48 md:w-72 h-auto"
                             alt="Profile Preview"
                         />
                         <div class="flex xs:flex-col xs:gap-2 xs:justify-center xs:basis-full">
                             <h1 class="text-xl font-bold">{{ $user->username }}</h1>
                             <p class="text-sm font-semibold">{{ $user->email }}</p>
                             <div class="flex xs:gap-2">
                                 <x-link-button class="xs:w-fit xs:p-0 bg-slate-50" :rounded_lg="true" :link="$user->profile->github_repo_url">
                                     <i class="fa-brands fa-github fa-xl text-black"></i>
                                 </x-link-button>
                                 <x-link-button class="xs:w-fit xs:p-0 bg-slate-50" :rounded_lg="true" :link="$user->profile->instagram_url">
                                     <i class="fa-brands fa-instagram fa-xl text-black "></i>
                                 </x-link-button>
                                 <x-link-button class="xs:w-fit xs:p-0 bg-slate-50" :rounded_lg="true" :link="$user->profile->x_url">
                                     <i class="fa-brands fa-x-twitter fa-xl text-black"></i>
                                 </x-link-button>
                             </div>
                         </div>

                     </div>
                     <div class="xs:w-full xs:py-4">
                         <p class="">{{ $user->profile->bio }}</p>
                     </div>
                 </div>
             </x-card>
            <x-card class="xl:col-span-3"></x-card>
        </section>
    </section>

@endsection
