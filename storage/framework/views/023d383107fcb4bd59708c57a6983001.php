<?php use \App\Enums\UserAccountStatus; ?>
<?php use \App\Enums\Gender; ?>
<section class="flex flex-col gap-3">
    <label>Filter By:</label>
    <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3" x-data="
    {
        countries:window.CountryCityUtils.getAllCountries(),
        country:$persist('') ,
        cities: $persist([]),
        scity: ''
    } ">

        <!-- Country filter: filters users by country -->
        <div class="w-full md:col-span-3 lg:col-span-1">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">Country</label>
            <select id="countries" x-model="country" name="filters[country]"  @change="cities = window.CountryCityUtils.getCities(country)"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  xs:p-1 md:p-2.5 ">
                <option value="" selected>Choose a Filter</option>
                <template x-for="country in countries">
                    <option x-text="country" :value="country" :selected="country === '<?php echo e(request('filters.country')); ?>'"></option>
                </template>
            </select>
        </div>

        <!-- City filter: filters users by city -->
        <div class="w-full" >
            <label for="city" class="block mb-2 text-sm font-medium text-gray-900">City</label>
            <select id="city"  name="filters[city]"  x-model="scity"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full   xs:p-1 md:p-2.5">
                <option value selected>Choose a Filter</option>
                <template x-for="city in cities">
                    <option x-text="city" :value="city" :selected="city === '<?php echo e(request('filters.city')); ?>'" ></option>
                </template>
            </select>
            <span x-text="scity"></span>
        </div>

        <!-- Gender filter: filters users by gender -->
        <div class="w-full">
            <label for="gender" class="block mb-2 text-sm font-medium text-gray-900">Gender</label>
            <select id="gender" name="filters[gender]"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full xs:p-1 md:p-2.5">
                <option value="" <?php if(request("filters.gender") === ""): echo 'selected'; endif; ?>>Choose a Filter</option>
                <?php $__currentLoopData = Gender::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option
                        value='<?php echo e($gender->value); ?>' <?php if(((integer)request('filters.gender', "") === $gender->value) ): echo 'selected'; endif; ?>><?php echo e($gender->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <!-- Status filter: filters users by account status (locked/unlocked/etc) -->
        <div class="w-full">
            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">status</label>
            <select id="status" name="filters[locked]"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full xs:p-1 md:p-2.5">
                <option value="" <?php if(request('filters.locked') === ''): echo 'selected'; endif; ?>>Choose a Filter</option>
                <?php $__currentLoopData = UserAccountStatus::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option
                        value='<?php echo e($status->value); ?>' <?php if(request('filters.locked' , "") === (string)$status->value): echo 'selected'; endif; ?>><?php echo e($status->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>

</section>
<?php /**PATH C:\Users\minar\projects\blog\resources\views/components/users/user-filters.blade.php ENDPATH**/ ?>