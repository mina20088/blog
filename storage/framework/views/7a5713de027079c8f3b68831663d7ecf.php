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

<?php if(count($users) > 0 || DashboardUsersViewHelpers::requestHas()): ?>

    <div class="border bg-gray-200 xs:py-3 xs:px-3 lg:py-5 lg:px-5 rounded-lg" x-show="show"
        x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-20 -translate-y-20"
        x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-20 -translate-y-20">

        <form class="flex flex-col xs:gap-3 m-0" method="Get" action="<?php echo e(route('dashboard.users')); ?>">
            <?php echo e($slot); ?>

        </form>

    </div>
<?php endif; ?><?php /**PATH C:\Users\minar\projects\blog\resources\views/components/users/users_filters_serach_form.blade.php ENDPATH**/ ?>