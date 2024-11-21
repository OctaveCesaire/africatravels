<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100">
        {{-- @include('layouts.managers.navbar') --}}
        <div class="py-3 px-1">
            <div class="card bg-dark shadow">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5 class="my-auto">MES EVENEMENTS</h5>
                        <span class="btn btn-xs my-auto btn-add btn-outline-info">
                            <i class="ni ni-fat-add"></i>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table ">
                        <thead>
                            <th class="text-start text-xs" scope="col">#</th>
                            <th class="text-center text-xs" scope="col">Nom</th>
                            <th class="text-center text-xs" scope="col">Status</th>
                            <th class="text-center text-xs" scope="col">Nbr participants</th>
                            <th class="text-center text-xs" scope="col">
                                <div class="d-flex">
                                    <div class="my-auto">Date évènement</div>
                                    <span class="my-auto sort-arrows d-flex flex-column">
                                        <i class="sort-asc text-xxs" style="cursor: pointer" data-column="date" data-order="asc">&#9650;</i> <!-- Flèche haut -->
                                        <i class="sort-desc text-xxs" style="cursor: pointer" data-column="date" data-order="desc">&#9660;</i> <!-- Flèche bas -->
                                    </span>
                                </div>
                            </th>
                        </thead>
                        <tbody>
                            @if ($list->count() > 0)
                                @foreach ($list as $elt)
                                    <tr>
                                        <td class="my-auto text-start text-xs" scope="row">
                                            <i class="ni ni-zoom-split-in btn btn-xs btn-outline-info consult" data-id="{{ $elt->id }}"></i>
                                        </td>
                                        <td class="my-auto text-center text-xs">{{ $elt->titre }}</td>
                                        <td class="my-auto text-center text-xs">
                                            {{-- @if ($elt->status === 'à venir') --}}
                                                <span class="badge bg-warning">à venir</span>
                                            {{-- @elseif ($elt->status === 'lancer') --}}
                                                <span class="badge bg-success">lancer</span>
                                            {{-- @elseif ($elt->status === 'finir') --}}
                                                <span class="badge bg-danger">finir</span>
                                            {{-- @endif --}}
                                        </td>
                                        <td class="my-auto text-center text-xs">
                                            <span class="text-muted badge bg-secondary rounded">12</span>
                                        </td>
                                        <td class="my-auto text-center text-xs"><span class="text-white">{{ $elt->eventDate }}</span></td>
                                    </tr>
                                @endforeach   
                            @else
                                <tr class="text-center modal">
                                    Aucuns événements d'organiser
                                </tr>
                            @endif
                        </tbody>
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
                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            `
                        }
                    },
                    buttons: {
                        cancel: {
                            text: "Fermer",
                            visible: true,
                            value: true
                        },
                        confirm: {
                            text: 'Créer',
                            className: 'creer',
                            closeModal: false
                        }
                    }
                }).then((data) => {
                    if (data) {
                        var formData = new FormData();
                        formData.append('_token', "{{ csrf_token() }}");
                        formData.append('titre', $('#titre').val());
                        formData.append('date', $('#date').val());
                        formData.append('description', $('#description').val());
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
                                if (xhr.status === 422) { // Erreur de validation
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
                });
            });
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

                        // Affiche la modale de consultation
                        showModal(response, true).then((editAction) => {
                            if (editAction) {
                                // Passe en mode édition
                                showModal(response, false).then((updateAction) => {
                                    if (updateAction) {
                                        updateEvent(id); // Lance la mise à jour
                                    }
                                });
                            }
                        });
                    },
                    error: function (xhr) {
                        handleAjaxError(xhr);
                    }
                });
            });
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
                                    <textarea id="description cols="30" rows="10" class="form-control" ${readonlyAttr}>${data.description || ''}</textarea>
                                </div>
                            `
                        }
                    },
                    buttons: isReadonly
                        ? { cancel: "Fermer", edit: { text: "Éditer", visible: true, closeModal: false } }
                        : { cancel: "Annuler", update: { text: "Mettre à jour", visible: true, closeModal: false } }
                });
            }
            function updateEvent(id) {
                var formData = new FormData();
                formData.append('_token', "{{ csrf_token() }}");
                formData.append('titre', $('#titre').val());
                formData.append('date', $('#date').val());
                formData.append('description', $('#description').val());
                formData.append('prix', $('#prix').val());

                const imageFile = $('#galerie')[0].files[0];
                if (imageFile) formData.append('image', imageFile);

                $.ajax({
                    url: '/api/update-event/' + id,
                    type: 'POST', // PUT selon l'implémentation backend
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function () {
                        swal({ icon: 'success', text: 'Données mises à jour avec succès.' });
                    },
                    error: function (xhr) {
                        handleAjaxError(xhr);
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

            // Trie par date
            function sortTable(columnIndex, order) {
                const tableBody = document.getElementById('table-body');
                const rows = Array.from(tableBody.rows);

                rows.sort((a, b) => {
                    const dateA = new Date(a.cells[columnIndex].innerText);
                    const dateB = new Date(b.cells[columnIndex].innerText);

                    return order === 'asc' ? dateA - dateB : dateB - dateA;
                });

                // Réinsérer les lignes triées dans le tableau
                tableBody.innerHTML = '';
                rows.forEach(row => tableBody.appendChild(row));
            }

            // Gestion des clics sur les flèches de tri
            document.querySelectorAll('.sort-arrows i').forEach(arrow => {
                arrow.addEventListener('click', () => {
                    const columnIndex = 4; // Index de la colonne "Date paiement" (0-based)
                    const order = arrow.dataset.order; // asc ou desc
                    sortTable(columnIndex, order);
                });
            });
        </script>
    @endpush
</x-app-layout>
