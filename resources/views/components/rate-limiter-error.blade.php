
<div {{ $attributes }}>
    @if($errors->has('rate-limiter'))
        @foreach($errors->all() as $error)
           <p class="text-red-600">{{ $error }}</p>
        @endforeach
    @endif
</div>
