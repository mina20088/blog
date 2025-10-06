<?php use \App\Enums\Gender; ?>;
<?php use \App\Enums\CountryCity; ?>;



<?php $__env->startSection('title', 'create'); ?>

<?php $__env->startSection('content'); ?>
    <?php dsBlade(session()->has('errors')); ?>
    
    <section x-data="{
        show: <?php echo \Illuminate\Support\Js::from(session()->has('errors'), JSON_THROW_ON_ERROR)->toHtml() ?> ,countries: CountryCityUtils.getAllCountries(),cities : [],country:''}" class="my-10">
        
        <section class="flex xs:justify-between xs:items-center xs:py-8 lg:py-10">

            <h1 class="font-bold xs:text-lg md:text-2xl">Create User</h1>

            <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['@click' => 'show = !show','class' => 'bg-green-700 hover:bg-green-800 text-white font-bold','roundedLg' => true,'content' => 'Add More']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['@click' => 'show = !show','class' => 'bg-green-700 hover:bg-green-800 text-white font-bold','rounded_lg' => true,'content' => 'Add More']); ?>
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

        </section>

        
        <section class="">

            <form class="flex flex-col gap-3" method="post" action="<?php echo e(route('dashboard.users.store')); ?>"
                  enctype="multipart/form-data">

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


            </form>
        </section>
    <section/>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\minar\projects\blog\resources\views/dashboard/users/create.blade.php ENDPATH**/ ?>