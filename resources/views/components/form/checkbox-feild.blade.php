
@props([
    'name',
    'value',
    'expression',
])

<input
    type="checkbox"
    name="{{ $name }}"
    @checked($expression)
    value="{{$value}}"
    {{ $attributes->merge(['class'=> 'w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 ']) }}
/>
