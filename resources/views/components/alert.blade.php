
@props([
    'type',
    'message'
])
<div {{ $attributes->class([
     'grid justify-center h-20 xs:w-full bg-green-700 items-center text-white xs:px-5 rounded-lg
',
     'bg-green-700' => $type === 'success',
     'bg-yellow-500' => $type === 'warning',
     'bg-red-600' => $type === 'danger'
    ])->merge(['class' => '']) }}>
    {{$message}}
</div>
