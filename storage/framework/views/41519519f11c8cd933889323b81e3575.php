<?php use \App\Enums\Gender; ?>;
<?php use \App\Enums\CountryCity; ?>;



<?php $__env->startSection('title', 'create'); ?>

<?php $__env->startSection('content'); ?>
    
    <div x-data="
    {
        show:<?php echo \Illuminate\Support\Js::from(Session::has('errors'))->toHtml() ?>,
        country: '',
        city: '',
        countryList: window.CountryCityUtils.getAllCountries(),
        cityList: (function(){
            const oldCountry = '<?php echo e(old('country')); ?>';
            if(oldCountry){
                return window.CountryCityUtils.getCities(oldCountry);
            }
            return [];
        })(),
        sessionHasErrors: <?php echo \Illuminate\Support\Js::from(Session::has('errors'))->toHtml() ?>
    }"
         class="my-10">
        
        <div class="flex xs:justify-between xs:items-center xs:py-8 lg:py-10 xl:px-20">
            <h1 class="font-bold xs:text-lg md:text-2xl">Create User</h1>
            <button type="button"
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4
                       focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2"
                @click="show = !show">
                Add More
            </button>
        </div>

        
        <div class="xl:px-20">
            <form class="flex flex-col gap-3" method="post" action="<?php echo e(route('dashboard.users.store')); ?>"
                enctype="multipart/form-data">
                
                <?php echo csrf_field(); ?>
                <div
                    class="flex bg-gray-100 rounded-lg xs:mb-3  xs:flex-col xs:gap-2 md:gap-4
                            xs:py-3 xs:px-3 lg:py-10 lg:px-10">
                    <div class="flex xs:flex-col sm:flex-row gap-3 items-center w-full">
                        
                        <img src="<?php echo e(Vite::asset('resources/images/Aron.png')); ?>" height="300"
                            class="rounded-lg xs:w-72 sm:w-48 md:w-72 h-auto" alt="Profile Preview" />

                        <div class="w-full flex flex-col items-start gap-2">
                            <h1 class="font-bold text-xl">Profile Picture</h1>

                            
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="profile_image">
                                Upload file
                            </label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300
                                        rounded-lg cursor-pointer bg-gray-50 dark:text-white
                                        dark:bg-gray-700 dark:border-gray-600 focus:outline-none"
                                id="profile_image" name="profile_picture" type="file">
                            <?php if (isset($component)) { $__componentOriginal3fa50f77369b75df29651d5bd60f0643 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3fa50f77369b75df29651d5bd60f0643 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.single-error','data' => ['fieldName' => 'profile_picture']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('single-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['fieldName' => 'profile_picture']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3fa50f77369b75df29651d5bd60f0643)): ?>
<?php $attributes = $__attributesOriginal3fa50f77369b75df29651d5bd60f0643; ?>
<?php unset($__attributesOriginal3fa50f77369b75df29651d5bd60f0643); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3fa50f77369b75df29651d5bd60f0643)): ?>
<?php $component = $__componentOriginal3fa50f77369b75df29651d5bd60f0643; ?>
<?php unset($__componentOriginal3fa50f77369b75df29651d5bd60f0643); ?>
<?php endif; ?>

                            
                            <label for="message" class="block mb-2 text-base font-bold text-gray-900">Bio</label>
                            <textarea id="message" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50
                                             rounded-lg border border-gray-300 focus:ring-blue-500
                                             focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600
                                             dark:placeholder-gray-400 dark:text-white
                                             dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="bio" placeholder="Add Bio...">
                                      <?php echo e(old('bio')); ?>

                            </textarea>
                            <?php if (isset($component)) { $__componentOriginal3fa50f77369b75df29651d5bd60f0643 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3fa50f77369b75df29651d5bd60f0643 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.single-error','data' => ['fieldName' => 'bio']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('single-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['fieldName' => 'bio']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3fa50f77369b75df29651d5bd60f0643)): ?>
