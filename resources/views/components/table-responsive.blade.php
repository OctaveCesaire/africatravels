<div>
    <!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
    @if($type!="avis" && $type!="journal")
        <div class="card-header">
            <div class="d-flex justify-content-between">
                {{-- <span class="d-flex">
                    <label for="pagination" class="my-auto form-label">Show:</label>
                    <select name="pagination" id="pagination" class="form-select">
                        <option value="10" {{ request('pagination') == 10 ? 'selected' : '' }}>10</option>
                        <option value="20" {{ request('pagination') == 20 ? 'selected' : '' }}>20</option>
                        <option value="30" {{ request('pagination') == 30 ? 'selected' : '' }}>30</option>
                    </select>
                    <span class="my-auto"> entries</span>
                </span> --}}
                <span class="d-flex">
                    <label for="search" class="my-auto form-label">Search: </label>
                    <input type="search" name="search" id="search" class="form-control border rounded">
                </span>
                @if($type!="archive")
                    @if ($type=="issue")
                        <div class="my-auto">
                            <em class="btn btn-xs my-auto btn-outline-secondary" title="Resolved">
                                <i class="fas fa-check"></i>
                                <span class="d-none d-md-inline">Resolved</span>
                            </em >
                        </div>
                    @else
                        <div class="my-auto">
                            <a  title="New" href={{route('updateAction',['type'=>'New','request'=> $item->id ?? null])}} class="btn btn-xs my-auto btn-outline-primary">
                                <i class="fas fa-plus"></i>
                                <span class="d-none d-md-inline">New</span>
                            </a >
                            <em class="btn btn-xs my-auto btn-outline-danger" title="Delete">
                                <i class="fas fa-trash" ></i>
                                <span class="d-none d-md-inline">Delete</span>
                            </em>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    @endif

    @isset($res)
        <div {{$attributes->merge(['class'=>'card-body table-responsive'])}}>
            <table class="table table-hover" id="data-table">
                <thead>
                    <tr>
                        @if($type!="avis" && $type!="journal")
                            <th class="text-start" scope="col"><input type="checkbox" class="form-check-input" id="select_all"></th>
                        @endif
                        @foreach ($fields as $field)
                            <th class="text-center">
                                {{ $field }}
                                <i class="fas fa-sort text-xs text-body-tertiary" data-sort="{{ $field }}" style="cursor: pointer;"></i>
                            </th>

                        @endforeach
                        @if($type!="avis" && $type!="journal" && $type!="archive")
                            <th class="text-end">{{ __('ACTIONS') }}</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($res as $item)
                        <tr>
                            @if($type!="avis" && $type!="journal")
                                <td class="text-start" scope="col"><input type="checkbox" class="form-check-input" data-id="{{$item->id}}"></td>
                            @endif
                            @foreach ($fields as $field)
                                <td class="text-center">{{ $item->$field }}</td>
                            @endforeach
                            @if($type!="avis" && $type!="journal" &&$type!="archive")
                                <td class="text-end">
                                    <em title="Consult" class="btn btn-xs my-auto btn-outline-info" data-id="{{ $item->id }}">
                                        <i class="fas fa-eye"></i>
                                        <span class="d-none d-md-inline">Consult</span>
                                    </em>
                                    @if ($type!="issue")
                                        <a title="Edit" href={{route('updateAction',['type'=>'Edit','request'=> $item->id ?? null])}} class="btn btn-xs my-auto btn-outline-warning">
                                            <i class="fas fa-pencil"></i>
                                            <span class="d-none d-md-inline">Edit</span>
                                        </a >
                                    @endif
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <!-- Affichage du nombre d'éléments et des liens de pagination -->
            <div class="my-auto">
                <span>Showing {{ $res->firstItem() }} to {{ $res->lastItem() }} of {{ $res->total() }} entries</span>
            </div>

            <div class="my-auto">
                <!-- Liens Previous, Next et les pages -->
                <div class="pagination d-flex justify-content-center">
                    {{-- Lien Previous --}}
                    <a class="page-link" href="{{ $res->previousPageUrl() }}" {{ $res->onFirstPage() ? 'disabled' : '' }}>Previous</a>

                    {{-- Lien pour la page actuelle --}}
                    <span class="page-link active">{{ $res->currentPage() }}</span>

                    {{-- Lien Next --}}
                    <a class="page-link" href="{{ $res->nextPageUrl() }}" {{ !$res->hasMorePages() ? 'disabled' : '' }}>Next</a>
                </div>
            </div>
        </div>

    @endisset
    @push('js')
        <script>
            function Show($elt=""){
                $action = ($elt==='consult') ? 'readonly':'';
                return `
                `;
            }

            $(document).on('click','.btn-outline-info',()=>{
                Swal.fire({
                    title:"<strong>New Event</strong>",
                    input:"div",
                    html :Show(),// Consulter ou revoir l'event
                })
            })

            // Lors du clic sur le case de l'entête
            $(document).on('click', '#select_all', function() {
                isChecked = $(this).prop('checked'); // Vérifie si le checkbox #select_all est coché
                $('input:checkbox').not('#select_all').prop('checked', isChecked); // Coche ou décoche tous les autres checkboxes
            });

            // Lors du clic sur le bouton de suppression
            $('.btn-outline-danger').on('click', function() {
                var listcheck = $('input:checkbox:not(#select_all):checked').map(function() {
                    return $(this).data('id');  // Récupère le data-id des checkboxes cochées
                }).get();

                if (listcheck.length === 0) {
                    Swal.fire('Aucun élément sélectionné à supprimer.');
                } else {
                    Swal.fire({
                        title: "Warning",
                        icon:"warning",
                        html:'Event that will be deleting : ' + listcheck.join(', '),
                        showCloseButton:true,
                        confirmButtonText:`<i class="fa fa-thumbs-up"></i> Agree!`
                    }).then((acte)=>{
                        if(acte.isConfirmed){
                            // Requête de delete
                            $.ajax({
                                url: '{{route('deleteAction')}}',
                                type:'DELETE',
                                data:{
                                    ids   : listcheck,
                                    _token: '{{csrf_token()}}'
                                },
                                success:(response)=>{
                                    Swal.fire({
                                        title: "SUccess",
                                        icon: "success",
                                        draggable: true
                                    });
                                },
                                error:(error)=>{
                                    Swal.fire({
                                        title: "Something went wrong!",
                                        icon: "error",
                                        draggable: true
                                    });
                                }
                            })


                        }
                    });
                    // Traitement des éléments à supprimer (par exemple, via une requête AJAX)
                }
            });

            // Champs de recherche
            $("#search").on('input', function() {
                var searchTerm = $(this).val().toLowerCase(); // Récupère le texte en minuscules
                $("#data-table tbody tr").each(function() {
                    var rowText = $(this).text().toLowerCase(); // Récupère le texte de chaque ligne en minuscules
                    if (rowText.indexOf(searchTerm) !== -1) {
                        $(this).show(); // Affiche la ligne si elle correspond au filtre
                    } else {
                        $(this).hide(); // Cache la ligne si elle ne correspond pas
                    }
                });
            });

            // Tri par colonne
            $(document).ready(function() {
                // Lorsqu'une icône de tri est cliquée
                $('th i[data-sort]').on('click', function() {
                    var columnName = $(this).data('sort');  // Nom de la colonne à trier
                    var rows = $('#data-table tbody tr').get();  // Récupère toutes les lignes du tableau
                    var sortedRows = [];

                    // Détermine si on trie par ordre croissant ou décroissant
                    var isAsc = $(this).hasClass('asc');

                    // Trie les lignes en fonction de la colonne et de l'ordre
                    sortedRows = rows.sort(function(a, b) {
                        var cellA = $(a).find('td').filter(function() {
                            return $(this).index() === $('th').index($('th[data-sort="'+columnName+'"]'));
                        }).text();
                        var cellB = $(b).find('td').filter(function() {
                            return $(this).index() === $('th').index($('th[data-sort="'+columnName+'"]'));
                        }).text();

                        // Comparaison pour trier les valeurs
                        if (isAsc) {
                            return cellA > cellB ? 1 : -1;
                        } else {
                            return cellA < cellB ? 1 : -1;
                        }
                    });

                    // Réorganise les lignes dans le tableau
                    $.each(sortedRows, function(index, row) {
                        $('#data-table tbody').append(row);
                    });

                    // Change l'icône de tri pour refléter l'ordre (ascendant ou descendant)
                    $('th i').removeClass('asc').removeClass('desc');
                    if (isAsc) {
                        $(this).addClass('desc');
                    } else {
                        $(this).addClass('asc');
                    }
                });
            });

        // Lors du clic sur le bouton de "Resolved"
        $('.btn-outline-secondary').on('click', function() {
            var listcheck = $('input:checkbox:not(#select_all):checked').map(function() {
                return $(this).data('id');  // Récupère le data-id des checkboxes cochées
            }).get();

            // Si aucun élément n'est sélectionné
            if (listcheck.length === 0) {
                Swal.fire('Aucun élément sélectionné à mettre à jour.');
            } else {
                // Affiche une alerte de confirmation
                Swal.fire({
                    title: "Mise à jour",
                    icon: "warning",
                    html: 'Ces événements seront marqués comme résolus : ' + listcheck.join(', '),
                    showCloseButton: true,
                    confirmButtonText: `<i class="fa fa-thumbs-up"></i> Accepter`
                }).then((acte) => {
                    // Si l'utilisateur confirme
                    if (acte.isConfirmed) {
                        // Envoi de la requête AJAX pour mettre à jour les éléments
                        $.ajax({
                            url: '{{ route('resolvedAction') }}', // Route vers le backend
                            type: 'PUT',
                            data: {
                                ids: listcheck,  // Liste des IDs à mettre à jour
                                _token: '{{ csrf_token() }}'  // Token CSRF pour la sécurité
                            },
                            success: function(response) {
                                // Si la mise à jour réussit
                                Swal.fire({
                                    title: "Succès",
                                    text: response.message,  // Affiche le message retourné par le backend
                                    icon: "success",
                                    draggable: true
                                });
                                // Vous pouvez ici aussi mettre à jour l'interface si nécessaire (ex: recharger la page)
                            },
                            error: function(xhr, status, error) {
                                // En cas d'erreur
                                Swal.fire({
                                    title: "Une erreur est survenue!",
                                    text: xhr.responseText,  // Affiche l'erreur retournée par le serveur
                                    icon: "error",
                                    draggable: true
                                });
                            }
                        });
                    }
                });
            }
        });

        // Pagination
        // $(document).on('change', '#pagination', function() {
        //     var perPage = $(this).val();  // Récupère la valeur de pagination sélectionnée

        //     // Envoie la requête AJAX pour récupérer les nouvelles données
        //     $.ajax({
        //         url: '{{ route('action', ['type' => $type]) }}',  // Utilisez la même route que pour l'affichage normal
        //         type: 'GET',
        //         data: {
        //             pagination: perPage,  // Passe la valeur de pagination au serveur
        //             _token: '{{ csrf_token() }}'  // Token CSRF pour la sécurité
        //         },
        //         success: function(response) {
        //             // Mettre à jour les données dans le tableau
        //             var tableBody = $('#data-table tbody');
        //             tableBody.empty();  // Vide le corps du tableau

        //             // Remplir le tableau avec les nouvelles données
        //             $.each(response.data, function(index, item) {
        //                 var row = '<tr>';
        //                 row += '<td class="text-start"><input type="checkbox" class="form-check-input" data-id="' + item.id + '"></td>';
        //                 row += '<td class="text-center">' + item.id + '</td>';
        //                 row += '<td class="text-center">' + item.status + '</td>';
        //                 row += '<td class="text-center">' + item.event_id + '</td>';
        //                 row += '</tr>';
        //                 tableBody.append(row);
        //             });

        //             // Mise à jour des liens de pagination (si nécessaire)
        //             // Vous pouvez créer et afficher des liens pour la pagination ici si besoin
        //         },
        //         error: function(xhr, status, error) {
        //             console.log('Error:', error);
        //             Swal.fire('Une erreur est survenue!', 'Veuillez réessayer plus tard.', 'error');
        //         }
        //     });
        // });

        </script>
    @endpush
</div>
