@props([
    'name',
    'multiple_select' => false

])
<select
    {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5']) }}
    name="{{$name}}"
    {{ $multiple_select ? 'multiple' : '' }}
>
   {{ $slot }}
</select>