<?php $attributes = $__attributesOriginal3fa50f77369b75df29651d5bd60f0643; ?>
<?php unset($__attributesOriginal3fa50f77369b75df29651d5bd60f0643); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3fa50f77369b75df29651d5bd60f0643)): ?>
<?php $component = $__componentOriginal3fa50f77369b75df29651d5bd60f0643; ?>
<?php unset($__componentOriginal3fa50f77369b75df29651d5bd60f0643); ?>
<?php endif; ?>

                            <label for="git_hub_link" class="block mb-2 text-base font-bold text-gray-900">GitHub Repository
                                Link</label>
                            <input type="text" id="git_hub_link" name="github_repo_url"
                                value="<?php echo e(old('github_repo_url')); ?>"
                                class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500"
                                placeholder="GitHub_url" />
                            <?php if (isset($component)) { $__componentOriginal3fa50f77369b75df29651d5bd60f0643 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3fa50f77369b75df29651d5bd60f0643 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.single-error','data' => ['fieldName' => 'github_repo_url']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('single-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['fieldName' => 'github_repo_url']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3fa50f77369b75df29651d5bd60f0643)): ?>
<?php $attributes = $__attributesOriginal3fa50f77369b75df29651d5bd60f0643; ?>
<?php unset($__attributesOriginal3fa50f77369b75df29651d5bd60f0643); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3fa50f77369b75df29651d5bd60f0643)): ?>
<?php $component = $__componentOriginal3fa50f77369b75df29651d5bd60f0643; ?>
<?php unset($__componentOriginal3fa50f77369b75df29651d5bd60f0643); ?>
<?php endif; ?>
                        </div>


                    </div>
                </div>

                
                <div class="flex xs:flex-col xs:gap-3 md:flex-row">
                    <div :class="show ? 'basis-1/2' : 'basis-full'"
                        class="flex bg-gray-100 rounded-lg xs:flex-col xs:gap-2 md:gap-4
                                xs:py-3 xs:px-3 lg:py-10 lg:px-10 transition-all
                                duration-700 ease-in-out"
                        x-transition:enter="transition ease-out duration-700 transform"
                        x-transition:enter-start="translate-x-0 scale-100" x-transition:enter-end="-translate-x-4 scale-95">
                        <h1 class="font-bold text-xl">Personal Information</h1>
                        
                        <div class="flex xs:flex-col md:flex-row md:items-center gap-1">
                            <label for="first_name"
                                class="block font-medium text-gray-900 md:basis-28 xs:font-bold text-base">first
                                name:</label>
                            <input type="text" name="first_name" id="first_name" value="<?php echo e(old('first_name')); ?>"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full"
                                placeholder="first name" />

                        </div>
                        <?php if (isset($component)) { $__componentOriginal3fa50f77369b75df29651d5bd60f0643 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3fa50f77369b75df29651d5bd60f0643 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.single-error','data' => ['fieldName' => 'first_name']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('single-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['fieldName' => 'first_name']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3fa50f77369b75df29651d5bd60f0643)): ?>
<?php $attributes = $__attributesOriginal3fa50f77369b75df29651d5bd60f0643; ?>
<?php unset($__attributesOriginal3fa50f77369b75df29651d5bd60f0643); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3fa50f77369b75df29651d5bd60f0643)): ?>
<?php $component = $__componentOriginal3fa50f77369b75df29651d5bd60f0643; ?>
<?php unset($__componentOriginal3fa50f77369b75df29651d5bd60f0643); ?>
<?php endif; ?>
                        
                        <div class="flex xs:flex-col md:flex-row md:items-center gap-1">
                            <label for="last_name"
                                class="block font-medium text-gray-900 md:basis-28 xs:font-bold text-base">last
                                name:</label>
                            <input type="text" name="last_name" id="last_name" value="<?php echo e(old('last_name')); ?>"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full"
                                placeholder="last name" />
                        </div>
                        <?php if (isset($component)) { $__componentOriginal3fa50f77369b75df29651d5bd60f0643 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3fa50f77369b75df29651d5bd60f0643 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.single-error','data' => ['fieldName' => 'last_name']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('single-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['fieldName' => 'last_name']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3fa50f77369b75df29651d5bd60f0643)): ?>
<?php $attributes = $__attributesOriginal3fa50f77369b75df29651d5bd60f0643; ?>
<?php unset($__attributesOriginal3fa50f77369b75df29651d5bd60f0643); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3fa50f77369b75df29651d5bd60f0643)): ?>
<?php $component = $__componentOriginal3fa50f77369b75df29651d5bd60f0643; ?>
<?php unset($__componentOriginal3fa50f77369b75df29651d5bd60f0643); ?>
<?php endif; ?>
                        
                        <div class="flex xs:flex-col md:flex-row md:items-center gap-1">
                            <label for="email"
                                class="block font-medium text-gray-900 md:basis-28 xs:font-bold text-base">email:</label>
                            <input type="email" name="email" id="email" value="<?php echo e(old('email')); ?>"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full"
                                placeholder="Enter email address" />

                        </div>
                        <?php if (isset($component)) { $__componentOriginal3fa50f77369b75df29651d5bd60f0643 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3fa50f77369b75df29651d5bd60f0643 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.single-error','data' => ['fieldName' => 'email']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('single-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['fieldName' => 'email']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3fa50f77369b75df29651d5bd60f0643)): ?>
