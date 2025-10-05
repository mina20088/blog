<textarea
    <?php echo e($attributes); ?>

    id="<?php echo e($id); ?>"
    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
    name="<?php echo e($name); ?>"
    <?php echo e(isset($placeholder) ? "placeholder = {$placeholder}" : ''); ?>

    <?php echo e(isset($value) ? 'value=' . $value : ''); ?>

    <?php echo e(isset($rows)  ? "rows=" . $rows : "1"); ?>

>

   <?php if(isset($content)): ?>
        <?php echo e($content); ?>

    <?php else: ?>
    <?php endif; ?>

</textarea>
<?php /**PATH C:\Users\minar\projects\blog\resources\views/components/text-area.blade.php ENDPATH**/ ?>