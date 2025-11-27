@props([
    'id' => '',
    'tooltipContent',
    'darkGray' => true,
    'indigo'=> false,
    'yellow' => false,
    'green' => false
])

{{--<div id="social-tool-tip" role="tooltip"
     class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-xs transition-opacity duration-300">
    {{$tooltipContent}}
    <div class="dashboardSocialToolTip-arrow" data-popper-arrow></div>
</div>--}}


<div
    {{ $attributes->merge(
    [
        'id' => $id ,
        'class' => 'tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-xs transition-opacity duration-300',
        'role' => "tooltip"
    ])->class([
        'bg-gray-700' => $darkGray,
        'bg-indigo-600' => $indigo,
        'bg-yellow-400' => $yellow,
        'bg-green-500' => $green
])}}
>
    {{$tooltipContent}}
    <div class="dashboardSocialToolTip-arrow" data-popper-arrow></div>
</div>
