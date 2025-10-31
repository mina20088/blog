<?php use \App\Enums\Gender; ?>;
<?php use \App\Enums\CountryCity; ?>;



<?php $__env->startSection('title', 'create'); ?>

<?php $__env->startSection('content'); ?>
    
    <section class="my-10">
        
        <section class="flex xs:justify-between xs:items-center xs:py-8 lg:py-10">

            <h1 class="font-bold xs:text-lg md:text-2xl">Create User</h1>

        </section>

        
        <section >

            <form
                class="flex flex-col gap-3" method="post" action="<?php echo e(route('dashboard.users.store')); ?>"  enctype="multipart/form-data">

                <?php echo csrf_field(); ?>

                

                <?php if (isset($component)) { $__componentOriginal3df60584aa5c7a1ebec0fe21bee24f18 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3df60584aa5c7a1ebec0fe21bee24f18 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.users.user-create-personal-information-card','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('users.user-create-personal-information-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3df60584aa5c7a1ebec0fe21bee24f18)): ?>
<?php $attributes = $__attributesOriginal3df60584aa5c7a1ebec0fe21bee24f18; ?>
<?php unset($__attributesOriginal3df60584aa5c7a1ebec0fe21bee24f18); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3df60584aa5c7a1ebec0fe21bee24f18)): ?>
<?php $component = $__componentOriginal3df60584aa5c7a1ebec0fe21bee24f18; ?>
<?php unset($__componentOriginal3df60584aa5c7a1ebec0fe21bee24f18); ?>
<?php endif; ?>

                

                <?php if (isset($component)) { $__componentOriginal5aedf1664cd7fdab3882e9dd02094cdf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5aedf1664cd7fdab3882e9dd02094cdf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.users.user-create-account-information-card','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('users.user-create-account-information-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5aedf1664cd7fdab3882e9dd02094cdf)): ?>
<?php $attributes = $__attributesOriginal5aedf1664cd7fdab3882e9dd02094cdf; ?>
<?php unset($__attributesOriginal5aedf1664cd7fdab3882e9dd02094cdf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5aedf1664cd7fdab3882e9dd02094cdf)): ?>
<?php $component = $__componentOriginal5aedf1664cd7fdab3882e9dd02094cdf; ?>
<?php unset($__componentOriginal5aedf1664cd7fdab3882e9dd02094cdf); ?>
<?php endif; ?>

                

                <?php if (isset($component)) { $__componentOriginalb92aa2f08686aa76b47fb98a30ff2e23 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb92aa2f08686aa76b47fb98a30ff2e23 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.users.user-create-address-information-card','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('users.user-create-address-information-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb92aa2f08686aa76b47fb98a30ff2e23)): ?>
<?php $attributes = $__attributesOriginalb92aa2f08686aa76b47fb98a30ff2e23; ?>
<?php unset($__attributesOriginalb92aa2f08686aa76b47fb98a30ff2e23); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb92aa2f08686aa76b47fb98a30ff2e23)): ?>
<?php $component = $__componentOriginalb92aa2f08686aa76b47fb98a30ff2e23; ?>
<?php unset($__componentOriginalb92aa2f08686aa76b47fb98a30ff2e23); ?>
<?php endif; ?>

                

                <?php if (isset($component)) { $__componentOriginal46ae54570a2fff58458f603e8c1889b9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal46ae54570a2fff58458f603e8c1889b9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.users.user-create-social-information-card','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('users.user-create-social-information-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal46ae54570a2fff58458f603e8c1889b9)): ?>
<?php $attributes = $__attributesOriginal46ae54570a2fff58458f603e8c1889b9; ?>
<?php unset($__attributesOriginal46ae54570a2fff58458f603e8c1889b9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal46ae54570a2fff58458f603e8c1889b9)): ?>
<?php $component = $__componentOriginal46ae54570a2fff58458f603e8c1889b9; ?>
<?php unset($__componentOriginal46ae54570a2fff58458f603e8c1889b9); ?>
<?php endif; ?>


                <section class="grid justify-end grid-col-2">

                    <section class="col-span-1">
                        <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['type' => 'submit','class' => '!bg-blue-600 text-white font-bold','roundedLg' => true,'content' => 'Submit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','class' => '!bg-blue-600 text-white font-bold','rounded_lg' => true,'content' => 'Submit']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $attributes = $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $component = $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalfb5b48b69fbd6989c24c2377cf6cf379 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfb5b48b69fbd6989c24c2377cf6cf379 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.link-button','data' => ['link' => route('dashboard.users'),'class' => 'font-bold !bg-red-600 ','roundedLg' => true,'textWhite' => true,'content' => 'Cancel']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('link-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['link' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('dashboard.users')),'class' => 'font-bold !bg-red-600 ','rounded_lg' => true,'text_white' => true,'content' => 'Cancel']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfb5b48b69fbd6989c24c2377cf6cf379)): ?>
<?php $attributes = $__attributesOriginalfb5b48b69fbd6989c24c2377cf6cf379; ?>
<?php unset($__attributesOriginalfb5b48b69fbd6989c24c2377cf6cf379); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfb5b48b69fbd6989c24c2377cf6cf379)): ?>
<?php $component = $__componentOriginalfb5b48b69fbd6989c24c2377cf6cf379; ?>
<?php unset($__componentOriginalfb5b48b69fbd6989c24c2377cf6cf379); ?>
<?php endif; ?>
                    </section>

                </section>
            </form>
        </section>
        <section/>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\minar\projects\blog\resources\views/dashboard/users/create.blade.php ENDPATH**/ ?>