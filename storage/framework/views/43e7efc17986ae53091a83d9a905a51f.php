<?php if (isset($component)) { $__componentOriginal91fdd17964e43374ae18c674f95cdaa3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3 = $attributes; } ?>
<?php $component = App\View\Components\AdminLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AdminLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Edit Book')); ?>: <?php echo e($book->title); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <?php if($errors->any()): ?>
                        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                            <div class="font-bold"><?php echo e(__('Whoops! Something went wrong.')); ?></div>
                            <ul class="mt-3 list-disc list-inside text-sm">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(route('admin.books.update', $book)); ?>" enctype="multipart/form-data" class="space-y-6">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input id="title" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm" type="text" name="title" value="<?php echo e(old('title', $book->title)); ?>" required autofocus />
                        </div>
                        <div>
                            <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                            <input id="author" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm" type="text" name="author" value="<?php echo e(old('author', $book->author)); ?>" required />
                        </div>
                        <div>
                            <label for="isbn" class="block text-sm font-medium text-gray-700">ISBN</label>
                            <input id="isbn" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm" type="text" name="isbn" value="<?php echo e(old('isbn', $book->isbn)); ?>" required />
                        </div>
                        <div>
                            <label for="genre" class="block text-sm font-medium text-gray-700">Genre</label>
                            <input id="genre" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm" type="text" name="genre" value="<?php echo e(old('genre', $book->genre)); ?>" />
                        </div>
                        <div>
                            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                            <input id="quantity" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm" type="number" name="quantity" value="<?php echo e(old('quantity', $book->quantity)); ?>" required />
                        </div>
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea id="description" name="description" rows="4" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm"><?php echo e(old('description', $book->description)); ?></textarea>
                        </div>
                        <div>
                            <label for="cover_image" class="block text-sm font-medium text-gray-700">Cover Image</label>
                            <input id="cover_image" class="block mt-1 w-full" type="file" name="cover_image" />
        
                            <?php if($book->cover_image): ?>
                                <div class="mt-4">
                                    <img src="<?php echo e(asset('storage/' . $book->cover_image)); ?>" alt="<?php echo e($book->title); ?>" class="w-32 h-auto rounded">
                                    <p class="text-xs text-gray-500 mt-1">Current Cover</p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <a href="<?php echo e(route('admin.books.index')); ?>" class="text-sm text-gray-600 hover:text-gray-900 underline mr-4">Cancel</a>
                            <button type="submit" class="px-4 py-2 bg-gray-800 text-white rounded-md">Update Book</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal91fdd17964e43374ae18c674f95cdaa3)): ?>
<?php $attributes = $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3; ?>
<?php unset($__attributesOriginal91fdd17964e43374ae18c674f95cdaa3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal91fdd17964e43374ae18c674f95cdaa3)): ?>
<?php $component = $__componentOriginal91fdd17964e43374ae18c674f95cdaa3; ?>
<?php unset($__componentOriginal91fdd17964e43374ae18c674f95cdaa3); ?>
<?php endif; ?><?php /**PATH C:\Users\youss\OneDrive\Desktop\full-php\xampp\htdocs\code\project\online-library-laravel\resources\views/admin/books/edit.blade.php ENDPATH**/ ?>