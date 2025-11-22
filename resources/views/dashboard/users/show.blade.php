@extends('layouts.dashboard')

@section('title' , $user->username)


@section('content')
    <section class="grid xs:mt-16 grid-cols-12 xl:gap-3">
        <aside class="xs:col-span-12 xl:col-span-3 xl:sticky xl:h-fit">
            <x-card class="bg-slate-50 h-fit  xl:py-3 xl:px-3">
                <div class="flex flex-col gap-4 divide-y-2">
                    <div class="xs:flex xs:gap-4 xs:justify-center xs:items-center">
                        <img
                            src="{{\Illuminate\Support\Facades\Storage::url($user->upload->path)}}"
                            height="300"
                            class="grid rounded-lg xs:w-24 xs:h-24 sm:w-48 md:w-32 h-auto"
                            alt="Profile Preview"
                        />
                        <div class="flex xs:flex-col xs:gap-2 xs:justify-center xs:basis-full">
                            <h1 class="text-xl font-bold">{{ $user->username }}</h1>
                            <p class="text-sm font-semibold">{{ $user->email }}</p>
                            <div class="flex xs:gap-2">
                                @if($user->profile->github_repo_url)
                                    <x-link-button id="gitHub" class="social xs:w-fit xs:p-0 bg-slate-50"
                                                   :tooltip="true" :tooltip-content="$user->profile->github_repo_url"
                                                   :rounded_lg="true" :link="$user->profile->github_repo_url">
                                        <i class="fa-brands fa-github fa-xl text-black"></i>
                                    </x-link-button>
                                    <x-tooltip id="social-tool-gitHub" class="tool"
                                               :tooltip-content="$user->profile->github_repo_url"/>
                                @endif
                                @if($user->profile->instagram_url)
                                    <x-link-button id="instagram" class=" social xs:w-fit xs:p-0 bg-slate-50"
                                                   :rounded_lg="true" :link="$user->profile->instagram_url">
                                        <i class="fa-brands fa-instagram fa-xl text-black "></i>
                                    </x-link-button>

                                    <x-tooltip id="social-tool-instagram" class="tool"
                                               :tooltip-content="$user->profile->instagram_url"/>
                                @endif
                                @if($user->profile->x_url)
                                    <x-link-button id="x" class="social xs:w-fit xs:p-0 bg-slate-50" :rounded_lg="true"
                                                   :link="$user->profile->x_url">
                                        <i class="fa-brands fa-x-twitter fa-xl text-black"></i>
                                    </x-link-button>

                                    <x-tooltip id="social-tool-twitter" class="tool"
                                               :tooltip-content="$user->profile->x_url"/>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="xs:w-full xs:py-4">
                        <p class="">{{ $user->profile->bio }}</p>
                    </div>
                    <div class="flex flex-col gap-4 py-4 ">
                        <div class="flex justify-between font-semibold text-justify">
                            <p>Location</p>
                            <p>{{ $user->profile->country }}, {{ $user->profile->state }}</p>
                        </div>
                        <div class="flex justify-between font-semibold text-justify">
                            <p> Member Since</p>
                            <p>{{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</p>
                        </div>
                    </div>
                    <div class="flex justify-center items-center xs:py-4">
                        <x-link-button class="flex justify-center items-center gap-2 bg-gray-800 xs:w-full xl:w-fit"
                                       :rounded_xl="true">
                            <x-svgs.marker class="w-5 text-white"/>
                            <span>Edit Profile</span>
                        </x-link-button>
                    </div>
                </div>
            </x-card>
        </aside>
        <section class="xs:col-span-12 xl:grid xl:grid-flow-row xl:col-span-9 xl:h-screen xl:overflow-x-scroll scroll-smooth ">
            <x-card class="bg-white">
                <h1 class="text-3xl font-bold ">Personal Information</h1>
                <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-lg border border-default">
                    <table class="table-fixed w-full text-sm text-left rtl:text-right text-body">
                        <tr class="bg-neutral-primary border-b border-default table-auto ">
                            <td class="py-4 px-4 font-bold xl:w-1/12">
                                <h1>First Name:</h1>
                            </td>
                            <td class="py-4 xl:w-2/12">
                                <p>{{ $user->first_name }}</p>
                            </td>
                        </tr>
                        <tr class="bg-neutral-primary border-b border-default">
                            <td class="py-4 px-4 font-bold">
                                <h1>Last Name:</h1>
                            </td>
                            <td class="py-4">
                                <p>{{ $user->last_name }}</p>
                            </td>
                        </tr>
                        <tr class="bg-neutral-primary border-b border-default" x-data="{ update: false , hasError: @json(session('errors')) }">
                            <td class="py-4 px-4 font-bold xl:w-fit">
                                <h1>username:</h1>
                            </td>
                            <td  class="py-4 w-fit">
                                <div class="flex items-center gap-5">
                                    <div class="">
                                        <template x-if="!update && !hasError">
                                            <p>{{ $user->username }}</p>
                                        </template>
                                        <template x-if="update || hasError">
                                            <form  method="post" action="{{ route('dashboard.users.username.update' , ['user' => $user]) }}" class="m-0">
                                                @method('PATCH')
                                                @csrf
                                                <div class="flex gap-3">
                                                    <x-input id="username" type="text" name="username" value="{{ $user->username }}"/>
                                                    <x-button type="submit" class="bg-black text-white" :rounded_xl="true" content="update"/>
                                                </div>

                                            </form>
                                        </template>
                                    </div>
                                </div>

                            </td>
                            <td class="py-4">
                                <x-button @click="update = !update" class="bg-yellow-300 text-white" :rounded_xl="true" content="edit"/>
                                <x-single-error field-name="username" :message="$errors"  />
                            </td>
                        </tr>
                        <tr class="bg-neutral-primary border-b border-default" x-data="{ update: false , hasError: @json(session('errors')) }">
                            <td class="px-4 py-4 font-bold xl:w-2/12">
                                <h1>email:</h1>
                            </td>
                            <td class="py-4">
                                <div class="flex items-center gap-5">
                                    <div class="">
                                        <template x-if="!update && !hasError">
                                            <p>{{ $user->email }}</p>
                                        </template>
                                        <template x-if="update || hasError">
                                            <form  method="post" action="{{ route('dashboard.users.username.update' , ['user' => $user]) }}" class="m-0">
                                                @method('PATCH')
                                                @csrf
                                                <div class="flex gap-3">
                                                    <x-input id="email" type="text" name="email" value="{{ $user->email }}"/>
                                                    <x-button type="submit" class="bg-black text-white" :rounded_xl="true" content="update"/>
                                                </div>
                                            </form>
                                        </template>
                                    </div>

                                </div>

                            </td>
                            <td class="py-4">
                                <x-button @click="update = !update" class="bg-yellow-300 text-white" :rounded_xl="true" content="edit"/>
                                <x-single-error field-name="username" :message="$errors"  />
                            </td>
                        </tr>
                    </table>
                </div>


            </x-card>
            <x-card class="bg-white">



            </x-card>
        </section>



    </section>

@endsection
