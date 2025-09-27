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

                <div class="flex flex-col">

                    <?php echo e($users->links()); ?>


                </div>
            </div>

        <?php else: ?>

            <div class="flex justify-between xs:items-center xs:my-9">

                <h1 class="font-bold text-2xl">Users</h1>

                <a href="<?php echo e(route('dashboard.users.create')); ?>"
                    class="bg-blue-600 text-white xs:px-4 xs:py-4 basis-28 rounded-lg text-center ">Create</a>

            </div>

        <?php endif; ?>

        <?php if (isset($component)) { $__componentOriginal97b6e86ce53fac81267b43f9445dece1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal97b6e86ce53fac81267b43f9445dece1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.users.users_filters_serach_form','data' => ['users' => $users]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('users.users_filters_serach_form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['users' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($users)]); ?>

            <?php if (isset($component)) { $__componentOriginal9d2772cc3f0289eaba7a1480d26f941a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9d2772cc3f0289eaba7a1480d26f941a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.users.users_filters_serach_form_search_sort','data' => ['columns' => $columns]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('users.users_filters_serach_form_search_sort'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['columns' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($columns)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9d2772cc3f0289eaba7a1480d26f941a)): ?>
<?php $attributes = $__attributesOriginal9d2772cc3f0289eaba7a1480d26f941a; ?>
<?php unset($__attributesOriginal9d2772cc3f0289eaba7a1480d26f941a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9d2772cc3f0289eaba7a1480d26f941a)): ?>
<?php $component = $__componentOriginal9d2772cc3f0289eaba7a1480d26f941a; ?>
<?php unset($__componentOriginal9d2772cc3f0289eaba7a1480d26f941a); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginal99420fcc2db3b84cc05e06e81013d6fa = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal99420fcc2db3b84cc05e06e81013d6fa = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.users.users_filter_search_form_serach_by','data' => ['columns' => $columns]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('users.users_filter_search_form_serach_by'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['columns' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($columns)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal99420fcc2db3b84cc05e06e81013d6fa)): ?>
<?php $attributes = $__attributesOriginal99420fcc2db3b84cc05e06e81013d6fa; ?>
<?php unset($__attributesOriginal99420fcc2db3b84cc05e06e81013d6fa); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal99420fcc2db3b84cc05e06e81013d6fa)): ?>
<?php $component = $__componentOriginal99420fcc2db3b84cc05e06e81013d6fa; ?>
<?php unset($__componentOriginal99420fcc2db3b84cc05e06e81013d6fa); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginale521b76347c7cbb32f4c388c28ff3739 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale521b76347c7cbb32f4c388c28ff3739 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.users.users_filter_search_form_filters','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('users.users_filter_search_form_filters'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale521b76347c7cbb32f4c388c28ff3739)): ?>
<?php $attributes = $__attributesOriginale521b76347c7cbb32f4c388c28ff3739; ?>
<?php unset($__attributesOriginale521b76347c7cbb32f4c388c28ff3739); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale521b76347c7cbb32f4c388c28ff3739)): ?>
<?php $component = $__componentOriginale521b76347c7cbb32f4c388c28ff3739; ?>
<?php unset($__componentOriginale521b76347c7cbb32f4c388c28ff3739); ?>
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
<?php if (isset($__attributesOriginal97b6e86ce53fac81267b43f9445dece1)): ?>
<?php $attributes = $__attributesOriginal97b6e86ce53fac81267b43f9445dece1; ?>
<?php unset($__attributesOriginal97b6e86ce53fac81267b43f9445dece1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal97b6e86ce53fac81267b43f9445dece1)): ?>
<?php $component = $__componentOriginal97b6e86ce53fac81267b43f9445dece1; ?>
<?php unset($__componentOriginal97b6e86ce53fac81267b43f9445dece1); ?>
<?php endif; ?>

    </div>

    <div class="relative overflow-x-auto mt-4">

        <?php if (isset($component)) { $__componentOriginalaa29fd575a8e84f836931486d88610e0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaa29fd575a8e84f836931486d88610e0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.users.users_table_with_pagination','data' => ['users' => $users]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('users.users_table_with_pagination'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['users' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($users)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalaa29fd575a8e84f836931486d88610e0)): ?>
<?php $attributes = $__attributesOriginalaa29fd575a8e84f836931486d88610e0; ?>
<?php unset($__attributesOriginalaa29fd575a8e84f836931486d88610e0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaa29fd575a8e84f836931486d88610e0)): ?>
<?php $component = $__componentOriginalaa29fd575a8e84f836931486d88610e0; ?>
<?php unset($__componentOriginalaa29fd575a8e84f836931486d88610e0); ?>
<?php endif; ?>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\minar\projects\blog\resources\views/dashboard/users/index.blade.php ENDPATH**/ ?>