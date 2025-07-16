
<div {{ $attributes }}>
    @if($errors->has('rate-limiter'))
        @foreach($errors->all() as $error)
            <x-alert class="xs:text-sm" :message="$error" type="danger"/>
        @endforeach
    @endif
</div>
