

@props([
    'value' =>  "",
    'option',
    'expression' => false
])
<option {{ $attributes->merge(['class' => '']) }} value="{{$value}}" @selected($expression) >{{ $option }}</option>
