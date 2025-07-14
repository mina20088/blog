

@props([
    'name',
    'value',
    'expression'
])
<input {{ $attributes->merge(['class' => 'w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2'])}} type="radio" value="{{ $value }}" name="{{ $name }}" @checked($expression) >

