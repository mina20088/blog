<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'link' => '',
    'content' => 'Button',
    'rounded_sm' => false,
    'rounded_md' => false,
    'rounded_lg' => false,
    'rounded_xl' => false,
    'text_white' => true
]));

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

foreach (array_filter(([
    'link' => '',
    'content' => 'Button',
    'rounded_sm' => false,
    'rounded_md' => false,
    'rounded_lg' => false,
    'rounded_xl' => false,
    'text_white' => true
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>


<a href="<?php echo e($link); ?>" <?php echo e($attributes->class(['rounded-sm' => $rounded_sm, 'rounded-lg' => $rounded_lg , 'rounded-md' => $rounded_md , '$rounded_xl' => $rounded_xl , 'text-white' => $text_white])->merge(['class' => 'bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:outline-none focus:ring-4 focus:ring-pink-200 dark:focus:ring-pink-800 py-3 px-4 text-center font-medium'])); ?>)>
    <?php echo e($content); ?>

</a>
<?php /**PATH C:\Users\minar\projects\blog\resources\views/components/buttons/link-button-gradiant-orange.blade.php ENDPATH**/ ?>