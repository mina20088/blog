@extends('layouts.dashboard')


@section('title' , 'create')

@section('content')
    <div x-data="{show: false}" class="my-10">
        <div class="flex xs:justify-between xs:items-center xs:py-8 lg:py-10 lg:px-20 ">
           <h1 class="font-bold xs:text-lg md:text-2xl">Create User</h1>
            <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 " @click="show = !show">Add More</button>
        </div>
        <div class="lg:px-10 xl:px-20">
            <form class="flex flex-col gap-2">
                <div class="flex xs:flex-col xs:gap-3 md:flex-row">
                    <div
                        :class="show ? 'basis-1/2' : 'basis-full'"
                        class="flex bg-green-100 rounded-lg xs:flex-col xs:gap-2 md:gap-4 xs:py-3 xs:px-3 lg:py-10 lg:px-10 transition-all duration-700 ease-in-out"
                        x-transition:enter="transition ease-out duration-700 transform"
                        x-transition:enter-start="translate-x-0 scale-100 opacity-100"
                        x-transition:enter-end="-translate-x-4 scale-95 opacity-90"
                    >
                        <div class="flex xs:flex-col md:flex-row md:items-center gap-1">
                            <label for="first_name" class="block text-sm font-medium text-gray-900 dark:text-white md:basis-28 xs:font-bold xs:text-lg ">first name:</label>
                            <input type="text" name="first_name" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full" placeholder="Enter first name"/>
                        </div>

                        <div class="flex xs:flex-col md:flex-row md:items-center gap-1">
                            <label for="last_name" class="block text-sm font-medium text-gray-900 dark:text-white md:basis-28 xs:font-bold xs:text-lg ">last name:</label>
                            <input type="text" name="last_name" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full" placeholder="Enter last name"/>
                        </div>

                        <div class="flex xs:flex-col md:flex-row md:items-center gap-1">
                            <label for="email" class="block text-sm font-medium text-gray-900 dark:text-white md:basis-28 xs:font-bold xs:text-lg ">email:</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full" placeholder="Enter email address"/>
                        </div>

                        <div class="flex xs:flex-col md:flex-row md:items-center gap-1">
                            <label for="username" class="block text-sm font-medium text-gray-900 dark:text-white md:basis-28 xs:font-bold xs:text-lg ">username:</label>
                            <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full" placeholder="Enter username"/>
                        </div>

                        <div class="flex xs:flex-col md:flex-row md:items-center gap-1">
                            <label for="password" class="block text-sm font-medium text-gray-900 dark:text-white md:basis-28 xs:font-bold xs:text-lg ">password:</label>
                            <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full" placeholder="Enter password"/>
                        </div>
                    </div>
                    <div
                        x-show="show"
                        class="bg-blue-50 rounded-lg lg:py-10 xs:flex-col xs:gap-2 md:gap-4 xs:py-3 xs:px-3 lg:px-10 basis-1/2"
                        x-transition:enter="transition ease-out duration-700 transform"
                        x-transition:enter-start="translate-x-full opacity-0"
                        x-transition:enter-end="translate-x-0 opacity-100"
                        x-transition:leave="transition ease-in duration-300 transform"
                        x-transition:leave-start="translate-x-0 opacity-100"
                        x-transition:leave-end="translate-x-full opacity-0"
                    >
                        <div class="flex xs:flex-col md:flex-row md:items-center gap-1">
                            <label for="date_of_birth" class="block text-sm font-medium text-gray-900 dark:text-white md:basis-28 xs:font-bold xs:text-lg ">birth-date:</label>
                            <input type="date" name="date_of_birth" id="date_of_birth" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full" placeholder="Date Of Birth"/>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row justify-end items-center gap-2 xs:mt-5">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">submit</button>
                </div>

            </form>
        </div>

    </div>
@endsection
