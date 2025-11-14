@props([
    'small' => false,
    'large' => false,
    'name'
])


<input
    type="file"
    name="{{$name}}"
    {{ $attributes
    ->merge(['class' => 'cursor-pointer bg-neutral-secondary-medium border border-default-medium text-heading rounded-base focus:ring-brand focus:border-brand block w-full shadow-xs placeholder:text-body'])
    ->class(['text-sm' => $small, 'text-lg' => $large, 'file:py-2' => $large]) }}
    {{ isset($placeholder) ? 'placeholder=' . $placeholder : ''}}
    {{  isset($value) ? 'value=' . $value : '' }}
/>


