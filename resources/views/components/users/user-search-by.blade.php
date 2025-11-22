@props(['columns'])


<div class="flex xs:flex-col  xs:justify-start md:justify-between xs:gap-3 lg:flex-row md:items-center">

    <div class="flex flex-col justify-center items-start xs:basis-full xs:order-1 md:order-1 xs:gap-2">
        <label>search By</label>
        <div class="flex flex-col xs:justify-end md:flex-row md:flex-wrap items-start xs:gap-3 md:gap-2">
            @foreach ($columns as $column)
                <div class="flex items-center">
                    <input id="{{ $column }}" type="checkbox" value="{{ $column }}" name="searchBy[]"
                           @checked(in_array($column, request('searchBy') ?? [], true))
                           class="w-4 h-4 text-blue-600 bg-gra y-100 border-gray-300 rounded-sm focus:ring-blue-500">
                    <label for="checkbox-1" class="ms-2 text-sm font-medium text-gray-900">{{ $column }}</label>
                </div>
            @endforeach
        </div>
    </div>




</div>
