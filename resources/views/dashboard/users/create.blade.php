@use (App\Enums\gender);
@use (App\Enums\CountryCity);
@extends('layouts.dashboard')


@section('title' , 'create')

@section('content')
    <div x-data="{show: false , country: '' , countryList: Array.from(window.CountryCityMap.keys()) , cityList: []}" class="my-10">
        <div class="flex xs:justify-between xs:items-center xs:py-8 lg:py-10 lg:px-20 ">
            <h1 class="font-bold xs:text-lg md:text-2xl">Create User</h1>
            <button type="button"
                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 "
                    @click="show = !show">Add More
            </button>
        </div>
        <div class="lg:px-10 xl:px-20">
            <form class="flex flex-col gap-2">
                <div class="flex xs:flex-col xs:gap-3 md:flex-row">
                    <div
                        :class="show ? 'basis-1/2' : 'basis-full'"
                        class="flex bg-green-100 rounded-lg xs:flex-col xs:gap-2 md:gap-4 xs:py-3 xs:px-3 lg:py-10 lg:px-10 transition-all duration-700 ease-in-out"
                        x-transition:enter="transition ease-out duration-700 transform"
                        x-transition:enter-start="translate-x-0 scale-100 "
                        x-transition:enter-end="-translate-x-4 scale-95"
                    >
                        {{-- First Name Input: Required field for user's first name, maximum 255 characters --}}
                        <div class="flex xs:flex-col md:flex-row md:items-center gap-1">
                            <label for="first_name"
                                   class="block text-sm font-medium text-gray-900 md:basis-28 xs:font-bold xs:text-lg">first
                                name:</label>
                            <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full"
                                   placeholder="Enter first name"/>
                        </div>

                        {{-- Last Name Input: Required field for user's last name, maximum 255 characters --}}
                        <div class="flex xs:flex-col md:flex-row md:items-center gap-1">
                            <label for="last_name"
                                   class="block text-sm font-medium text-gray-900 md:basis-28 xs:font-bold xs:text-lg">last
                                name:</label>
                            <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full"
                                   placeholder="Enter last name"/>
                        </div>

                        {{-- Email Input: Required field for user's email address, must be unique and valid email format --}}
                        <div class="flex xs:flex-col md:flex-row md:items-center gap-1">
                            <label for="email"
                                   class="block text-sm font-medium text-gray-900 md:basis-28 xs:font-bold xs:text-lg">email:</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full"
                                   placeholder="Enter email address"/>
                        </div>

                        {{-- Username Input: Required field for user's unique username, alphanumeric characters only --}}
                        <div class="flex xs:flex-col md:flex-row md:items-center gap-1">
                            <label for="username"
                                   class="block text-sm font-medium text-gray-900 md:basis-28 xs:font-bold xs:text-lg">username:</label>
                            <input type="text" name="username" id="username" value="{{ old('username') }}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full"
                                   placeholder="Enter username"/>
                        </div>

                        {{-- Password Input: Required field for user's password, minimum 8 characters with mix of letters, numbers, and symbols --}}
                        <div class="flex xs:flex-col md:flex-row md:items-center gap-1">
                            <label for="password"
                                   class="block text-sm font-medium text-gray-900 md:basis-28 xs:font-bold xs:text-lg">password:</label>
                            <input type="password" name="password" id="password"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full"
                                   placeholder="Enter password"/>
                        </div>
                    </div>
                    <div
                        x-show="show"
                        class=" flex bg-blue-50 rounded-lg lg:py-10 xs:flex-col xs:gap-2  md:gap-4 xs:py-3 xs:px-3 lg:px-10 basis-1/2"
                        x-transition:enter="transition ease-out duration-700 transform"
                        x-transition:enter-start="translate-x-full"
                        x-transition:enter-end="translate-x-0 "
                        x-transition:leave="transition ease-in duration-300 transform"
                        x-transition:leave-start="translate-x-0 "
                        x-transition:leave-end="translate-x-full"
                    >
                        {{-- Birth Date Input: Optional field for user's date of birth, must be a valid date --}}
                        <div class="flex xs:flex-col md:flex-row md:items-center gap-1">
                            <label for="date_of_birth"
                                   class="block text-sm font-medium text-gray-900 md:basis-28 xs:font-bold xs:text-lg">birth-date:</label>
                            <input type="date" name="date_of_birth" id="date_of_birth"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full"
                                   placeholder="Date Of Birth"/>
                        </div>

                        {{-- Gender Input: Optional radio selection for user's gender preference --}}
                        <div class="flex items-center gap-3">
                            <div class="flex xs:flex-col">
                                <label for="date_of_birth"
                                       class="block text-sm font-medium text-gray-900 md:basis-28 xs:font-bold xs:text-lg">gender:</label>
                                @foreach(gender::cases() as $gender)
                                    <div class="flex flex-row items-center ">
                                        <input id="{{$gender->name}}" type="radio" name="gender" value="{{ $gender->value }}"
                                               class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300">
                                        <label for="{{ $gender->name }}"
                                               class="block ms-2  text-sm font-medium text-gray-900">
                                            {{ $gender->name }}
                                        </label>
                                    </div>

                                @endforeach
                            </div>

                        </div>

                        {{-- Phone Number Input: Optional field for user's contact number --}}
                        <div class="flex xs:flex-col md:flex-row md:items-center gap-1">
                            <label for="phone_number"
                                   class="block text-sm font-medium text-gray-900 md:basis-28 xs:font-bold xs:text-lg">phone:</label>
                            <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') }}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full"
                                   placeholder="phone"/>
                        </div>

                        {{-- Country Selection: Required dropdown for user's country, dynamically populated --}}
                        <div class="flex xs:flex-col md:flex-row md:items-center gap-1">
                            <label for="countries"
                                   class="block text-sm font-medium text-gray-900 md:basis-28 xs:font-bold xs:text-lg">country:</label>
                            <select id="countries"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    name="country" x-model="country" @change="cityList = window.CountryCityUtils.getCities(country)">
                                <option :value="-1">Select Country</option>
                                <template x-for="country in countryList" :key="country">
                                    <option :value="{{ old('country') }}" x-text="country" ></option>
                                </template>
                            </select>
                        </div>
                        {{-- City Selection: Required dropdown that depends on selected country --}}
                        <template x-if="country != '' && country != -1">
                            <div class="flex xs:flex-col md:flex-row md:items-center gap-1">
                                <label for="city"
                                       class="block text-sm font-medium text-gray-900 md:basis-28 xs:font-bold xs:text-lg">city:</label>
                                <select id="city"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        name="country" x-model="city">
                                    <option>select city</option>
                                    <template x-for="city in cityList" :key="city">
                                        <option :value="{{ old('city') }}" x-text="city"></option>
                                    </template>
                                </select>
                            </div>
                        </template>
                    </div>
                </div>
                <div
                    x-show="show"
                    x-transition:enter="transition ease-out duration-1000"
                    x-transition:enter-start="transform translate-y-[1200px] scale-75 opacity-70"
                    x-transition:enter-end="transform translate-y-0 scale-100 opacity-100"
                    x-transition:leave="transition ease-in duration-1000"
                    x-transition:leave-start="transform translate-y-0 scale-100 opacity-100"
                    x-transition:leave-end="transform translate-y-[1200px] scale-75 opacity-0"
                    class="flex bg-blue-50 rounded-lg lg:py-10 xs:flex-col xs:gap-2  md:gap-4 xs:py-3 xs:px-3 lg:px-10 basis-1/2">
                    {{-- Street Address Input: Optional field for user's street address details --}}
                    <div class="flex xs:flex-col md:flex-row md:items-center gap-4">
                        <label for="street"
                               class="block text-sm font-medium text-gray-900 xs:font-bold xs:text-lg md:basis-[5.5rem]">street:</label>
                        <input type="text" name="street" id="street" value="{{ old('street') }}"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full"
                               placeholder="street"/>
                    </div>

                    <div class="flex xs:flex-col md:flex-row md:items-center gap-3 xs:w-full">
                        {{-- State/Province Input: Optional field for user's state or province --}}
                        <div class="flex xs:flex-col md:flex-row items-center xs:basis-full">
                            <label for="state"
                                   class="block text-sm font-medium text-gray-900 xs:font-bold xs:text-lg md:basis-28">state:</label>
                            <input type="text" name="state" id="state" value="{{ old('state') }}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full"
                                   placeholder="state"/>
                        </div>
                        {{-- Zip/Postal Code Input: Optional field for user's postal code --}}
                        <div class="flex xs:flex-col md:flex-row items-center xs:basis-full">
                            <label for="zipCode"
                                   class="block text-sm font-medium text-gray-900 xs:font-bold xs:text-lg md:basis-28">zipCode:</label>
                            <input type="text" name="zipCode" id="zipCode" value="{{ old('zipCode') }}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full"
                                   placeholder="zipCode"/>
                        </div>

                    </div>
                </div>
                <div class="flex flex-row justify-end items-center gap-2 xs:mt-5">
                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">
                        submit
                    </button>
                </div>

            </form>
        </div>

    </div>
@endsection
