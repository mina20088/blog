@props([
    'for' => '',
    'title'
])

<label for="{{ $for }}" {{ $attributes->merge(['class' => 'block text-sm font-medium text-gray-900']) }}>
   {{ $title }}
</label>
