<?php $__env->startSection('title', 'Gallery'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container py-5">
        <h1 class="mb-4">Galeries</h1>
        <div class="row">
            <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?php echo e($image->url); ?>" class="card-img-top" alt="Gallery Image">
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vortex/Public/elites/afric/resources/views/pages/gallery.blade.php ENDPATH**/ ?>