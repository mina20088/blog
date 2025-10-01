<?php use \App\Enums\UserAccountStatus; ?>
<?php use \App\Enums\Gender; ?>
<section class="flex flex-col gap-3">
    <label>Filter By:</label>
    <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 ">

        <!-- Country filter: filters users by country -->
        <div class="w-full md:col-span-3 lg:col-span-1">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">Country</label>
            <select id="countries"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  xs:p-1 md:p-2.5 ">
                <option selected>Choose a Filter</option>
                <!--Todo:add country-->
            </select>
        </div>

        <!-- City filter: filters users by city -->
        <div class="w-full">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">City</label>
            <select id="countries"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full   xs:p-1 md:p-2.5">
                <option selected>Choose a Filter</option>
                <!--TODO:add city
            </select>
        </div>

        <!-- Gender filter: filters users by gender -->
        <div class="w-full">
            <label for="gender" class="block mb-2 text-sm font-medium text-gray-900">Gender</label>
            <select id="gender" name="filters[gender]"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full xs:p-1 md:p-2.5">
                <option value="" <?php if(request("filterd.gender") === ""): echo 'selected'; endif; ?>>Choose a Filter</option>
                <?php $__currentLoopData = Gender::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value='<?php echo e($gender->value); ?>' <?php if((request('filters.gender', "") === (string) $gender->value) ): echo 'selected'; endif; ?>><?php echo e($gender->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <option value="NULL" <?php if((request('filters.gender', "") === (string) $gender->value) ): echo 'selected'; endif; ?>>N/A</option>
            </select>
        </div>

        <!-- Status filter: filters users by account status (locked/unlocked/etc) -->
        <div class="w-full">
            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">status</label>
            <select id="status" name="filters[locked]"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full xs:p-1 md:p-2.5">
                <option value="" <?php if(request('filters.locked') === ''): echo 'selected'; endif; ?>>Choose a Filter</option>
                <?php $__currentLoopData = UserAccountStatus::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value='<?php echo e($status->value); ?>' <?php if(request('filters.locked' , "") === (string)$status->value): echo 'selected'; endif; ?>><?php echo e($status->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>

</section>
<?php /**PATH C:\Users\minar\projects\blog\resources\views/components/users/users_filter_search_form_filters.blade.php ENDPATH**/ ?>