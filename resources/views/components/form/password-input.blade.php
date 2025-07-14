
@props([
    'type' => 'password',
    'name',
    'value',
    'placeholder' => '',

])

<input
    {{$attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm font-medium rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 '])}}
    type="{{ $type }}"
    name="{{ $name }}"
    placeholder="{{$placeholder}}"
    value="{{ $value }}"
/>
