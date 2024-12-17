<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="jumbotron bg-light text-center py-5">
    <h1>Bienvenue sur Tourism and Events</h1>
    <p class="lead">Découvrez les meilleurs sites touristiques et évènements culturels.</p>
    <a href="<?php echo e(route('tourist.sites')); ?>" class="btn btn-primary">Explorer les sites touristiques</a>
    <a href="<?php echo e(route('events')); ?>" class="btn btn-secondary">Voir les événements</a>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vortex/Public/elites/afric/resources/views/pages/home.blade.php ENDPATH**/ ?>