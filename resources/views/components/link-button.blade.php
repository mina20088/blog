@props([
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

<a  id="social"
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

@if($tooltip)
<div id="social-tool-tip" role="tooltip" class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-xs transition-opacity duration-300 dark:bg-gray-700">
     {{$tooltipContent}}
    <div class="dashboardSocialToolTip-arrow" data-popper-arrow></div>
</div>
@endif

