<?php $__env->startSection('content'); ?>
    <main class="main-content position-relative max-height-vh-100 h-100 ">
        <?php echo $__env->make('layouts.managers.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="py-4 px-1">
            <div class="card bg-dark shadow">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5 class="my-auto">LES TRANSACTIONS</h5>
                        <span class="my-auto badge bg-info">
                            Note : >= 4.5
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table ">
                        <thead>
                            <th class="text-start" scope="col">#</th>
                            <th class="text-center" scope="col">Nom</th>
                            <th class="text-center" scope="col">Status</th>
                            <th class="text-center" scope="col">Evènements</th>
                            <th class="text-center" scope="col">Date paiement </th>
                        </thead>
                        <tbody>
                            <?php if($list->count() > 0): ?>
                                <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $elt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="my-auto text-start" scope="row">
                                            <i class="fas fa-eye fa-xs btn btn-xs btn-outline-info consult" data-id="<?php echo e($elt->id); ?>"></i>
                                        </td>
                                        <td class="my-auto text-center"><?php echo e($elt->titre); ?></td>
                                        <td class="my-auto text-center">
                                            
                                                <span class="badge bg-warning">à venir</span>
                                            
                                                <span class="badge bg-success">lancer</span>
                                            
                                                <span class="badge bg-danger">finir</span>
                                            
                                        </td>
                                        <td class="my-auto text-center">
                                            <span class="text-muted badge bg-secondary rounded">Evenement</span>
                                        </td>
                                        <td class="my-auto text-center"><span class="text-white">12 Dec 2023</span></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                            <?php else: ?>
                                <tr class="text-center modal">
                                    Aucunes transactions enregistrer
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <img src="" alt="">
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script>
        function isJsonEmpty(json) {
            if (json === null || json === undefined) {
                return true; // JSON est null ou undefined
            }

            if (typeof json === 'object') {
                if (Array.isArray(json)) {
                    return json.length === 0; // Vérifie si c'est un tableau vide
                }
                return Object.keys(json).length === 0; // Vérifie si c'est un objet sans clés
            }

            // Si ce n'est pas un objet ou tableau, ce n'est pas du JSON
            return true;
        }
        function showModal(data, isReadonly) {
            const readonlyAttr = isReadonly ? 'readonly' : '';
            return swal({
                title: isReadonly ? "Détail de la transaction" : "Mise à jour de l'Événement",
                content: {
                    element: 'div',
                    attributes: {
                        innerHTML: `
                            <fieldset class="row col-12 border mb-2">
                                <legend class="col-12">INFORMATION SUR L'EVENEMENT</legend>
                                <div class="col-4 mb-2">
                                    <label>Evèneemnt</label>
                                    <input type="text" id="titre" class="text-center form-control" ${readonlyAttr} value="${data.titre || ''}">
                                </div>
                                <div class="col-4 mb-2">
                                    <label>Date</label>
                                    <input type="datetime-local" id="date" class="text-center form-control" ${readonlyAttr} value="${data.eventDate || ''}">
                                </div>
                                <div class="col-4 mb-2">
                                    <label>Prix</label>
                                    <input type="number" id="prix" min="0" class="form-control" ${readonlyAttr} value="${data.prix || ''}">
                                </div>
                            </fieldset>
                            <fieldset class="row col-12 border mb-2">
                                <legend class="col-12">INFORMATION SUR PARTICIPANT(S)</legend>
                                <ul class="list-group list-group-numbered">
                                    
                                    <li class="list-group-item">Nom du particitant</li>
                                </ul>
                            </fieldset>
                        `
                    }
                } 
            });
        }
        function handleAjaxError(xhr) {
            if (xhr.status === 404) {
                swal({ text: "Événement introuvable.", icon: 'error' });
            } else if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                let errorMessage = Object.values(errors).map(err => err[0]).join('<br>');
                swal({ title: "Erreur de validation", content: { element: 'div', attributes: { innerHTML: errorMessage } }, icon: 'error' });
            } else {
                swal({ text: "Une erreur est survenue.", icon: 'warning' });
            }
        }
        $(document).on('click', '.consult', function () {
            var id = $(this).data('id'); // Récupère l'ID de l'événement
            $.ajax({
                url: '/api/print-specific-event/' + id,
                type: 'GET',
                success: function (response) {
                    if (!response) {
                        swal({ text: "Aucune donnée disponible.", icon: 'error' });
                        return;
                    }
                    showModal(response, true);
                },
                error: function (xhr) {
                    handleAjaxError(xhr);
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('pages.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vortex/Public/elites/africatravels/resources/views/pages/managers/transaction.blade.php ENDPATH**/ ?>