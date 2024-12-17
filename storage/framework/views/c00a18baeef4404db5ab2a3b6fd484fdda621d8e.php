
<!-- End Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #00441B">
    <div class="container-fluid">
        <a class="navbar-brand  text-white" href="#"><?php echo e(env('APP_NAME')); ?></a>
        <button class="navbar-toggler border-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars text-white py-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active text-white <?php echo e(Route::is('dash') ? 'active bg-info rounded' : ''); ?>" aria-current="page" href="<?php echo e(route('dash')); ?>">Tableau De Bord</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?php echo e(Route::is('event') ? 'active bg-info rounded' : ''); ?>" href="<?php echo e(route('event')); ?>">Evenements</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?php echo e(Route::is('tansactions') ? 'active bg-info rounded' : ''); ?>" href="<?php echo e(route('tansactions')); ?>">Tansactions</a>
                </li>
            </ul>
      </div>
    </div>
</nav><?php /**PATH /home/vortex/Public/elites/africatravels/resources/views/layouts/managers/navbar.blade.php ENDPATH**/ ?>