<input type="<?php echo e($type); ?>"
       id="<?php echo e($id); ?>"
       name="<?php echo e($name); ?>"
       <?php echo e(isset($placeholder) ? 'placeholder' . $placeholder : ''); ?>

       <?php echo e(isset($value) ? 'value=' . $value : ''); ?>

       <?php echo e($attributes ->merge(['class' => "block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white text-base focus:ring-blue-500 focus:border-blue-500"])); ?>


/>
<?php /**PATH C:\Users\minar\projects\blog\resources\views/components/input.blade.php ENDPATH**/ ?>