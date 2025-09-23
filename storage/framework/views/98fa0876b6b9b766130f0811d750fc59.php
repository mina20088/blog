<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js', 'resources/css/app.css']); ?>
</head>
<body class="min-h-screen flex flex-col">
    <!-- Header -->
    <header class="xs:grid md:flex items-center justify-center bg-zinc-900 xs:grid-cols-2 md:grid-flow-col xs:px-2 xs:py-2 md:py-2.5 xl:px-16">
        <!-- Logo -->
        <a class="text-white" href="<?php echo e(route('home')); ?>">
            <?php if (isset($component)) { $__componentOriginal037e41e059756ac0a351e11af6b8780b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal037e41e059756ac0a351e11af6b8780b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.svgs.logo','data' => ['class' => 'xs:w-32']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('svgs.logo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'xs:w-32']); ?>
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

        <!-- Navigation -->
        <?php if (isset($component)) { $__componentOriginale86a496f1ef8ff3b53eacaabacdfdd64 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale86a496f1ef8ff3b53eacaabacdfdd64 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nvigation.navigation','data' => ['class' => 'hidden md:grid items-center h-full basis-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nvigation.navigation'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'hidden md:grid items-center h-full basis-full']); ?>
            <?php if (isset($component)) { $__componentOriginal2455624ce647081ab81027ecd5f9cfa2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2455624ce647081ab81027ecd5f9cfa2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nvigation.navigation_items','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nvigation.navigation_items'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2455624ce647081ab81027ecd5f9cfa2)): ?>
<?php $attributes = $__attributesOriginal2455624ce647081ab81027ecd5f9cfa2; ?>
<?php unset($__attributesOriginal2455624ce647081ab81027ecd5f9cfa2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2455624ce647081ab81027ecd5f9cfa2)): ?>
<?php $component = $__componentOriginal2455624ce647081ab81027ecd5f9cfa2; ?>
<?php unset($__componentOriginal2455624ce647081ab81027ecd5f9cfa2); ?>
<?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale86a496f1ef8ff3b53eacaabacdfdd64)): ?>
<?php $attributes = $__attributesOriginale86a496f1ef8ff3b53eacaabacdfdd64; ?>
<?php unset($__attributesOriginale86a496f1ef8ff3b53eacaabacdfdd64); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale86a496f1ef8ff3b53eacaabacdfdd64)): ?>
<?php $component = $__componentOriginale86a496f1ef8ff3b53eacaabacdfdd64; ?>
<?php unset($__componentOriginale86a496f1ef8ff3b53eacaabacdfdd64); ?>
<?php endif; ?>

        <!-- Login/Register Buttons (Desktop Only) -->
        <div class="xs:hidden md:grid md:col-span-1 justify-end items-center">
            <div class="grid grid-flow-col gap-4 justify-end xs:w-fit">
                <?php if (isset($component)) { $__componentOriginal6e022dc9c236b0a9a3560a6b73ac0f04 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6e022dc9c236b0a9a3560a6b73ac0f04 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttons.link-button-gradiant-blue','data' => ['class' => 'md:w-24','link' => ''.e(route('login')).'','content' => 'Login','roundedLg' => true,'textWhite' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('buttons.link-button-gradiant-blue'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'md:w-24','link' => ''.e(route('login')).'','content' => 'Login','rounded_lg' => true,'text_white' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6e022dc9c236b0a9a3560a6b73ac0f04)): ?>
<?php $attributes = $__attributesOriginal6e022dc9c236b0a9a3560a6b73ac0f04; ?>
<?php unset($__attributesOriginal6e022dc9c236b0a9a3560a6b73ac0f04); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6e022dc9c236b0a9a3560a6b73ac0f04)): ?>
<?php $component = $__componentOriginal6e022dc9c236b0a9a3560a6b73ac0f04; ?>
<?php unset($__componentOriginal6e022dc9c236b0a9a3560a6b73ac0f04); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginale537fa6670a84e890601f9506613c655 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale537fa6670a84e890601f9506613c655 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttons.link-button-gradiant-orange','data' => ['class' => 'md:w-24','content' => 'Register','link' => ''.e(route('register')).'','roundedLg' => true,'textWhite' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('buttons.link-button-gradiant-orange'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'md:w-24','content' => 'Register','link' => ''.e(route('register')).'','rounded_lg' => true,'text_white' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale537fa6670a84e890601f9506613c655)): ?>
<?php $attributes = $__attributesOriginale537fa6670a84e890601f9506613c655; ?>
<?php unset($__attributesOriginale537fa6670a84e890601f9506613c655); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale537fa6670a84e890601f9506613c655)): ?>
<?php $component = $__componentOriginale537fa6670a84e890601f9506613c655; ?>
<?php unset($__componentOriginale537fa6670a84e890601f9506613c655); ?>
<?php endif; ?>
            </div>
        </div>

        <!-- Mobile auth Dropdown & Hamburger -->
        <div class="xs:justify-end xs:gap-2 md:hidden h-full grid grid-flow-col items-center md:justify-center">
            <div>
                <div class="relative" x-data="{ show: false }">

                    <!-- Button: Login/Register -->
                    <?php if (isset($component)) { $__componentOriginal33e4f43b1fe2812447ac9bb0c2eb15df = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal33e4f43b1fe2812447ac9bb0c2eb15df = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttons.button','data' => ['@click' => 'show = !show','content' => 'Login/Register','roundedLg' => true,'class' => 'bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl xs:py-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('buttons.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['@click' => 'show = !show','content' => 'Login/Register','rounded_lg' => true,'class' => 'bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl xs:py-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal33e4f43b1fe2812447ac9bb0c2eb15df)): ?>
