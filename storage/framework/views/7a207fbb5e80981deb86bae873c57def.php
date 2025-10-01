
<!-- Order By select: used to sort users by selected column -->
<select
    class="g-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block xs:p-1 md:p-2 "
    name="orderBy">
    <option value="">Order By</option>
    <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($column); ?>" <?php if(request('orderBy') === $column ?? ''): echo 'selected'; endif; ?>><?php echo e($column); ?>

        </option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>

<!-- Direction select: used to choose sorting direction (ascending/descending) -->
<select
    class="g-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block xs:p-1 md:p-2 "
    name="dir">
    <option value="">Direction</option>
    <option value="asc" <?php if(request('dir') === 'acs'): echo 'selected'; endif; ?>>Ascending</option>
    <option value="desc" <?php if(request('dir') === 'desc'): echo 'selected'; endif; ?>>Descending</option>
</select>
<?php /**PATH C:\Users\minar\projects\blog\resources\views/components/users/user-sort-controls.blade.php ENDPATH**/ ?>