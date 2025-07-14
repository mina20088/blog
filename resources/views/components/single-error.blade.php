@props([
    'fieldName'
])
@error($fieldName)
   <p class="text-red-700">*{{ $message }}</p><br/>
@enderror
