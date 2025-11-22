@props([
    'id' => '',
    'link' => '',
    'content' => '',
    'rounded_sm' => false,
    'rounded_md' => false,
    'rounded_lg' => false,
    'rounded_xl' => false,
    'text_white' => true,
    'tooltip' => false,
    'tooltipContent' => ''
])

<a  id="{{$id}}"
    {{ $attributes
        ->class(['rounded-sm' => $rounded_sm, 'rounded-lg' => $rounded_lg , 'rounded-md' => $rounded_md , '$rounded_xl' => $rounded_xl, 'text-white' => $text_white])
        ->merge(['class' => 'inline-block py-3 px-4 text-center font-base bg-gray-200 text-black']) }} href="{{$link}}"
>
    @if($content !== '')
        {{ $content }}
    @else
        {{ $slot }}
    @endif

</a>


