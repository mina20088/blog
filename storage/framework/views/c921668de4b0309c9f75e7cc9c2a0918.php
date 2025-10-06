<select
    <?php echo e($attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-50'])); ?>

    id="<?php echo e($id); ?>"
    name="<?php echo e($name); ?>"
    <?php echo e(isset($multible) ? "multiple" : ''); ?>

>
    <?php echo e($slot); ?>

</select>


<?php /**PATH C:\Users\minar\projects\blog\resources\views/components/select.blade.php ENDPATH**/ ?>