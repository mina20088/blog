<?php use \App\Helpers\DashboardUsersViewHelpers; ?>

<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['users']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['users']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php if($users->count() > 0 | DashboardUsersViewHelpers::requestHasActiveFilters()): ?>

    

    <table id="users-table" class="w-full text-sm text-left rtl:text-right text-gray-500 rounded-xl">
        <thead class="text-sm text-nowrap text-gray-700 bg-gray-50 ">
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

                    <div class="flex items-center gap-2">

                        <a
                            href="<?php echo e(route('dashboard.users', ['sortBy', 'locked', 'dir' => DashboardUsersViewHelpers::sortTogglers(request())])); ?>">
                            <span>Gender</span>
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

                <tr class="bg-white border-b text-nowrap border-gray-200">

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



                        <?php echo e($user->profile->gender ?? 'N/A'); ?>


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
                    registered or added by admin</p>

                <p class="text-xs xs:text-sm leading-relaxed break-words">please Register New User</p>

            </div>

        </div>

    </div>

<?php endif; ?>
<?php /**PATH C:\Users\minar\projects\blog\resources\views/components/users/users_table_with_pagination.blade.php ENDPATH**/ ?>