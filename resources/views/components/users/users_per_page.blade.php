
<div class="grid xs:grid-cols-12 md:grid-cols-3 lg:grid-cols-4 xs:w-full xs:flex-col justify-start  xs:gap-2">
    <div class="grid xs:col-span-12  xs:gap-2">
        <label for="items-per-page">items per page</label>
        <select id="items-per-page" name="per_page"
                class="block w-full xs:py-1 text-sm text-center text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 md:p-2.5">
            <option value="">per page</option>
            <option value="5" @selected(request('per_page') === '5')> 5 per page</option>
            <option value="10" @selected(request('per_page') === '10')>10 per page</option>
            <option value="25" @selected(request('per_page') === '25') >25 per page</option>
            <option value="50" @selected(request('per_page') === '50')>50 per page</option>
        </select>
    </div>
</div>
