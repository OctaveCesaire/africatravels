<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.clients.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <header class=" bg-light d-flex align-items-center justify-content-center text-center text-white py-4">
        <h1 id="destination">Nos Prochaines Activités</h1>
    </header>
    <div class="bg-secondary py-4">
        <div class="col-12 row">
            <?php if($list->count() > 0): ?>
                <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $elt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-3">
                        <div class="card mb-2" >
                            <img src="https://toffatravels.com/assets/upload/bannieres/1728053209.jpeg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="card-title row">
                                    <div class="col-md-6 my-auto">
                                        <?php echo e($elt->titre); ?>

                                    </div>
                                    <div class="col-md-6 my-auto">
                                        <?php echo e($elt->eventDate); ?>

                                    </div>                                
                                </div>
                                <input type="button" value="Détail" data-id="<?php echo e($elt->id); ?>" class="btn btn-outline-primary detail">
                            </div>
                        </div>
                    </div>           
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="card" style="width:42rem;">
                        <img src="<?php echo e(asset('assets/img/no trip.png')); ?>" class="card-img-top" alt="...">
                    </div>
                </div>
            <?php endif; ?>

            
        </div>
    </div>
    
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script>
        $(document).on('click','.detail',function(){
            var id = $(this).data('id');
            $.ajax({
                url : 'api/info/'+id,
                type: 'GET',
                success: (data)=>{
                    swal({
                        title : data.titre,
                        content:{
                            element: 'div',
                            attributes:{
                                innerHTML:`
                                
                                    <div class="row col-12">
                                        <div class="col-5">
                                            Galerie
                                        </div>
                                        <div class="col-7">
                                            <div class="row">
                                                <div class="col-6">
                                                    ${data.eventDate}
                                                </div>
                                                <div class="col-6">
                                                    Prix
                                                </div>
                                            </div>
                                            <input type="hidden" name="id" data-id="${data.id}">
                                            ${data.description || "Aucune description disponible"}
                                        </div>
                                    </div>
                                `
                            }
                        },
                        buttons:{
                            cancel :{
                                text: "Fermer",
                                value: true,
                                visible: true
                            },
                            confirm:{
                                text: "Reserver ma place",
                                className: 'reserved',
                                closeModal: false
                            }
                        }
                    }).then((value)=>{
                        swal({
                            title : "Réservation en cours" + data.id,
                            text : "Effectuer ma réservation avec Stripe Ou PayPal ou Feedapay",
                            button:{
                                text : "OK",
                            }

                        })
                    })
                },
                error: function(){
                    swal('error','Erreur lors de l\'affichage des informations','error')
                }
            })
        })

        // $(document).on('click','.reserved',(){

        // })

    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('pages.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vortex/Public/elites/africatravels/resources/views/pages/clients/voyages.blade.php ENDPATH**/ ?>