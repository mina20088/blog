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


<div class="flex xs:flex-col  xs:justify-start md:justify-between xs:gap-3 lg:flex-row md:items-center">

    <div class="flex flex-col justify-center items-start xs:basis-full xs:order-1 md:order-1 xs:gap-2">
        <label>search By</label>
        <div class="flex flex-col xs:justify-end md:flex-row md:flex-wrap items-start xs:gap-3 md:gap-2">
            <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex items-center">
                    <input id="<?php echo e($column); ?>" type="checkbox" value="<?php echo e($column); ?>" name="searchBy[]"
                           <?php if(in_array($column, request('searchBy') ?? [], true)): echo 'checked'; endif; ?>
                           class="w-4 h-4 text-blue-600 bg-gra y-100 border-gray-300 rounded-sm focus:ring-blue-500">
                    <label for="checkbox-1" class="ms-2 text-sm font-medium text-gray-900"><?php echo e($column); ?></label>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>




</div>
<?php /**PATH C:\Users\minar\projects\blog\resources\views/components/users/user-search-by.blade.php ENDPATH**/ ?>