<?php $attributes = $__attributesOriginal3fa50f77369b75df29651d5bd60f0643; ?>
<?php unset($__attributesOriginal3fa50f77369b75df29651d5bd60f0643); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3fa50f77369b75df29651d5bd60f0643)): ?>
<?php $component = $__componentOriginal3fa50f77369b75df29651d5bd60f0643; ?>
<?php unset($__componentOriginal3fa50f77369b75df29651d5bd60f0643); ?>
<?php endif; ?>
                        
                        <div class="flex xs:flex-col md:flex-row md:items-center gap-1">
                            <label for="username"
                                class="block font-medium text-gray-900 md:basis-28 xs:font-bold text-base">username:</label>
                            <input type="text" name="username" id="username" value="<?php echo e(old('username')); ?>"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full"
                                placeholder="Enter username" />

                        </div>
                        <?php if (isset($component)) { $__componentOriginal3fa50f77369b75df29651d5bd60f0643 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3fa50f77369b75df29651d5bd60f0643 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.single-error','data' => ['fieldName' => 'username']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('single-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['fieldName' => 'username']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3fa50f77369b75df29651d5bd60f0643)): ?>
<?php $attributes = $__attributesOriginal3fa50f77369b75df29651d5bd60f0643; ?>
<?php unset($__attributesOriginal3fa50f77369b75df29651d5bd60f0643); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3fa50f77369b75df29651d5bd60f0643)): ?>
<?php $component = $__componentOriginal3fa50f77369b75df29651d5bd60f0643; ?>
<?php unset($__componentOriginal3fa50f77369b75df29651d5bd60f0643); ?>
<?php endif; ?>

                        
                        <div class="flex xs:flex-col md:flex-row md:items-center gap-1">
                            <label for="password"
                                class="block font-medium text-gray-900 md:basis-28 xs:font-bold text-base">password:</label>
                            <input type="password" name="password" id="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full"
                                placeholder="Enter password" />
                        </div>
                        <?php if (isset($component)) { $__componentOriginal3fa50f77369b75df29651d5bd60f0643 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3fa50f77369b75df29651d5bd60f0643 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.single-error','data' => ['fieldName' => 'password']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('single-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['fieldName' => 'password']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3fa50f77369b75df29651d5bd60f0643)): ?>
<?php $attributes = $__attributesOriginal3fa50f77369b75df29651d5bd60f0643; ?>
<?php unset($__attributesOriginal3fa50f77369b75df29651d5bd60f0643); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3fa50f77369b75df29651d5bd60f0643)): ?>
<?php $component = $__componentOriginal3fa50f77369b75df29651d5bd60f0643; ?>
<?php unset($__componentOriginal3fa50f77369b75df29651d5bd60f0643); ?>
<?php endif; ?>
                    </div>
                    <div x-show="show"
                        class=" flex bg-gray-100 rounded-lg lg:py-10 xs:flex-col xs:gap-2  md:gap-4 xs:py-3 xs:px-3 lg:px-10 basis-1/2"
                        x-transition:enter="transition ease-out duration-700 transform"
                        x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0 "
                        x-transition:leave="transition ease-in duration-300 transform"
                        x-transition:leave-start="translate-x-0 " x-transition:leave-end="translate-x-full">
                        <h1 class="font-bold text-xl">Other Information</h1>
                        
                        <div class="flex xs:flex-col md:flex-row md:items-center gap-1">
                            <label for="date_of_birth"
                                class="block font-medium text-gray-900 md:basis-28 xs:font-bold text-base">birth-date:</label>
                            <input type="date" name="date_of_birth" id="date_of_birth"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full"
                                placeholder="Date Of Birth" value="<?php echo e(old('date_of_birth')); ?>" />
                        </div>

                        <?php if (isset($component)) { $__componentOriginal3fa50f77369b75df29651d5bd60f0643 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3fa50f77369b75df29651d5bd60f0643 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.single-error','data' => ['fieldName' => 'date_of_birth']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('single-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['fieldName' => 'date_of_birth']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3fa50f77369b75df29651d5bd60f0643)): ?>
