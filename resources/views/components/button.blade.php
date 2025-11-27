@props([
    'type' => 'button',
    'content' => 'Button',
    'rounded_sm' => false,
    'rounded_md' => false,
    'rounded_lg' => false,
    'rounded_xl' => false,
])

<button type="{{ $type }}" {{ $attributes->merge(['class' => 'py-3 px-4 text-center font-base bg-gray-200 text-black'])->class(['rounded-sm' => $rounded_sm, 'rounded-lg' => $rounded_lg , 'rounded-md' => $rounded_md , 'rounded_xl' => $rounded_xl]) }}>
    {{ $content }}
</button>
