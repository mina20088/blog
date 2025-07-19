@props([
    'link' => '',
    'content' => '',
    'rounded_sm' => false,
    'rounded_md' => false,
    'rounded_lg' => false,
    'rounded_xl' => false,
    'text_white' => true
])

<a {{ $attributes->class(['rounded-sm' => $rounded_sm, 'rounded-lg' => $rounded_lg , 'rounded-md' => $rounded_md , '$rounded_xl' => $rounded_xl, 'text-white' => $text_white])->merge(['class' => 'py-3 px-4 text-center font-medium']) }}>
    @if($content !== '')
        {{ $content }}
    @else
        {{ $slot }}
    @endif

</a>
