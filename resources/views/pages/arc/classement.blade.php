<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 ">
        <div class="py-4 px-1">
            <div class="card bg-dark shadow">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5 class="my-auto">LE CLASSEMENT</h5>
                        <span class="my-auto badge bg-info">
                            CHiffre d'affaire : >= 0
                        </span>
                    </div>
                </div>
                <div class="card-body">

                    <table id="dataTable" class="table table-hover">
                        <thead>
                            <tr>
                                @foreach($dataType as $key => $value)
                                    <?php $key =='id' ? echo '<th class="text-start" scope="col">#</th>' : echo`<th class="text-center" scope="col">$value</th>` ?>
                                @endforeach
                                <th class="actions text-right">{{ __('ACTIONS') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataTypeContent as $data)
                                <tr>

                                    @if ($list->count() > 0)
                                        @foreach ($list as $elt)
                                            <tr>
                                                <td class="my-auto text-start" scope="row">
                                                    <i class="ni ni-zoom-split-in fa-xs btn btn-xs btn-outline-info consult" data-id="{{ $elt->id }}"></i>
                                                </td>
                                                <td class="my-auto text-center">{{ $elt->titre }}</td>
                                                <td class="my-auto text-center">
                                                    {{-- @if ($elt->status === 'à venir') --}}
                                                        <span class="badge bg-warning">à venir</span>
                                                    {{-- @elseif ($elt->status === 'lancer') --}}
                                                        <span class="badge bg-success">lancer</span>
                                                    {{-- @elseif ($elt->status === 'finir') --}}
                                                        <span class="badge bg-danger">finir</span>
                                                    {{-- @endif --}}
                                                </td>
                                                <td class="my-auto text-center">
                                                    <span class="text-muted badge bg-secondary rounded">Evenement</span>
                                                </td>
                                                <td class="my-auto text-center"><span class="text-white">12 Dec 2023</span></td>
                                            </tr>
                                        @endforeach 
                                        
                                        <td class="no-sort no-click bread-actions">
                                            @can('delete', $data)
                                                <div class="btn btn-sm btn-danger pull-right delete" data-id="{{ $data->{$data->getKeyName()} }}">
                                                    <i class="voyager-trash"></i> {{ __('voyager::generic.delete') }}
                                                </div>
                                            @endcan
                                            @can('edit', $data)
                                                <a href="{{ route('voyager.'.$dataType->slug.'.edit', $data->{$data->getKeyName()}) }}" class="btn btn-sm btn-primary pull-right edit">
                                                    <i class="voyager-edit"></i> {{ __('voyager::generic.edit') }}
                                                </a>
                                            @endcan
                                            @can('edit', $data)
                                                <a href="{{ route('voyager.'.$dataType->slug.'.builder', $data->{$data->getKeyName()}) }}" class="btn btn-sm btn-success pull-right">
                                                    <i class="voyager-list"></i> {{ __('voyager::generic.builder') }}
                                                </a>
                                            @endcan
                                        </td>  
                                    @else
                                        <tr class="text-center modal">
                                            Aucunes transactions enregistrer
                                        </tr>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <img src="" alt="">

    @push('js')
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
                    title: isReadonly ? "Détail de l'agence" : "Mise à jour de l'Événement",
                    content: {
                        element: 'div',
                        attributes: {
                            innerHTML: `
                                <fieldset class="row col-12 border mb-2">
                                    <legend class="h5 col-12">INFORMATION SUR LE(S) EVENEMENT(S)</legend>
                                    <ul class="list-group list-group-numbered">
                                        
                                        <li class="list-group-item"> <strong> Nom du l'evenement  </strong>: <spam class="badge bg-info">NOTE </span> </li>
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
    @endpush
</x-app-layout>