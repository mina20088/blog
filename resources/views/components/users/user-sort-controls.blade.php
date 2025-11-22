
<!-- Order By select: used to sort users by selected column -->
<select
    class="g-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block xs:p-1 md:p-2 "
    name="orderBy">
    <option value="">Order By</option>
    @foreach ($columns as $column)
        <option value="{{ $column }}" @selected(request('orderBy') === $column ?? '')>{{ $column }}
        </option>
    @endforeach
</select>

<!-- Direction select: used to choose sorting direction (ascending/descending) -->
<select
    class="g-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block xs:p-1 md:p-2 "
    name="dir">
    <option value="">Direction</option>
    <option value="asc" @selected(request('dir') === 'acs')>Ascending</option>
    <option value="desc" @selected(request('dir') === 'desc')>Descending</option>
</select>
