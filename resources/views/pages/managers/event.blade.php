<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100">
        <div class="py-3 px-1">
            <div class="card bg-dark shadow">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5 class="my-auto">MES EVENEMENTS</h5>
                        <span class="btn my-auto btn-add btn-outline-info" data-bs-toggle="modal" data-bs-target="#addEventModal">
                            <i class="ni ni-fat-add"></i>
                        </span>
                    </div>
                </div>
                <div class="card-body table-responsive">
                
                    <table id="dataTable" class="table table-hover">               
                        @if ($list->count() > 0)
                            <thead>
                                <tr>
                                    @foreach($list->first()->getAttributes() as $key => $value)
                                        <th class="text-center" scope="col">{!! $key == 'id' ? "#" : $key !!}</th>
                                    @endforeach
                                    <th class="text-center">{{ __('Nbr participant') }}</th>
                                    <th class="actions text-center">{{ __('ACTIONS') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($list as $data)
                                    @foreach ($list as $elt)
                                        <tr>
                                            <td class="my-auto text-center" scope="row">
                                                {{$elt->id}}
                                            </td>
                                            <td class="my-auto text-center">{{ $elt->titre }}</td>
                                            <td class="my-auto text-center">
                                                @if ($elt->status === 'coming')
                                                    <span class="badge bg-warning">à venir</span>
                                                @elseif ($elt->status === 'launch')
                                                    <span class="badge bg-success">lancer</span>
                                                @elseif ($elt->status === 'done')
                                                    <span class="badge bg-danger">finir</span>
                                                @endif
                                            </td>
                                            <td class="my-auto text-center">
                                                <span class="text-white">12 Dec 2023</span>
                                            </td>
                                            <td class="my-auto text-center">
                                                <span class="text-muted badge bg-secondary rounded">12</span>
                                            </td>
                                            <td class="my-auto text-center" scope="row">
                                                <i class="ni ni-zoom-split-in fa-xs btn btn-xs btn-outline-info consult" data-id="{{ $elt->id }}"></i>
                                            </td>
                                        </tr>
                                    @endforeach                          
                                @endforeach
                            </tbody>
                        @else
                            <tr class="text-center alert">
                                Aucunes transactions enregistrer
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </main>

    @push('js')
        <script>
            // Fonction de vérification de tableau vide ou pas
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

            // Lorsque vous cliquez sur le bouton "Ajouter"
            $(document).on('click', '.btn-add', function () {
                swal({
                    title: "Créer un événement",
                    content: {
                        element: 'div',
                        attributes: {
                            innerHTML: `
                                <div class="row col-12">
                                    <div class="col-4 mb-2 my-auto">
                                        <label for="titre" class="form-label">Titre</label>
                                        <input type="text" name="titre" id="titre" class="form-control">
                                    </div>
                                    <div class="col-4 mb-2 my-auto">
                                        <label for="date" class="form-label">Date</label>
                                        <input type="datetime-local" name="date" id="date" class="form-control">
                                    </div>
                                    <div class="col-4 mb-2 my-auto">
                                        <label for="prix" class="form-label">Prix</label>
                                        <input type="number" min="0" name="prix" id="prix" class="form-control">
                                    </div>
                                </div>       
                                <div class="col-12 mb-2">
                                    <label for="galerie" class="form-label">Image</label>
                                    <input type="file" name="image" id="galerie" class="form-control">
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
                                </div>
                            `
                        }
                    },
                    buttons: {
                        cancel: {
                            text: "Fermer",
                            visible: true,
                            value: false
                        },
                        confirm: {
                            text: 'Créer',
                            className: 'creer',
                            closeModal: false,
                            value:true
                        }
                    },
                    confirm: {
                        text: 'Créer',
                        className: 'creer',
                        closeModal: false,
                        value: true,
                        onClick: function() {
                            // Récupérer le contenu de Quill
                            const description = quill.root.innerHTML;
                            var formData = new FormData();
                            formData.append('_token', "{{ csrf_token() }}");
                            formData.append('titre', $('#titre').val());
                            formData.append('date', $('#date').val());
                            formData.append('description', description); // Ajouter la description du Quill
                            formData.append('prix', $('#prix').val());
                            formData.append('image', $('#galerie')[0].files[0]);

                            $.ajax({
                                url: '/api/event-create',
                                type: 'POST',
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function (response) {
                                    swal({
                                        text: "Événement créé avec succès",
                                        icon: 'success'
                                    }).then(() => {
                                        location.reload();
                                    });
                                },
                                error: function (xhr) {
                                    if (xhr.status === 422) {
                                        let errors = xhr.responseJSON.errors;
                                        let errorMessage = "";
                                        for (const field in errors) {
                                            errorMessage += `${errors[field][0]}<br>`;
                                        }
                                        swal({
                                            title: "Erreur de validation",
                                            content: {
                                                element: 'div',
                                                attributes: {
                                                    innerHTML: errorMessage
                                                }
                                            },
                                            icon: 'error'
                                        });
                                    } else {
                                        swal({
                                            text: "Impossible d'enregistrer vos données, veuillez réessayer.",
                                            icon: 'warning'
                                        });
                                    }
                                }
                            });
                        }
                    }
                });
            });

            // Fonction pour afficher la modale de consultation ou édition
            function showModal(data, isReadonly) {
                const readonlyAttr = isReadonly ? 'readonly' : '';
                return swal({
                    title: isReadonly ? "Détail de l'Événement" : "Mise à jour de l'Événement",
                    content: {
                        element: 'div',
                        attributes: {
                            innerHTML: `
                                <div class="row col-12">
                                    <div class="col-4 mb-2">
                                        <label>Titre</label>
                                        <input type="text" id="titre" class="form-control" ${readonlyAttr} value="${data.titre || ''}">
                                    </div>
                                    <div class="col-4 mb-2">
                                        <label>Date</label>
                                        <input type="datetime-local" id="date" class="form-control" ${readonlyAttr} value="${data.eventDate || ''}">
                                    </div>
                                    <div class="col-4 mb-2">
                                        <label>Prix</label>
                                        <input type="number" id="prix" min="0" class="form-control" ${readonlyAttr} value="${data.prix || ''}">
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <label>Image</label>
                                    <input type="file" id="galerie" class="form-control" ${readonlyAttr}>
                                    <img src="${data.image_url || ''}" alt="Image" class="img-fluid mt-2">
                                </div>
                                <div class="col-12 mb-2">
                                    <label>Description</label>
                                    <textarea name="description" id="description" class="form-control" cols="30" rows="10" ${readonlyAttr}>${data.description || ''}</textarea>
                                </div>
                            `
                        }
                    },
                    buttons: isReadonly
                        ? { cancel: "Fermer", edit: { text: "Éditer", visible: true, closeModal: false } }
                        : { cancel: "Annuler", update: { text: "Mettre à jour", visible: true, closeModal: false } }
                });
            }

            // Lorsque vous cliquez sur l'icône de consultation d'un événement
            /*$(document).on('click', '.consult', function () {
                var id = $(this).data('id');
                swal(id);
                $.ajax({
                    url: '/api/print-specific-event/' + id,
                    type: 'GET',
                    success: function (response) {
                        if (!response) {
                            swal({ text: "Aucune donnée disponible.", icon: 'error' });
                            return;
                        }

                        showModal(response, true).then((editAction) => {
                            if (editAction) {
                                showModal(response, false).then((updateAction) => {
                                    if (updateAction) {
                                        updateEvent(id);
                                    }
                                });
                            }
                        });
                    },
                    error: function (xhr) {
                        handleAjaxError(xhr);
                    }
                });
            });*/
            $(document).on('click','.consult',function(){
                var id = $(this).data('id');
                $.ajax({
                    url : '/api/print-specific-event/'+id;
                    type:'GET',
                    success:function(response){
                        swal(`HELLO ${id}`);
                    }
                })
            })

        </script>
    @endpush
</x-app-layout>
