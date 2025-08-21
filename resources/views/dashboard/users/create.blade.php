@extends('layouts.dashboard')


@section('title' , 'create')

@section('content')
    <main>
        <div class="flex xs:justify-between xs:px-20 py-12">
           <h1 class="font-bold text-2xl">Create User</h1>
            <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Create More Details</button>
        </div>
        <div class="xs:px-20">
            <h1></h1>
            <form class="flex flex-col gap-2">
                <div class="flex flex-row items-center gap-1">
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white xs:basis-28 xs:font-bold xs:text-lg ">first name:</label>
                    <input type="text" name="first_name" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full" placeholder="Enter first name"/>
                </div>

                <div class="flex flex-row items-center gap-1">
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white xs:basis-28 xs:font-bold xs:text-lg ">last name:</label>
                    <input type="text" name="last_name" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full" placeholder="Enter last name"/>
                </div>

                <div class="flex flex-row items-center gap-1">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white xs:basis-28 xs:font-bold xs:text-lg ">email:</label>
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full" placeholder="Enter email address"/>
                </div>

                <div class="flex flex-row items-center gap-1">
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white xs:basis-28 xs:font-bold xs:text-lg ">username:</label>
                    <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full" placeholder="Enter username"/>
                </div>

                <div class="flex flex-row items-center gap-1">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white xs:basis-28 xs:font-bold xs:text-lg ">password:</label>
                    <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full" placeholder="Enter password"/>
                </div>
                <div>
                    <div class="flex flex-row items-center gap-1">
                        <label for="date_of_birth" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white xs:basis-28 xs:font-bold xs:text-lg "> Birth:</label>
                        <input type="date" name="date_of_birth" id="date_of_birth" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full" placeholder="Date Of Birth"/>
                    </div>
                </div>

                <div class="flex flex-row justify-end items-center gap-2 xs:mt-5">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">submit</button>

                </div>

            </form>
        </div>

    </main>
@endsection
