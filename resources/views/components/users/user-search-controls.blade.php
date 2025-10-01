@props(['columns'])

<div class="flex xs:flex-col md:flex-row justify-between xs:gap-3">
    <!-- Search input: used to filter users by search term -->
    <input type="text" id="large-input"
           class="block w-full xs:p-1 md:p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500"
           name="search" value="{{ request('search', old('search')) }}" placeholder="search...">


    {{ $slot }}
</div>
