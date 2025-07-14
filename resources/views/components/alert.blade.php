
@props([
    'type',
    'message'
])
<div {{ $attributes->class([
     'grid justify-center h-20 bg-green-700 w-full items-center text-white font-bold xs:text-sm',
     'bg-green-700' => $type === 'success',
     'bg-yellow-500' => $type === 'warning',
     'bg-red-600' => $type === 'danger'
    ]) }}>
    {{$message}}
</div>
