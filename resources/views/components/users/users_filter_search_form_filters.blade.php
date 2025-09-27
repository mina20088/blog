@use(App\Enums\UserAccountStatus)
@use(App\Enums\Gender)
<section class="flex flex-col gap-3">
    <label>Filter By:</label>
    <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 ">

        <!-- Country filter: filters users by country -->
        <div class="w-full md:col-span-3 lg:col-span-1">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">Country</label>
            <select id="countries"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  xs:p-1 md:p-2.5 ">
                <option selected>Choose a Filter</option>
            </select>
        </div>

        <!-- City filter: filters users by city -->
        <div class="w-full">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">City</label>
            <select id="countries"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full   xs:p-1 md:p-2.5">
                <option selected>Choose a Filter</option>
            </select>
        </div>

        <!-- Gender filter: filters users by gender -->
        <div class="w-full">
            <label for="gender" class="block mb-2 text-sm font-medium text-gray-900">Gender</label>
            <select id="gender" name="filters[gender]"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full xs:p-1 md:p-2.5">
                <option value="" @selected(request("filterd.gender") === "")>Choose a Filter</option>
                @foreach (Gender::cases() as $gender)
                    <option value='{{ $gender->value }}' @selected((request('filters.gender', "") === (string) $gender->value) )>{{ $gender->name }}</option>
                @endforeach
                <option value="NULL" @selected((request('filters.gender', "") === (string) $gender->value) )>N/A</option>
            </select>
        </div>

        <!-- Status filter: filters users by account status (locked/unlocked/etc) -->
        <div class="w-full">
            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">status</label>
            <select id="status" name="filters[locked]"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full xs:p-1 md:p-2.5">
                <option value="" @selected(request('filters.locked') === '')>Choose a Filter</option>
                @foreach (UserAccountStatus::cases() as $status)
                    <option value='{{ $status->value }}' @selected(request('filters.locked' , "") === (string)$status->value)>{{ $status->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

</section>
