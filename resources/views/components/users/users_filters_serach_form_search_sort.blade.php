@props(['columns'])

<div class="flex xs:flex-col md:flex-row justify-between xs:gap-3">
    <input type="text" id="large-input"
        class="block w-full xs:p-1 md:p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500"
        name="search" value="{{ request('search', old('search')) }}" value = "" placeholder="search...">
    <select
        class="g-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block xs:p-1 md:p-2.5 "
        name="orderBy">
        <option value="">Order By</option>
        @foreach ($columns as $column)
            <option value="{{ $column }}" @selected(request('orderBy') === $column ?? '')>{{ $column }}
            </option>
        @endforeach
    </select>
    <select
        class="g-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block xs:p-1 md:p-2.5 "
        name="dir">
        <option value="">Diriction</option>
        <option value="asc" @selected(request('dir') === 'acs')>Ascending</option>
        <option value="desc" @selected(request('dir') === 'desc')>Descending</option>
    </select>
</div>
