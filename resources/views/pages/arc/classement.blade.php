@extends('pages.index')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 ">
        @include('layouts.arc.navbar')
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
                    <table class="table ">
                        <thead>
                            <th class="text-start" scope="col">#</th>
                            <th class="text-center" scope="col">Nom</th>
                            <th class="text-center" scope="col">Status</th>
                            <th class="text-center" scope="col">Evènements</th>
                            <th class="text-center" scope="col">Date paiement </th>
                        </thead>
                        <tbody>
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
                            @else
                                <tr class="text-center modal">
                                    Aucunes transactions enregistrer
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <img src="" alt="">
@endsection

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