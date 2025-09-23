@use(App\Enums\UserAccountStatus)
@use(App\Enums\Gender)
<section class="flex flex-col gap-3">
    <label>Filter By:</label>
    <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 ">
        <div class="w-full">
            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">status</label>
            <select id="status" name="filters[locked]"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">Choose a Filter</option>
                @foreach (UserAccountStatus::cases() as $status)
                  <option value='{{ $status->value }}'>{{ $status->name }}</option>
                @endforeach
            </select>

        </div>
        <div class="w-full">
            <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
            <select id="gender" name="filters[gender]"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">Choose a Filter</option>
                @foreach (Gender::cases() as $gender )
                  <option value='{{ $gender->value }}'>{{ $gender->name }}</option>
                @endforeach
            </select>

        </div>
        <div class="w-full" >
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
            <select id="countries"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Choose a Filter</option>
            </select>

        </div>
        <div class="w-full md:col-span-3 lg:col-span-1">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country</label>
            <select id="countries"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Choose a Filter</option>
            </select>

        </div>
    </div>

</section>
