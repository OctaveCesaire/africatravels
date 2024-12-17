<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $__env->yieldContent('title', 'Tourism and Events'); ?></title>

        <?php echo app('Illuminate\Foundation\Vite')('resources/sass/app.scss'); ?>

        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
        <style>
            .navbar-nav img {
            border-radius: 50%;
            width: 30px;
            height: 30px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(route('home')); ?>">TourismSite</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('about')); ?>">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('tourist.sites')); ?>">Tourist Sites</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('agencies')); ?>">Agency</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('events')); ?>">Events</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('gallery')); ?>">Galleries</a></li>
                    </ul>
                    <ul class="navbar-nav">
                        <?php if(auth()->guard()->check()): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">
                                <img src="<?php echo e(Auth::user()->profile_picture ?: 'default.png'); ?>" alt="User">
                                <?php echo e(Auth::user()->username); ?>

                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
                                <li><a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                            </ul>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;"><?php echo csrf_field(); ?></form>
                        </li>
                        <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('login')); ?>">Login/Register</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
        
        <?php echo app('Illuminate\Foundation\Vite')('resources/js/bootstrap.js'); ?>

        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
    </body>
</html>
<?php /**PATH /home/vortex/Public/elites/afric/resources/views/layouts/app.blade.php ENDPATH**/ ?>