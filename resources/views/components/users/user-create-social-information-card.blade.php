
<x-card>
    <section class="font-bold text-xl">
        <h1>Social Information</h1>
    </section>

    <section class="grid xs:grid-cols-1 md:grid-cols-2 md:gap-3">
        <section>
            <x-label for="x" content="X"/>
            <x-input type="text" name="x" id="x" placeholder="X" />
            <x-single-error field-name="x"/>
        </section>

        <section>
            <x-label for="website" content="Website"/>
            <x-input type="text" name="website" id="website" placeholder="website" />
            <x-single-error field-name="website"/>
        </section>
    </section>
    <section class="grid xs:grid-cols-1 md:grid-cols-2 md:gap-3">
        <section>
            <x-label for="instagram" content="Instagram"/>
            <x-input type="instagram" name="instagram" id="instagram" placeholder="instagram" />
            <x-single-error field-name="instagram"/>
        </section>

        <section>
            <x-label for="facebook" content="Facebook"/>
            <x-input type="text" name="facebook" id="facebook" placeholder="facebook" />
            <x-single-error field-name="facebook"/>
        </section>
    </section>

</x-card>
