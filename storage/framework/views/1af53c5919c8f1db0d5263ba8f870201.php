<?php use \App\Helpers\DashboardUsersViewHelpers; ?>

<?php use \Illuminate\Support\Facades\Session; ?>



<?php $__env->startSection('title'); ?>
    Users
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="xs:mt-16" x-data="{ show: $persist(false) }">
        <?php if($users->count() > 0 || DashboardUsersViewHelpers::requestHasActiveFilters()): ?>

            <div class="flex xs:flex-col  md:flex-col sm:justify-between xs:my-4 sm:mt-24 sm:mb-4 xs:gap-3">
                <div class='flex xs:flex-col xs:gap-3 sm:flex-row  sm:justify-between sm:basis-full sm:items-center'>
                    <h1 class="font-bold text-2xl">Users</h1>

                    <div class="flex gap-3 xs:justify-between sm:items-center">

                        <button x-on:click.prevent="show =! show"
                                class="flex gap-1 border border-1 xs:px-4 xs:py-1 xs:basis-1/2 rounded-lg items-center justify-center ">

                            <span class="xs:basis-3 text-center">
                                <?php if (isset($component)) { $__componentOriginal6c5db94c2261b39aaaea987fb251a02b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6c5db94c2261b39aaaea987fb251a02b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.svgs.filter','data' => ['class' => 'xs:w-3 xs:text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('svgs.filter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'xs:w-3 xs:text-center']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6c5db94c2261b39aaaea987fb251a02b)): ?>
<?php $attributes = $__attributesOriginal6c5db94c2261b39aaaea987fb251a02b; ?>
<?php unset($__attributesOriginal6c5db94c2261b39aaaea987fb251a02b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6c5db94c2261b39aaaea987fb251a02b)): ?>
<?php $component = $__componentOriginal6c5db94c2261b39aaaea987fb251a02b; ?>
<?php unset($__componentOriginal6c5db94c2261b39aaaea987fb251a02b); ?>
<?php endif; ?>
                            </span>

                            <span class="xs:basis-full text-center xs:font-semibold">Filters/Search</span>

                        </button>

                        <a href="<?php echo e(route('dashboard.users.create')); ?>"
                           class="bg-blue-600 text-white xs:px-4 xs:py-1 xs:basis-1/2 rounded-lg text-center ">Create</a>
                    </div>
                </div>
            </div>

        <?php else: ?>

            <div class="flex justify-between xs:items-center xs:my-9">

                <h1 class="font-bold text-2xl">Users</h1>

                <a href="<?php echo e(route('dashboard.users.create')); ?>"
                   class="bg-blue-600 text-white xs:px-4 xs:py-4 basis-28 rounded-lg text-center ">Create</a>

            </div>

        <?php endif; ?>

        <?php if (isset($component)) { $__componentOriginale9aa2401947e9922c2bc35a28e822442 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale9aa2401947e9922c2bc35a28e822442 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.users.user-filters-box','data' => ['users' => $users]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('users.user-filters-box'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['users' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($users)]); ?>

            <?php if (isset($component)) { $__componentOriginal8a6442c8f9f51d476a75ef5e0e07c79b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a6442c8f9f51d476a75ef5e0e07c79b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.users.user-search-controls','data' => ['columns' => $columns]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('users.user-search-controls'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['columns' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($columns)]); ?>
                <?php if (isset($component)) { $__componentOriginal730637f397ab7cb49e59f259a259aee2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal730637f397ab7cb49e59f259a259aee2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.users.user-sort-controls','data' => ['columns' => $columns]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('users.user-sort-controls'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['columns' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($columns)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal730637f397ab7cb49e59f259a259aee2)): ?>
<?php $attributes = $__attributesOriginal730637f397ab7cb49e59f259a259aee2; ?>
<?php unset($__attributesOriginal730637f397ab7cb49e59f259a259aee2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal730637f397ab7cb49e59f259a259aee2)): ?>
<?php $component = $__componentOriginal730637f397ab7cb49e59f259a259aee2; ?>
<?php unset($__componentOriginal730637f397ab7cb49e59f259a259aee2); ?>
<?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a6442c8f9f51d476a75ef5e0e07c79b)): ?>
<?php $attributes = $__attributesOriginal8a6442c8f9f51d476a75ef5e0e07c79b; ?>
<?php unset($__attributesOriginal8a6442c8f9f51d476a75ef5e0e07c79b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a6442c8f9f51d476a75ef5e0e07c79b)): ?>
<?php $component = $__componentOriginal8a6442c8f9f51d476a75ef5e0e07c79b; ?>
<?php unset($__componentOriginal8a6442c8f9f51d476a75ef5e0e07c79b); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginalfe575732dc5a206b9a73c881f4560606 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfe575732dc5a206b9a73c881f4560606 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.users.user-search-by','data' => ['columns' => $columns]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('users.user-search-by'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['columns' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($columns)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfe575732dc5a206b9a73c881f4560606)): ?>
<?php $attributes = $__attributesOriginalfe575732dc5a206b9a73c881f4560606; ?>
<?php unset($__attributesOriginalfe575732dc5a206b9a73c881f4560606); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfe575732dc5a206b9a73c881f4560606)): ?>
<?php $component = $__componentOriginalfe575732dc5a206b9a73c881f4560606; ?>
<?php unset($__componentOriginalfe575732dc5a206b9a73c881f4560606); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginale02a052fb832d07b6b82f6e309c8a85e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale02a052fb832d07b6b82f6e309c8a85e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.users.user-filters','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('users.user-filters'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale02a052fb832d07b6b82f6e309c8a85e)): ?>
<?php $attributes = $__attributesOriginale02a052fb832d07b6b82f6e309c8a85e; ?>
<?php unset($__attributesOriginale02a052fb832d07b6b82f6e309c8a85e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale02a052fb832d07b6b82f6e309c8a85e)): ?>
<?php $component = $__componentOriginale02a052fb832d07b6b82f6e309c8a85e; ?>
<?php unset($__componentOriginale02a052fb832d07b6b82f6e309c8a85e); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginal53a1fe6c386751ce31edec7c01de3dd7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53a1fe6c386751ce31edec7c01de3dd7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.users.users_per_page','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('users.users_per_page'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal53a1fe6c386751ce31edec7c01de3dd7)): ?>
<?php $attributes = $__attributesOriginal53a1fe6c386751ce31edec7c01de3dd7; ?>
<?php unset($__attributesOriginal53a1fe6c386751ce31edec7c01de3dd7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53a1fe6c386751ce31edec7c01de3dd7)): ?>
<?php $component = $__componentOriginal53a1fe6c386751ce31edec7c01de3dd7; ?>
<?php unset($__componentOriginal53a1fe6c386751ce31edec7c01de3dd7); ?>
<?php endif; ?>

            <div class="flex xs:w-full">

                <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none xs:w-full md:w-28">
                    Apply
                </button>

                <?php if(DashboardUsersViewHelpers::requestHasActiveFilters()): ?>

                    <a href="<?php echo e(route('dashboard.users.reset-filters')); ?>"
                       class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">
                        Reset
                    </a>

                <?php endif; ?>
            </div>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale9aa2401947e9922c2bc35a28e822442)): ?>