<?php $attributes = $__attributesOriginal3fa50f77369b75df29651d5bd60f0643; ?>
<?php unset($__attributesOriginal3fa50f77369b75df29651d5bd60f0643); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3fa50f77369b75df29651d5bd60f0643)): ?>
<?php $component = $__componentOriginal3fa50f77369b75df29651d5bd60f0643; ?>
<?php unset($__componentOriginal3fa50f77369b75df29651d5bd60f0643); ?>
<?php endif; ?>

                        
                        <div class="flex xs:flex xs:flex-col md:flex-row gap-3">
                            <label for="date_of_birth"
                                class="block font-medium text-gray-900 md:basis-28 xs:font-bold text-base">gender:</label>
                            <div class="flex flex-row items-center gap-4">
                                <?php $__currentLoopData = Gender::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $isChecked = (int)old('gender') === $gender->value;
                                    ?>
                                    <label for="<?php echo e($gender->name); ?>"
                                        class="flex items-center gap-1 font-medium text-gray-900">
                                        <input id="<?php echo e($gender->name); ?>" type="radio" name="gender"
                                            value="<?php echo e($gender->value); ?>" <?php if($isChecked): echo 'checked'; endif; ?>
                                            class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300">
                                        <?php echo e($gender->name); ?>

                                    </label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <?php if (isset($component)) { $__componentOriginal3fa50f77369b75df29651d5bd60f0643 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3fa50f77369b75df29651d5bd60f0643 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.single-error','data' => ['fieldName' => 'gender']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('single-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['fieldName' => 'gender']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3fa50f77369b75df29651d5bd60f0643)): ?>
<?php $attributes = $__attributesOriginal3fa50f77369b75df29651d5bd60f0643; ?>
<?php unset($__attributesOriginal3fa50f77369b75df29651d5bd60f0643); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3fa50f77369b75df29651d5bd60f0643)): ?>
<?php $component = $__componentOriginal3fa50f77369b75df29651d5bd60f0643; ?>
<?php unset($__componentOriginal3fa50f77369b75df29651d5bd60f0643); ?>
<?php endif; ?>

                        
                        <div class="flex xs:flex-col md:flex-row md:items-center gap-1">
                            <label for="phone_number"
                                class="block font-medium text-gray-900 md:basis-28 xs:font-bold text-base">phone:</label>
                            <input type="text" name="phone_number" id="phone_number"
                                value="<?php echo e(old('phone_number')); ?>"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full"
                                placeholder="phone" />

                        </div>
                        <?php if (isset($component)) { $__componentOriginal3fa50f77369b75df29651d5bd60f0643 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3fa50f77369b75df29651d5bd60f0643 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.single-error','data' => ['fieldName' => 'phone_number']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('single-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['fieldName' => 'phone_number']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3fa50f77369b75df29651d5bd60f0643)): ?>
<?php $attributes = $__attributesOriginal3fa50f77369b75df29651d5bd60f0643; ?>
<?php unset($__attributesOriginal3fa50f77369b75df29651d5bd60f0643); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3fa50f77369b75df29651d5bd60f0643)): ?>
<?php $component = $__componentOriginal3fa50f77369b75df29651d5bd60f0643; ?>
<?php unset($__componentOriginal3fa50f77369b75df29651d5bd60f0643); ?>
<?php endif; ?>


                        
                        <div class="flex xs:flex-col md:flex-row md:items-center gap-1">
                            <label for="countries"
                                class="block font-medium text-gray-900 md:basis-28 xs:font-bold text-base">country:</label>
                            <select id="countries"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                name="country" x-model="country"
                                @change="cityList = window.CountryCityUtils.getCities(country)">
                                <option value="">Select Country</option>
                                <template x-for="country in countryList" :key="country">
                                    <option :value="country" x-text="country"
                                        :selected="country === '<?php echo e(old('country')); ?>'"></option>
                                </template>
                            </select>

                        </div>
                        <?php if (isset($component)) { $__componentOriginal3fa50f77369b75df29651d5bd60f0643 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3fa50f77369b75df29651d5bd60f0643 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.single-error','data' => ['fieldName' => 'country']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('single-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['fieldName' => 'country']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3fa50f77369b75df29651d5bd60f0643)): ?>
