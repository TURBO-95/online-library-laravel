<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e($book->title); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Book Cover -->
                    <div class="md:col-span-1">
                        <div class="h-96 bg-gray-200 flex items-center justify-center rounded-lg">
                            <?php if($book->cover_image): ?>
                                <img src="<?php echo e(asset('storage/' . $book->cover_image)); ?>" alt="<?php echo e($book->title); ?>" class="w-full h-full object-cover rounded-lg">
                            <?php else: ?>
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center rounded-lg">
                                    <span class="text-gray-500">No Image Available</span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Book Details & Actions -->
                    <div class="md:col-span-2">
                        <h2 class="text-3xl font-bold text-gray-900"><?php echo e($book->title); ?></h2>
                        <p class="text-lg text-gray-600 mt-2">by <?php echo e($book->author); ?></p>
                        
                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-6">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Genre</dt>
                                    <dd class="mt-1 text-sm text-gray-900"><?php echo e($book->genre ?: 'N/A'); ?></dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">ISBN</dt>
                                    <dd class="mt-1 text-sm text-gray-900"><?php echo e($book->isbn); ?></dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Copies Available</dt>
                                    <dd class="mt-1 text-sm font-bold <?php echo e($book->quantity > 0 ? 'text-green-600' : 'text-red-600'); ?>">
                                        <?php echo e($book->quantity); ?>

                                    </dd>
                                </div>
                            </dl>
                        </div>

                        <div class="mt-6">
                            <h4 class="text-sm font-medium text-gray-500">Description</h4>
                            <p class="mt-2 text-gray-700 leading-relaxed"><?php echo e($book->description ?: 'No description available.'); ?></p>
                        </div>
                        
                        <!-- Borrow Action -->
                        <div class="mt-8 pt-8 border-t border-gray-200">
                            <?php if($book->quantity > 0): ?>
                                <form action="<?php echo e(route('books.borrow', $book)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700">
                                        Borrow this Book
                                    </button>
                                </form>
                            <?php else: ?>
                                <button class="w-full sm:w-auto px-6 py-3 bg-gray-400 text-white font-semibold rounded-md cursor-not-allowed" disabled>
                                    Currently Unavailable
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <a href="<?php echo e(route('books.index')); ?>" class="text-indigo-600 hover:text-indigo-900">← Back to Library</a>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\Users\youss\OneDrive\Desktop\full-php\xampp\htdocs\code\project\online-library-laravel\resources\views/student/books/show.blade.php ENDPATH**/ ?>