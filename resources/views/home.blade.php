@extends('layouts.app')

@section('title', 'Home')


@section('content')
    <main class="flex-1">
        <section class="grid xs:mt-5 xs:px-2">
            <h1 class="text-4xl font-bold">Home</h1>
            <form class="max-w-sm mx-auto" action="{{ route('home') }}">
                <div class="mb-5">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        email</label>
                    <input type="text" id="email"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="name@flowbite.com" name="search" value="{{ request()->query('search') ?? ""  }}"/>
                </div>

                <fieldset>
                    <legend class="sr-only">Search By</legend>

                    @php
                        $emailChecked = request()->query('searchBy')['email'] ?? null;
                        $nameChecked = request()->query('searchBy')['first_name'] ?? null;
                    @endphp

                    <div class="flex items-center mb-4 gap-2">
                        <div class="flex items-center">
                            <input @checked($emailChecked === 'email') id="checkbox-1" type="checkbox"
                                   value="email"
                                   name="searchBy[email]"
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500">
                            <label for="checkbox-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">email</label>
                        </div>
                        <div class="flex items-center">
                            <input @checked($nameChecked === 'first_name')  id="checkbox-1" type="checkbox"
                                   value="first_name" name="searchBy[first_name]"
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500">
                            <label for="checkbox-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">first
                                name</label>
                        </div>


                    </div>
                </fieldset>
                <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    submit
                </button>

            </form>

            @dump($users)
        </section>
    </main>
@endsection



