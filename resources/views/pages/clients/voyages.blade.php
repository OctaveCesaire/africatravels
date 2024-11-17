@extends('pages.index')
@section('content')
    @include('layouts.clients.navbar')

    <header class=" bg-light d-flex align-items-center justify-content-center text-center text-white py-4">
        <h1 id="destination">Nos Prochaines Activités</h1>
    </header>
    <div class="bg-secondary py-4">
        <div class="col-12 row">
            @if ($list->count() > 0)
                @foreach ($list as $elt)
                    <div class="col-12 col-sm-12 col-md-4 col-lg-3">
                        <div class="card mb-2" >
                            <img src="https://toffatravels.com/assets/upload/bannieres/1728053209.jpeg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="card-title row">
                                    <div class="col-md-6 my-auto">
                                        {{ $elt->titre }}
                                    </div>
                                    <div class="col-md-6 my-auto">
                                        {{ $elt->eventDate }}
                                    </div>                                
                                </div>
                                <input type="button" value="Détail" data-id="{{ $elt->id }}" class="btn btn-outline-primary detail">
                            </div>
                        </div>
                    </div>           
                @endforeach
            @else
                <div class="col-12">
                    <div class="card" style="width:42rem;">
                        <img src="{{ asset('assets/img/no trip.png') }}" class="card-img-top" alt="...">
                    </div>
                </div>
            @endif

            
        </div>
    </div>
    
@endsection

@push('js')
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
@endpush