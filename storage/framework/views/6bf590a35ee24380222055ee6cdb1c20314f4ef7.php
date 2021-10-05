<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Update <?php echo e($client->name); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <?php if($errors->any()): ?>
        <div class="container mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>

    <div class="container mx-auto bg-white max-w-3xl flex justify-center p-12 my-4 shadow-sm sm:rounded-lg">
        <form action="<?php echo e(route('client.update', $client->id )); ?>" method="post" class="w-full">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            <div class="row mb-8 w-full">
                <input type="text" name="name" class="form-control w-full text-3xl border-0 border-b p-2"
                    placeholder="Name" value="<?php echo e($client->name); ?>" />
            </div>

            <div class="row text-center">
                <button type="submit button" class="btn btn-primary bg-black text-white px-12 py-2">Update</button>
            </div>
        </form>
    </div>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/resources/views/client/edit.blade.php ENDPATH**/ ?>