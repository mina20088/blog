<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['columns']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['columns']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="flex xs:flex-col md:flex-row justify-between xs:gap-3">
    <!-- Search input: used to filter users by search term -->
    <input type="text" id="large-input"
        class="block w-full xs:p-1 md:p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500"
        name="search" value="<?php echo e(request('search', old('search'))); ?>" placeholder="search...">

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
</div>
<?php /**PATH C:\Users\minar\projects\blog\resources\views/components/users/users_filters_serach_form_search_sort.blade.php ENDPATH**/ ?>