<!-- Navigation Links -->
<div class="grid grid-flow-row gap-1">
    <a href="<?php echo e(route('home')); ?>" class="text-white text-xl font-bold px-2 py-3 hover:bg-zinc-400 hover:rounded-lg">
        <div class="flex gap-2 items-center">
            <span>
                <?php if (isset($component)) { $__componentOriginaleabe01db2fdd876af7cc711da545460a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleabe01db2fdd876af7cc711da545460a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.svgs.home','data' => ['class' => 'w-6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('svgs.home'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-6']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleabe01db2fdd876af7cc711da545460a)): ?>
<?php $attributes = $__attributesOriginaleabe01db2fdd876af7cc711da545460a; ?>
<?php unset($__attributesOriginaleabe01db2fdd876af7cc711da545460a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleabe01db2fdd876af7cc711da545460a)): ?>
<?php $component = $__componentOriginaleabe01db2fdd876af7cc711da545460a; ?>
<?php unset($__componentOriginaleabe01db2fdd876af7cc711da545460a); ?>
<?php endif; ?>
            </span>
            <span>
                 Home
           </span>
        </div>

    </a>
    <a href="<?php echo e(route('about')); ?>" class="text-white text-xl font-bold px-2 py-3 hover:bg-zinc-400 hover:rounded-lg">
        <div class="flex gap-2 items-center">
            <span>
                <?php if (isset($component)) { $__componentOriginal70a598f313a66145f7b9578f56991fcd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal70a598f313a66145f7b9578f56991fcd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.svgs.info','data' => ['class' => 'w-6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('svgs.info'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-6']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal70a598f313a66145f7b9578f56991fcd)): ?>
<?php $attributes = $__attributesOriginal70a598f313a66145f7b9578f56991fcd; ?>
<?php unset($__attributesOriginal70a598f313a66145f7b9578f56991fcd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal70a598f313a66145f7b9578f56991fcd)): ?>
<?php $component = $__componentOriginal70a598f313a66145f7b9578f56991fcd; ?>
<?php unset($__componentOriginal70a598f313a66145f7b9578f56991fcd); ?>
<?php endif; ?>
            </span>
            <span>
                About
            </span>
        </div>
    </a>
    <a href="<?php echo e(route('contact')); ?>" class="text-white text-xl font-bold px-2 py-3 hover:bg-zinc-400 hover:rounded-lg">
        <div class="flex gap-2 items-center">
            <span>
                <?php if (isset($component)) { $__componentOriginal0a817fccab1e1feba4811cd45bddf0cf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0a817fccab1e1feba4811cd45bddf0cf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.svgs.contact','data' => ['class' => 'w-6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('svgs.contact'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-6']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0a817fccab1e1feba4811cd45bddf0cf)): ?>
<?php $attributes = $__attributesOriginal0a817fccab1e1feba4811cd45bddf0cf; ?>
<?php unset($__attributesOriginal0a817fccab1e1feba4811cd45bddf0cf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0a817fccab1e1feba4811cd45bddf0cf)): ?>
<?php $component = $__componentOriginal0a817fccab1e1feba4811cd45bddf0cf; ?>
<?php unset($__componentOriginal0a817fccab1e1feba4811cd45bddf0cf); ?>
<?php endif; ?>
            </span>
            <span>
                Contact
            </span>
        </div>
    </a>
</div>
<?php /**PATH C:\Users\minar\projects\blog\resources\views/components/sidebar/sidebar_navigation_links.blade.php ENDPATH**/ ?>