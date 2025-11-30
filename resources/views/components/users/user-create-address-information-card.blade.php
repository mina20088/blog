<x-card class="bg-white">
    <section class="font-bold text-xl">
        <h1>Address Information</h1>
    </section>

    <section class="grid grid-cols-1">
        <x-label for="street" content="Street"/>
        <x-input type="text" id="street" name="street" placeholder="Street" :value="old('street')"/>
        <x-single-error field-name="street"/>
    </section>

    <section class="grid xs:grid-cols-1 md:grid-cols-2 md:gap-3" x-data="{
        countries: CountryCityUtils.getAllCountries(),
        cities: $persist([]),
        country:'',
        city:$persist('')
    }"

    >
        <section>
            <x-label for="country" content="Country"/>
            <select
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700"
                x-model="country" @change="cities = window.CountryCityUtils.getCities(country)" name="country">
                <option value="">Please Choose Country</option>
                <template x-for="country in countries" :key="country">
                    <option :value="country" x-text="country"
                            :selected='@json(old('country'), JSON_THROW_ON_ERROR) === country'></option>
                </template>
            </select>
            <x-single-error field-name="country"/>

        </section>
        <section>
            <x-label for="city" content="City"/>
            <select name="city"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700">

                <option value="">Please Select A City</option>
                <template x-for="city in cities" :key="city" x-model="city">
                    <option :value="city" x-text="city" :selected='@json(old('city'), JSON_THROW_ON_ERROR) === city'></option>
                </template>
            </select>
            <x-single-error field-name="city"/>
        </section>
    </section>

    <section class="grid xs:grid-cols-1 md:grid-cols-2 md:gap-3">
        <section>
            <x-label for="state" content="State"/>
            <x-input type="text" id="state" name="state" placeholder="State" :value="old('state')"/>
            <x-single-error field-name="state"/>
        </section>
        <section>
            <x-label for="zip-code" content="zipCode"/>
            <x-input type="text" id="zip-code" name="zip_code" placeholder="Zip Code" :value="old('zip_code')"/>
            <x-single-error field-name="zip_code"/>
        </section>
    </section>
</x-card>
