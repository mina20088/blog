<input type="{{ $type }}"
       id="{{ $id }}"
       name="{{$name}}"
       {{ isset($placeholder) ? 'placeholder' . $placeholder : ''}}
       {{  isset($value) ? 'value=' . $value : '' }}
       {{$attributes ->merge(['class' => "block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white text-base focus:ring-blue-500 focus:border-blue-500"])}}

/>
