<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/dashboard.js', 'resources/css/app.css']); ?>


</head>

<body>
    <section class="flex justify-between items-center my-9">
        <div>
            <?php if($paginator->hasPages()): ?>
                <nav aria-label="Page navigation example">
                    <ul class="flex items-center -space-x-px h-8 text-sm">

                        
                        <?php if($paginator->onFirstPage()): ?>
                            <li>
                                <button type="button" disabled
                                    class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s">
                                    <span class="sr-only">Previous</span>
                                    <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 1 1 5l4 4" />
                                    </svg>
                                </button>

                            </li>
                        <?php else: ?>
                            <li>
                                <a href="<?php echo e($paginator->previousPageUrl()); ?>"
                                    class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <span class="sr-only">Previous</span>
                                    Previous
                                </a>
                            </li>

                        <?php endif; ?>

                        
                        <?php
                            $onEachSide = 3; // Set your desired number
                            $currentPage = $paginator->currentPage();
                            $lastPage = $paginator->lastPage();

                            // Calculate start and end pages
                            $start = max($currentPage - $onEachSide, 1);
                            $end = min($currentPage + $onEachSide, $lastPage);

                            // Adjust if we're near the beginning or end
                            if ($end - $start < $onEachSide * 2) {
                                if ($start == 1) {
                                    $end = min($start + ($onEachSide * 2), $lastPage);
                                } else {
                                    $start = max($end - ($onEachSide * 2), 1);
                                }
                            }
                        ?>



                        
                        <?php if($start > 1): ?>
                            <li class="xs:hidden md:flex">
                                <a href="<?php echo e($paginator->url(1)); ?>"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">1</a>
                            </li>
                            <?php if($start > 2): ?>
                                <li class="xs:hidden md:flex">
                                    <span
                                        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300">...</span>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>

                        
                        <?php $__currentLoopData = range($start, $end); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="xs:hidden md:flex">
                                <?php if($page === $currentPage): ?>
                                    <span
                                        class="flex items-center justify-center px-3 h-8 leading-tight text-blue-600 border border-blue-300 bg-blue-50"><?php echo e($page); ?></span>
                                <?php else: ?>
                                    <a href="<?php echo e($paginator->url($page)); ?>"
                                        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700"><?php echo e($page); ?></a>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        
                        <?php if($end < $lastPage): ?>
                            <?php if($end < $lastPage - 1): ?>
                                <li class="xs:hidden md:flex">
                                    <span
                                        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300">...</span>
                                </li>
                            <?php endif; ?>
                            <li class="xs:hidden md:flex">
                                <a href="<?php echo e($paginator->url($lastPage)); ?>"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700"><?php echo e($lastPage); ?></a>
                            </li>
                        <?php endif; ?>


                        
                        <?php if($paginator->hasMorePages()): ?>
                            <li>
                                <a href="<?php echo e($paginator->nextPageUrl()); ?>"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <span class="sr-only">Next</span>
                                    <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                </a>
                            </li>
                        <?php else: ?>
                            <li>
                                <button type="button" disabled
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg">
                                    <span class="sr-only">Next</span>
                                    <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                </button>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            <?php endif; ?>
        </div>
        <div class='flex items-center gap-4'>
            <form method="GET" action="<?php echo e(route('dashboard.users')); ?>" class="m-0">
                <select id="perPageSelect" onchange="this.form.submit()" name="per_page"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                    <option value="">Items per page</option>
                    <option value="5" <?php echo e(request('per_page') == 5 ? 'selected' : ''); ?>>5 per page</option>
                    <option value="10" <?php echo e(request('per_page') == 10 ? 'selected' : ''); ?>>10 per page</option>
                    <option value="25" <?php echo e(request('per_page') == 25 ? 'selected' : ''); ?>>25 per page</option>
                    <option value="50" <?php echo e(request('per_page') == 50 ? 'selected' : ''); ?>>50 per page</option>
                </select>
            </form>

            <span class="text-sm text-gray-700 dark:text-gray-400">
                Showing <span class="font-semibold text-gray-900 dark:text-white">1</span> to <span
                    class="font-semibold text-gray-900 dark:text-white"><?php echo e($paginator->count()); ?></span> of <span
                    class="font-semibold text-gray-900 dark:text-white"><?php echo e($paginator->total()); ?></span> Entries
            </span>

        </div>

    </section>

</body>

</html>
<?php /**PATH C:\Users\minar\projects\blog\resources\views/layouts/paginator.blade.php ENDPATH**/ ?>