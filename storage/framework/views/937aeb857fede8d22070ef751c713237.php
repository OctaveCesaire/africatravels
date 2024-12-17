<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <h1>Sites Touristiques</h1>
    <div class="row">
        <?php $__currentLoopData = $sites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $site): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="<?php echo e($site->image); ?>" class="card-img-top" alt="<?php echo e($site->title); ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($site->title); ?></h5>
                    <p class="card-text"><?php echo e(Str::limit($site->description, 100)); ?></p>
                    <a href="<?php echo e(route('tourist.site.details', $site->id)); ?>" class="btn btn-primary">View More</a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vortex/Public/elites/afric/resources/views/pages/tourist-sites.blade.php ENDPATH**/ ?>