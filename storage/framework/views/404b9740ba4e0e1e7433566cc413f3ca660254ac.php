<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.clients.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div  class="my-9" style="background-color:#F4F7FE">
        <!-- Entête -->
        <header class="d-flex align-items-center justify-content-center flex-column text-center text-white">
            <h1 class="text-white">Qui sommes-nous</h1>
        </header>

        <!-- Missions -->
        <div class="container position-relative mb-2 d-flex align-items-center justify-content-center flex-column text-center shadow-lg card" style="margin-top: -160px; z-index: 1;background-color:#F4F7FE">
            <h3 style="font-style: italic;font-family:'Playfair Display', Sans-serif;color:#00441A;">Explorez avec Toffa Travels : Une Aventure Authentique</h3>
            <hr/>
            <p>Découvrez notre passion pour les trésors cachés du Bénin et au-delà, et laissez-nous vous guider à travers des expériences de voyage uniques et enrichissantes.</p>
            <div class="container mt-2">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">

                    <div class="col mb-3">
                        <div class="card h-100 shadow-lg">
                            <img src="<?php echo e(asset('assets/pages/P_history_icon_lightgoldenred.png')); ?>" class="card-img-top mx-auto mt-3 rounded-circle" style="width: 150px;" alt="Image de la carte">
                            <div class="card-body">
                                <h5 class="card-title fw-bold text-center">Notre Histoire</h5>
                                <p class="card-text text-sm text-center">
                                    Toffa Travels a vu le jour il y a plusieurs années, dans le cœur d'un passionné de découvertes et d'un guide touristique amoureux des trésors cachés du Bénin. Animés par une vision commune, ils ont rêvé de créer des expériences de voyage uniques et mémorables. L'histoire de Toffa Travels est une histoire de passion partagée pour la découverte, l'aventure et la richesse culturelle. Depuis nos débuts, nous avons parcouru un chemin impressionnant, tout en restant fidèles à nos valeurs fondamentales : offrir un service client exceptionnel, innover constamment et respecter l'environnement et les cultures locales.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="card h-100 shadow-lg">
                            <img src="<?php echo e(asset('assets/pages/mission.jpg')); ?>" class="card-img-top mx-auto mt-3 rounded-circle" style="width: 150px;" alt="Image de la carte">
                            <div class="card-body">
                                <h5 class="card-title fw-bolder text-center">Missions</h5>
                                <p class="card-text text-sm text-center">
                                    Depuis sa création, Toffa Travels s’est engagée à offrir des expériences de voyage immersives et authentiques au cœur du Bénin. Notre mission est de révéler les trésors cachés de ce pays fascinant en alliant passion pour l'aventure et respect des traditions locales. Nous avons à cœur de proposer des séjours inoubliables en innovant constamment, en préservant l'environnement et en honorant les cultures locales. Avec chaque voyage, nous visons à enrichir nos clients par la découverte et à les connecter profondément avec la richesse culturelle du Bénin.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="card h-100 shadow-lg">
                            <img src="<?php echo e(asset('assets/pages/vision.webp')); ?>" class="card-img-top mx-auto mt-3 rounded-circle" style="width: 150px;" alt="Image de la carte">
                            <div class="card-body">
                                <h5 class="card-title fw-bold text-center">Notre Vision</h5>
                                <p class="card-text text-sm text-center">
                                    Est de devenir le partenaire de voyage de choix pour les explorateurs du monde entier, en offrant une gamme diversifiée de circuits personnalisés. Nous aspirons à être reconnus comme une agence de voyage innovante, éthique et respectueuse de l'environnement. À travers notre passion pour le voyage et notre engagement envers l'excellence, nous visons à inspirer un amour pour l'aventure et à créer des liens durables entre les personnes et les destinations à travers le monde.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vortex/Public/elites/africatravels/resources/views/pages/clients/about-us.blade.php ENDPATH**/ ?>