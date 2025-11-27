@props(['type' => 'text', 'id', 'name', 'placeholder' => '', 'value' => ''])

<input type="{{ $type }}"
       id="{{ $id }}"
       name="{{ $name }}"
       placeholder="{{ $placeholder }}"
       value="{{ $value }}"
    {{ $attributes->merge(['class' => 'block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white text-base focus:ring-blue-500 focus:border-blue-500']) }}
/>