<?php $attributes = $__attributesOriginal3fa50f77369b75df29651d5bd60f0643; ?>
<?php unset($__attributesOriginal3fa50f77369b75df29651d5bd60f0643); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3fa50f77369b75df29651d5bd60f0643)): ?>
<?php $component = $__componentOriginal3fa50f77369b75df29651d5bd60f0643; ?>
<?php unset($__componentOriginal3fa50f77369b75df29651d5bd60f0643); ?>
<?php endif; ?>

                        
                        <template x-if="country != '' || sessionHasErrors">
                            <div class="flex xs:flex-col md:flex-row md:items-center gap-1">
                                <label for="city"
                                    class="block font-medium text-gray-900 md:basis-28 xs:font-bold text-base">city:</label>
                                <select id="city"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    name="city" x-model="city">
                                    <option value="">select city</option>
                                    <template x-for="city in cityList" :key="city">
                                        <option :value="city" x-text="city"
                                            :selected="city === '<?php echo e(old('city')); ?>'"></option>
                                    </template>
                                </select>

                            </div>

                        </template>

                        <?php if (isset($component)) { $__componentOriginal3fa50f77369b75df29651d5bd60f0643 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3fa50f77369b75df29651d5bd60f0643 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.single-error','data' => ['fieldName' => 'city']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('single-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['fieldName' => 'city']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3fa50f77369b75df29651d5bd60f0643)): ?>
<?php $attributes = $__attributesOriginal3fa50f77369b75df29651d5bd60f0643; ?>
<?php unset($__attributesOriginal3fa50f77369b75df29651d5bd60f0643); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3fa50f77369b75df29651d5bd60f0643)): ?>
<?php $component = $__componentOriginal3fa50f77369b75df29651d5bd60f0643; ?>
<?php unset($__componentOriginal3fa50f77369b75df29651d5bd60f0643); ?>
<?php endif; ?>
                    </div>
                </div>
                <div x-show="show" x-transition:enter="transition ease-out duration-1000"
                    x-transition:enter-start="transform translate-y-[1200px] scale-75 opacity-70"
                    x-transition:enter-end="transform translate-y-0 scale-100 opacity-100"
                    x-transition:leave="transition ease-in duration-1000"
                    x-transition:leave-start="transform translate-y-0 scale-100 opacity-100"
                    x-transition:leave-end="transform translate-y-[1200px] scale-75 opacity-0"
                    class="flex bg-gray-100 rounded-lg lg:py-10 xs:flex-col xs:gap-2 xl:px-10  md:gap-4 xs:py-3 xs:px-3  basis-1/2">
                    
                    <h1 class="font-bold text-xl">Address Information</h1>
                    <div class="flex xs:flex-col md:flex-row md:items-center gap-4">
                        <label for="street"
                            class="block font-medium text-gray-900 xs:font-bold md:basis-[5.5rem] text-base">street:</label>
                        <input type="text" name="street" id="street" value="<?php echo e(old('street')); ?>"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full"
                            placeholder="street" />
                    </div>
                    <div class="flex xs:flex-col md:flex-row md:items-center gap-3 xs:w-full">
                        
                        <div class="flex xs:flex-col md:flex-row md:items-center xs:basis-full">
                            <label for="state"
                                class="block font-medium text-gray-900 xs:font-bold md:basis-28 text-base">state/province:</label>
                            <input type="text" name="state" id="state" value="<?php echo e(old('state')); ?>"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full"
                                placeholder="state" />
                        </div>
                        
                        <div class="flex xs:flex-col md:flex-row md:items-center xs:basis-full">
                            <label for="zipCode"
                                class="block font-medium text-gray-900 xs:font-bold md:basis-28 text-base">zipCode:</label>
                            <input type="text" name="zip_code" id="zipCode" value="<?php echo e(old('zip_code')); ?>"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full"
                                placeholder="zipCode" />
                        </div>
                    </div>
                </div>
                <div x-show="show" x-transition:enter="transition ease-out duration-1000"
                    x-transition:enter-start="transform translate-y-[1200px] scale-75 opacity-70"
                    x-transition:enter-end="transform translate-y-0 scale-100 opacity-100"
                    x-transition:leave="transition ease-in duration-1000"
                    x-transition:leave-start="transform translate-y-0 scale-100 opacity-100"
                    x-transition:leave-end="transform translate-y-[1200px] scale-75 opacity-0"
                    class="flex bg-gray-100 rounded-lg lg:py-10 xs:flex-col xs:gap-2 xl:px-10  md:gap-4 xs:py-3 xs:px-3  basis-1/2">
                    
                    <h1 class="font-bold text-xl">Social Information</h1>
                    <div class="flex xs:flex-col md:flex-row md:items-center gap-4">
                        <label for="website"
                            class="block font-medium text-gray-900 xs:font-bold md:basis-[5.5rem] text-base">website:</label>
                        <input type="text" name="website" id="website" value="<?php echo e(old('website')); ?>"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full"
                            placeholder="website" />
                    </div>
                    <?php if (isset($component)) { $__componentOriginal3fa50f77369b75df29651d5bd60f0643 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3fa50f77369b75df29651d5bd60f0643 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.single-error','data' => ['fieldName' => 'website']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('single-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['fieldName' => 'website']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3fa50f77369b75df29651d5bd60f0643)): ?>
