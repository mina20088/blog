<textarea
    {{$attributes}}
    id="{{$id}}"
    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
    name="{{ $name }}"
    {{ isset($placeholder) ? "placeholder = {$placeholder}" : ''  }}
    {{  isset($value) ? 'value=' . $value : '' }}
    {{ isset($rows)  ? "rows=" . $rows : "1" }}
>

   @if(isset($content))
        {{ $content  }}
    @else
    @endif

</textarea>
