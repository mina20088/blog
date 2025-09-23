<?php use \App\Helpers\DashboardUsersViewHelpers; ?>;
<?php use \Illuminate\Support\Facades\Session; ?>

<?php $__env->startSection('title', 'users'); ?>


<?php $__env->startSection('content'); ?>
    <div x-data="{ show: $persist(false) }">
        <?php if($users->count() > 0 || DashboardUsersViewHelpers::requestHas()): ?>
            <div class="flex xs:flex-col sm:flex-row sm:justify-between sm:items-center my-4 sm:my-9 xs:gap-3">
                <h1 class="font-bold text-2xl">Users</h1>
                <div class="flex gap-3 xs:justify-between sm:items-center">
                    <button x-on:click.prevent="show =! show"
                        class="flex gap-1 border border-1 xs:px-4 xs:py-4 rounded-lg items-center ">
                        <span><?php if (isset($component)) { $__componentOriginal6c5db94c2261b39aaaea987fb251a02b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6c5db94c2261b39aaaea987fb251a02b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.svgs.filter','data' => ['class' => 'w-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('svgs.filter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6c5db94c2261b39aaaea987fb251a02b)): ?>
<?php $attributes = $__attributesOriginal6c5db94c2261b39aaaea987fb251a02b; ?>
<?php unset($__attributesOriginal6c5db94c2261b39aaaea987fb251a02b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6c5db94c2261b39aaaea987fb251a02b)): ?>
<?php $component = $__componentOriginal6c5db94c2261b39aaaea987fb251a02b; ?>
<?php unset($__componentOriginal6c5db94c2261b39aaaea987fb251a02b); ?>
<?php endif; ?></span>
                        <span>Filters/Search</span>
                    </button>
                    <a href="<?php echo e(route('dashboard.users.create')); ?>"
                        class="bg-blue-600 text-white xs:px-4 xs:py-4 basis-28 rounded-lg text-center ">Create</a>
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

                <?php if(DashboardUsersViewHelpers::requestHas()): ?>
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
        <?php if($users->count() > 0 | DashboardUsersViewHelpers::requestHas()): ?>
            <div class="flex flex-col">
                <?php echo e($users->links()); ?>

            </div>

            <table id="users-table" class="w-full text-sm text-left rtl:text-right text-gray-500 rounded-xl">
                <thead class="text-xs text-gray-700 bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">

                            <div class="flex items-center gap-2">

                                <a
                                    href="<?php echo e(route('dashboard.users', ['sortBy' => 'id', 'dir' => DashboardUsersViewHelpers::sortTogglers(request())])); ?>">
                                    <span>#</span>
                                </a>
                                <?php if (isset($component)) { $__componentOriginal37c9740c7bfffcb83811d6b9b0cc6f97 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal37c9740c7bfffcb83811d6b9b0cc6f97 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.svgs.sort','data' => ['class' => 'w-3','upperColor' => '#acb0b7']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('svgs.sort'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-3','upper-color' => '#acb0b7']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal37c9740c7bfffcb83811d6b9b0cc6f97)): ?>
<?php $attributes = $__attributesOriginal37c9740c7bfffcb83811d6b9b0cc6f97; ?>
<?php unset($__attributesOriginal37c9740c7bfffcb83811d6b9b0cc6f97); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal37c9740c7bfffcb83811d6b9b0cc6f97)): ?>
<?php $component = $__componentOriginal37c9740c7bfffcb83811d6b9b0cc6f97; ?>
<?php unset($__componentOriginal37c9740c7bfffcb83811d6b9b0cc6f97); ?>
<?php endif; ?>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center gap-2">
                                <a
                                    href="<?php echo e(route('dashboard.users', ['sortBy' => 'first_name', 'dir' => DashboardUsersViewHelpers::sortTogglers(request())])); ?>">
                                    <span>Full Name</span>
                                </a>
                                <?php if (isset($component)) { $__componentOriginal37c9740c7bfffcb83811d6b9b0cc6f97 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal37c9740c7bfffcb83811d6b9b0cc6f97 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.svgs.sort','data' => ['class' => 'w-3','upperColor' => '#acb0b7']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('svgs.sort'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-3','upper-color' => '#acb0b7']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal37c9740c7bfffcb83811d6b9b0cc6f97)): ?>
<?php $attributes = $__attributesOriginal37c9740c7bfffcb83811d6b9b0cc6f97; ?>
<?php unset($__attributesOriginal37c9740c7bfffcb83811d6b9b0cc6f97); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal37c9740c7bfffcb83811d6b9b0cc6f97)): ?>
<?php $component = $__componentOriginal37c9740c7bfffcb83811d6b9b0cc6f97; ?>
<?php unset($__componentOriginal37c9740c7bfffcb83811d6b9b0cc6f97); ?>
<?php endif; ?>
                            </div>

                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center gap-2">
                                <a
                                    href="<?php echo e(route('dashboard.users', ['sortBy' => 'email', 'dir' => DashboardUsersViewHelpers::sortTogglers(request())])); ?>">
                                    <span>Email</span>
                                </a>
                                <?php if (isset($component)) { $__componentOriginal37c9740c7bfffcb83811d6b9b0cc6f97 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal37c9740c7bfffcb83811d6b9b0cc6f97 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.svgs.sort','data' => ['class' => 'w-3','upperColor' => '#acb0b7']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('svgs.sort'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-3','upper-color' => '#acb0b7']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal37c9740c7bfffcb83811d6b9b0cc6f97)): ?>
<?php $attributes = $__attributesOriginal37c9740c7bfffcb83811d6b9b0cc6f97; ?>
<?php unset($__attributesOriginal37c9740c7bfffcb83811d6b9b0cc6f97); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal37c9740c7bfffcb83811d6b9b0cc6f97)): ?>
<?php $component = $__componentOriginal37c9740c7bfffcb83811d6b9b0cc6f97; ?>
<?php unset($__componentOriginal37c9740c7bfffcb83811d6b9b0cc6f97); ?>
<?php endif; ?>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center gap-2">
                                <a
                                    href="<?php echo e(route('dashboard.users', ['sortBy' => 'username', 'dir' => DashboardUsersViewHelpers::sortTogglers(request())])); ?>">
                                    <span>Username</span>
                                </a>
                                <?php if (isset($component)) { $__componentOriginal37c9740c7bfffcb83811d6b9b0cc6f97 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal37c9740c7bfffcb83811d6b9b0cc6f97 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.svgs.sort','data' => ['class' => 'w-3','upperColor' => '#acb0b7']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('svgs.sort'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-3','upper-color' => '#acb0b7']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal37c9740c7bfffcb83811d6b9b0cc6f97)): ?>
<?php $attributes = $__attributesOriginal37c9740c7bfffcb83811d6b9b0cc6f97; ?>
<?php unset($__attributesOriginal37c9740c7bfffcb83811d6b9b0cc6f97); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal37c9740c7bfffcb83811d6b9b0cc6f97)): ?>
<?php $component = $__componentOriginal37c9740c7bfffcb83811d6b9b0cc6f97; ?>
<?php unset($__componentOriginal37c9740c7bfffcb83811d6b9b0cc6f97); ?>
<?php endif; ?>
                            </div>

                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center gap-2">
                                <a
                                    href="<?php echo e(route('dashboard.users', ['sortBy', 'locked', 'dir' => DashboardUsersViewHelpers::sortTogglers(request())])); ?>">
                                    <span>Active</span>
                                </a>
                                <?php if (isset($component)) { $__componentOriginal37c9740c7bfffcb83811d6b9b0cc6f97 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal37c9740c7bfffcb83811d6b9b0cc6f97 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.svgs.sort','data' => ['class' => 'w-3','upperColor' => '#acb0b7']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('svgs.sort'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-3','upper-color' => '#acb0b7']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal37c9740c7bfffcb83811d6b9b0cc6f97)): ?>
<?php $attributes = $__attributesOriginal37c9740c7bfffcb83811d6b9b0cc6f97; ?>
<?php unset($__attributesOriginal37c9740c7bfffcb83811d6b9b0cc6f97); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal37c9740c7bfffcb83811d6b9b0cc6f97)): ?>
<?php $component = $__componentOriginal37c9740c7bfffcb83811d6b9b0cc6f97; ?>
<?php unset($__componentOriginal37c9740c7bfffcb83811d6b9b0cc6f97); ?>
<?php endif; ?>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr class="bg-white border-b border-gray-200">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                <?php echo e($user->id); ?>

                            </th>
                            <td class="px-6 py-4">
                                <?php echo e($user->first_name . ' ' . $user->last_name); ?>

                            </td>
                            <td class="px-6 py-4">
                                <?php echo e($user->email); ?>

                            </td>
                            <td class="px-6 py-4">
                                <?php echo e($user->username); ?>

                            </td>
                            <td class="px-6 py-4">
                                <?php echo e($user->locked); ?>

                            </td>
                            <td class="px-6 py-4">

                            </td>
                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>


        <?php else: ?>
            <div class="flex flex-col items-center justify-center min-h-[60vh] w-full overflow-hidden px-4 py-8">
                <div class="flex flex-col items-center justify-center gap-2 xs:gap-3 max-w-full">
                    <?php if (isset($component)) { $__componentOriginal0f4a67eebdb2057ee0775414509dd70d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0f4a67eebdb2057ee0775414509dd70d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.svgs.user','data' => ['class' => 'w-24 h-24 xs:w-32 xs:h-32 sm:w-40 sm:h-40 md:w-48 md:h-48 flex-shrink-0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('svgs.user'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-24 h-24 xs:w-32 xs:h-32 sm:w-40 sm:h-40 md:w-48 md:h-48 flex-shrink-0']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0f4a67eebdb2057ee0775414509dd70d)): ?>
<?php $attributes = $__attributesOriginal0f4a67eebdb2057ee0775414509dd70d; ?>
<?php unset($__attributesOriginal0f4a67eebdb2057ee0775414509dd70d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0f4a67eebdb2057ee0775414509dd70d)): ?>
<?php $component = $__componentOriginal0f4a67eebdb2057ee0775414509dd70d; ?>
<?php unset($__componentOriginal0f4a67eebdb2057ee0775414509dd70d); ?>
<?php endif; ?>
                    <h1 class="font-bold text-xl xs:text-2xl sm:text-3xl text-center break-words">No Users Added Yet</h1>
                    <div class="text-slate-400 max-w-xs xs:max-w-sm text-center">
                        <p class="text-xs xs:text-sm leading-relaxed break-words">Users Will Appear here once they are
                            registerd or added by admin</p>
                        <p class="text-xs xs:text-sm leading-relaxed break-words">please Register New User</p>
                    </div>
                </div>
            </div>
        <?php endif; ?>


    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\minar\projects\blog\resources\views/dashboard/users/index.blade.php ENDPATH**/ ?>