<?php $attributes = $__attributesOriginale9aa2401947e9922c2bc35a28e822442; ?>
<?php unset($__attributesOriginale9aa2401947e9922c2bc35a28e822442); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale9aa2401947e9922c2bc35a28e822442)): ?>
<?php $component = $__componentOriginale9aa2401947e9922c2bc35a28e822442; ?>
<?php unset($__componentOriginale9aa2401947e9922c2bc35a28e822442); ?>
<?php endif; ?>

    </div>



    <div class="relative overflow-x-auto mt-4">

        <?php if (isset($component)) { $__componentOriginal02644bbbeaef6c356fd22f2c955398c2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal02644bbbeaef6c356fd22f2c955398c2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.users.user-table','data' => ['users' => $users]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('users.user-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['users' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($users)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal02644bbbeaef6c356fd22f2c955398c2)): ?>
<?php $attributes = $__attributesOriginal02644bbbeaef6c356fd22f2c955398c2; ?>
<?php unset($__attributesOriginal02644bbbeaef6c356fd22f2c955398c2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal02644bbbeaef6c356fd22f2c955398c2)): ?>
<?php $component = $__componentOriginal02644bbbeaef6c356fd22f2c955398c2; ?>
<?php unset($__componentOriginal02644bbbeaef6c356fd22f2c955398c2); ?>
<?php endif; ?>

    </div>

    <div class="flex flex-col">

        <?php echo e($users->links()); ?>


    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\minar\projects\blog\resources\views/dashboard/users/index.blade.php ENDPATH**/ ?>