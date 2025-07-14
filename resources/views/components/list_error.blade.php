<section {{ $attributes->class(['grid','gap-2', 'mt-10']) }} class="grid-rows-{{ count($errors)  }}">

    @isset($errors)
        @foreach($errors->all() as $error)

            <p class="text-red-700">*{{ $error }}</p>

        @endforeach

    @endisset

</section>