<?php $attributes = $__attributesOriginal3fa50f77369b75df29651d5bd60f0643; ?>
<?php unset($__attributesOriginal3fa50f77369b75df29651d5bd60f0643); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3fa50f77369b75df29651d5bd60f0643)): ?>
<?php $component = $__componentOriginal3fa50f77369b75df29651d5bd60f0643; ?>
<?php unset($__componentOriginal3fa50f77369b75df29651d5bd60f0643); ?>
<?php endif; ?>
                    <div class="flex xs:flex-col md:flex-row md:items-center gap-3 xs:w-full">
                        <div class="basis-1/2">
                            
                            <div class="flex xs:flex-col md:flex-row md:items-center xs:basis-full">
                                <label for="twitter-profile"
                                    class="block font-medium text-gray-900 xs:font-bold md:basis-28 text-base">twitter:</label>
                                <input type="text" name="x_url" id="twitter-profile" value="<?php echo e(old('x_url')); ?>"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full"
                                    placeholder="x_url" />

                            </div>
                            <?php if (isset($component)) { $__componentOriginal3fa50f77369b75df29651d5bd60f0643 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3fa50f77369b75df29651d5bd60f0643 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.single-error','data' => ['fieldName' => 'x_url']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('single-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['fieldName' => 'x_url']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3fa50f77369b75df29651d5bd60f0643)): ?>
<?php $attributes = $__attributesOriginal3fa50f77369b75df29651d5bd60f0643; ?>
<?php unset($__attributesOriginal3fa50f77369b75df29651d5bd60f0643); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3fa50f77369b75df29651d5bd60f0643)): ?>
<?php $component = $__componentOriginal3fa50f77369b75df29651d5bd60f0643; ?>
<?php unset($__componentOriginal3fa50f77369b75df29651d5bd60f0643); ?>
<?php endif; ?>
                        </div>
                        <div class="basis-1/2">
                            
                            <div class="flex xs:flex-col md:flex-row md:items-center xs:basis-full">
                                <label for="Instagram"
                                    class="block font-medium text-gray-900 xs:font-bold md:basis-28 text-base">instagram:</label>
                                <input type="text" name="instagram_url" id="Instagram"
                                    value="<?php echo e(old('instagram_url')); ?>"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 xs:basis-full"
                                    placeholder="instagram_url" />

                            </div>
                            <?php if (isset($component)) { $__componentOriginal3fa50f77369b75df29651d5bd60f0643 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3fa50f77369b75df29651d5bd60f0643 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.single-error','data' => ['fieldName' => 'instagram_url']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('single-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['fieldName' => 'instagram_url']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3fa50f77369b75df29651d5bd60f0643)): ?>
<?php $attributes = $__attributesOriginal3fa50f77369b75df29651d5bd60f0643; ?>
<?php unset($__attributesOriginal3fa50f77369b75df29651d5bd60f0643); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3fa50f77369b75df29651d5bd60f0643)): ?>
<?php $component = $__componentOriginal3fa50f77369b75df29651d5bd60f0643; ?>
<?php unset($__componentOriginal3fa50f77369b75df29651d5bd60f0643); ?>
<?php endif; ?>
                        </div>



                    </div>
                </div>
                <div class="flex flex-row justify-end items-center gap-2 xs:mt-5">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">
                        submit
                    </button>
                </div>

            </form>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\minar\projects\blog\resources\views/dashboard/users/create.blade.php ENDPATH**/ ?>