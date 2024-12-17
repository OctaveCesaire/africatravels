<?php $__env->startSection('title', 'Agencies'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container py-5">
        <h1 class="mb-4">Agences de Tourisme</h1>
        <div class="row">
            <?php $__currentLoopData = $agencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <img src="<?php echo e($agency->image); ?>" class="card-img-top" alt="<?php echo e($agency->name); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($agency->name); ?></h5>
                            <p class="card-text"><?php echo e(Str::limit($agency->description, 100)); ?></p>
                            <a href="<?php echo e(route('agency.details', $agency->id)); ?>" class="btn btn-primary">View More</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vortex/Public/elites/afric/resources/views/pages/agencies.blade.php ENDPATH**/ ?>