<?php $attributes = $__attributesOriginal33e4f43b1fe2812447ac9bb0c2eb15df; ?>
<?php unset($__attributesOriginal33e4f43b1fe2812447ac9bb0c2eb15df); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal33e4f43b1fe2812447ac9bb0c2eb15df)): ?>
<?php $component = $__componentOriginal33e4f43b1fe2812447ac9bb0c2eb15df; ?>
<?php unset($__componentOriginal33e4f43b1fe2812447ac9bb0c2eb15df); ?>
<?php endif; ?>

                    <!-- Dropdown Menu -->
                    <div class="fixed z-10 top-20 xs:w-48 xs:right-3 sm:w-52 sm:right-4 h-fit p-4 bg-white rounded-lg shadow-lg transform origin-top transition-all duration-300 ease-out"
                         x-show="show"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 scale-y-50"
                         x-transition:enter-end="opacity-100 scale-y-100"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 scale-y-100"
                         x-transition:leave-end="opacity-0 scale-y-50"
                         @click.outside="show = false">
                        <div class="grid grid-flow-row gap-3">

                            <!-- Login Link -->
                            <?php if (isset($component)) { $__componentOriginal6e022dc9c236b0a9a3560a6b73ac0f04 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6e022dc9c236b0a9a3560a6b73ac0f04 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttons.link-button-gradiant-blue','data' => ['class' => 'xs:text-sm md:text-xl xs:px-5 xs:py-2.5 md:px-8 md:py-4','content' => 'Login','href' => ''.e(route('login')).'','roundedLg' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('buttons.link-button-gradiant-blue'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'xs:text-sm md:text-xl xs:px-5 xs:py-2.5 md:px-8 md:py-4','content' => 'Login','href' => ''.e(route('login')).'','rounded_lg' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6e022dc9c236b0a9a3560a6b73ac0f04)): ?>
<?php $attributes = $__attributesOriginal6e022dc9c236b0a9a3560a6b73ac0f04; ?>
<?php unset($__attributesOriginal6e022dc9c236b0a9a3560a6b73ac0f04); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6e022dc9c236b0a9a3560a6b73ac0f04)): ?>
<?php $component = $__componentOriginal6e022dc9c236b0a9a3560a6b73ac0f04; ?>
<?php unset($__componentOriginal6e022dc9c236b0a9a3560a6b73ac0f04); ?>
<?php endif; ?>

                            <!-- Register Link -->
                            <?php if (isset($component)) { $__componentOriginale537fa6670a84e890601f9506613c655 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale537fa6670a84e890601f9506613c655 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttons.link-button-gradiant-orange','data' => ['class' => 'xs:text-sm md:text-xl xs:px-5 xs:py-2.5 md:px-8 md:py-4','href' => ''.e(route('register')).'','content' => 'Register','roundedLg' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('buttons.link-button-gradiant-orange'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'xs:text-sm md:text-xl xs:px-5 xs:py-2.5 md:px-8 md:py-4','href' => ''.e(route('register')).'','content' => 'Register','rounded_lg' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale537fa6670a84e890601f9506613c655)): ?>
<?php $attributes = $__attributesOriginale537fa6670a84e890601f9506613c655; ?>
<?php unset($__attributesOriginale537fa6670a84e890601f9506613c655); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale537fa6670a84e890601f9506613c655)): ?>
<?php $component = $__componentOriginale537fa6670a84e890601f9506613c655; ?>
<?php unset($__componentOriginale537fa6670a84e890601f9506613c655); ?>
<?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <a href="#" id="sidebar-button">
                <?php if (isset($component)) { $__componentOriginal010dc4dff34936f8df6ef16c59b61b3a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal010dc4dff34936f8df6ef16c59b61b3a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.svgs.menu-hamburger','data' => ['class' => 'text-white w-6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('svgs.menu-hamburger'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-white w-6']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal010dc4dff34936f8df6ef16c59b61b3a)): ?>
<?php $attributes = $__attributesOriginal010dc4dff34936f8df6ef16c59b61b3a; ?>
<?php unset($__attributesOriginal010dc4dff34936f8df6ef16c59b61b3a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal010dc4dff34936f8df6ef16c59b61b3a)): ?>
<?php $component = $__componentOriginal010dc4dff34936f8df6ef16c59b61b3a; ?>
<?php unset($__componentOriginal010dc4dff34936f8df6ef16c59b61b3a); ?>
<?php endif; ?>
            </a>
        </div>

        <!-- Sidebar -->
        <?php if (isset($component)) { $__componentOriginal28b950111ad8165a6f1f6f901592ae2f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal28b950111ad8165a6f1f6f901592ae2f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sidebar.sidebar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sidebar.sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal28b950111ad8165a6f1f6f901592ae2f)): ?>
<?php $attributes = $__attributesOriginal28b950111ad8165a6f1f6f901592ae2f; ?>
<?php unset($__attributesOriginal28b950111ad8165a6f1f6f901592ae2f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal28b950111ad8165a6f1f6f901592ae2f)): ?>
<?php $component = $__componentOriginal28b950111ad8165a6f1f6f901592ae2f; ?>
<?php unset($__componentOriginal28b950111ad8165a6f1f6f901592ae2f); ?>
<?php endif; ?>

    </header>

    <?php echo $__env->yieldContent('content'); ?>


    <footer class="flex xs:flex-row lg:flex-col bg-zinc-900 h-60 sticky">

    </footer>
</body>
</html>
<?php /**PATH C:\Users\minar\projects\blog\resources\views/layouts/app.blade.php ENDPATH**/ ?>