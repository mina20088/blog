@use('Illuminate\Support')
@extends('layouts.app')

@section('title', 'users')

@section('content')
    <main class="flex-1">
        <section class="relative grid gap-10 mt-24 xs:px-3">
            <h1 class="text-4xl font-bold">users</h1>

            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        @foreach ($columns as $column)
                            <th scope="col" class="px-6 py-3">
                                {{ $column }}
                            </th>
                        @endforeach
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (count($users) !== 0)
                        @foreach ($users as $user)
                            <tr class="odd:bg-white  even:bg-gray-50 border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $user->id }}
                                </th>
                                <td class="px-6 py-4">
                                    <span class='text-nowrap'>
                                        {{ $user->name }}
                                    </span>

                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class='text-nowrap'>
                                        {{ $user->created_at }}
                                    </span>

                                </td>
                                <td class="px-6 py-4">
                                     <span class='text-nowrap'>
                                        {{ $user->updated_at }}
                                     </span>

                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-2">
                                        <a href="{{ route('user.show', ['username' => $user->username]) }}"
                                           class="font-medium text-blue-600 dark:text-blue-500 hover:underline">show</a>
                                        <a href="{{ route('user.edit', ['username' => $user->username]) }}"
                                           class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    </div>

                                </td>
                            </tr>
                        @endforeach

                    @endif

                    </tbody>
                </table>
            </div>

        </section>
    </main>
@endsection
