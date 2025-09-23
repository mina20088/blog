<?php foreach (([
    'href',
    'name'
]) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>
<a <?php echo e($attributes); ?>  href="<?php echo e($href); ?>"><?php echo e($name); ?></a>
<?php /**PATH C:\Users\minar\projects\blog\resources\views/components/nvigation/navigation_item_link.blade.php ENDPATH**/ ?>