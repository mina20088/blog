
<x-card>
    <section class="font-bold text-xl">
        <h1>Social Information</h1>
    </section>

    <section class="grid xs:grid-cols-1 md:grid-cols-2 md:gap-3">
        <section>
            <x-label for="x" content="X"/>
            <x-input type="url" name="x" id="x" placeholder="X" :value="old('x')"/>
            <x-single-error field-name="x"/>
        </section>

        <section>
            <x-label for="website" content="Website"/>
            <x-input type="url" name="website" id="website" placeholder="website" :value="old('website')"/>
            <x-single-error field-name="website"/>
        </section>
    </section>
    <section class="grid xs:grid-cols-1 md:grid-cols-2 md:gap-3">
        <section>
            <x-label for="instagram" content="Instagram"/>
            <x-input type="url" name="instagram" id="instagram" placeholder="instagram" :value="old('instagram')"/>
            <x-single-error field-name="instagram"/>
        </section>

        <section>
            <x-label for="facebook" content="Facebook"/>
            <x-input type="url" name="facebook" id="facebook" placeholder="facebook" :value="old('facebook')"/>
            <x-single-error field-name="facebook"/>
        </section>
    </section>

</x-card>
