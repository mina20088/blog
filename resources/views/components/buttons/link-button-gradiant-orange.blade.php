@props([
    'link' => '',
    'content' => 'Button',
    'rounded_sm' => false,
    'rounded_md' => false,
    'rounded_lg' => false,
    'rounded_xl' => false,
    'text_white' => true
])

<a {{ $attributes->class(['rounded-sm' => $rounded_sm, 'rounded-lg' => $rounded_lg , 'rounded-md' => $rounded_md , '$rounded_xl' => $rounded_xl , 'text-white' => $text_white])->merge(['class' => 'bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:outline-none focus:ring-4 focus:ring-pink-200 dark:focus:ring-pink-800 py-3 px-4 text-center font-medium']) }})>
    {{ $content }}
</a>
