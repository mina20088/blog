<!-- Header: Logo and Close Button -->
<div class="grid grid-flow-col items-center justify-between h-16">
    <a href="<?php echo e(route('home')); ?>">
         <?php if (isset($component)) { $__componentOriginal037e41e059756ac0a351e11af6b8780b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal037e41e059756ac0a351e11af6b8780b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.svgs.logo','data' => ['class' => 'xs:w-24 xs:h-8']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('svgs.logo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'xs:w-24 xs:h-8']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal037e41e059756ac0a351e11af6b8780b)): ?>
<?php $attributes = $__attributesOriginal037e41e059756ac0a351e11af6b8780b; ?>
<?php unset($__attributesOriginal037e41e059756ac0a351e11af6b8780b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal037e41e059756ac0a351e11af6b8780b)): ?>
<?php $component = $__componentOriginal037e41e059756ac0a351e11af6b8780b; ?>
<?php unset($__componentOriginal037e41e059756ac0a351e11af6b8780b); ?>
<?php endif; ?>
    </a>
    <a id="hide-sidebar" href="#">
        <?php if (isset($component)) { $__componentOriginal7e2c66478e1ea3aeeae2fc0adc683c7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7e2c66478e1ea3aeeae2fc0adc683c7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.svgs.close','data' => ['class' => 'w-4 text-white inline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('svgs.close'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 text-white inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7e2c66478e1ea3aeeae2fc0adc683c7c)): ?>
<?php $attributes = $__attributesOriginal7e2c66478e1ea3aeeae2fc0adc683c7c; ?>
<?php unset($__attributesOriginal7e2c66478e1ea3aeeae2fc0adc683c7c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7e2c66478e1ea3aeeae2fc0adc683c7c)): ?>
<?php $component = $__componentOriginal7e2c66478e1ea3aeeae2fc0adc683c7c; ?>
<?php unset($__componentOriginal7e2c66478e1ea3aeeae2fc0adc683c7c); ?>
<?php endif; ?>
    </a>
</div>
<?php /**PATH C:\Users\minar\projects\blog\resources\views/components/sidebar/sidebar_header.blade.php ENDPATH**/ ?>