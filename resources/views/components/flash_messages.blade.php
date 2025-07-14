@if(session()->has('success'))
    <section class="mt-10">
        <x-alert type="success" :message="session('success')"/>
    </section>
@endif

@if(session()->has('failed'))
    <section class="mt-10">
        <x-alert type="danger" :message="session('failed')"/>
    </section>
@endif
