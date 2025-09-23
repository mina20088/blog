;

<?php $__env->startSection('content'); ?>

    <nav aria-label="Page navigation example">
        <ul class="flex items-center -space-x-px h-8 text-sm">
            <?php if($paginator->onFirstPage()): ?>
                <button type="button" disabled
                    class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg">
                    <span class="sr-only">Previous</span>
                    Previous
                </button>
            <?php else: ?>
                <a href="#"
                    class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <span class="sr-only">Previous</span>
                    Previous
                </a>
            <?php endif; ?>
        </ul>

    </nav>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.paginator', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\minar\projects\blog\resources\views/paginator/paginator.blade.php ENDPATH**/ ?>