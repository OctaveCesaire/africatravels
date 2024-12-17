<?php $__env->startSection('title', 'Events'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container py-5">
        <h1 class="mb-4">Événements</h1>
        <div class="row">
            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <img src="<?php echo e($event->image); ?>" class="card-img-top" alt="<?php echo e($event->title); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($event->title); ?></h5>
                            <p class="card-text"><?php echo e(Str::limit($event->description, 100)); ?></p>
                            <a href="<?php echo e(route('event.details', $event->id)); ?>" class="btn btn-primary">View More</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vortex/Public/elites/afric/resources/views/pages/events.blade.php ENDPATH**/ ?>