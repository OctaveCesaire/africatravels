@extends('pages.index')
@section('content')
    @include('layouts.clients.navbar')
    <div>
        <!-- Header with Carousel -->
        <header class="d-flex align-items-center justify-content-center mt-6 flex-column text-center text-white">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" class="active" aria-current="true" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                </div>
                <div class="carousel-inner">
                <div class="carousel-item">
                        <img src="{{ asset('assets/pages/vue de haut.jpg') }}" class="d-block w-100" style="height:70%" alt="La vue de haut du Bénin">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="text-white fw-bolder">La Route des Esclaves</h5>
                            <p>Revivez le passé de la colonisation béninoise à travers la <strong>route des esclaves.</strong></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/pages/route des esclave.jpg') }}" class="d-block w-100" alt="La route des esclaves">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="text-white fw-bolder">La Route des Esclaves</h5>
                            <p>Revivez le passé de la colonisation béninoise à travers la <strong>route des esclaves.</strong></p>
                        </div>
                    </div>
                    <div class="carousel-item active">
                        <img src="{{ asset('assets/pages/culture beninoise.jpg') }}" class="d-block w-100" alt="La culture Béninoise : Vodun">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="text-white fw-bolder">La Culture Béninoise Vodun</h5>
                            <p>Explorez les traditions et rituels du vodun, cœur de la culture béninoise.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/pages/rois.jpg') }}" class="d-block w-100" alt="Rois du Danxomè">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="text-white fw-bolder">Rois du Danxomè</h5>
                            <p>Plongez dans l'histoire royale du Bénin antique : Danxomè.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </header>

        <!-- Offers Section -->
        <section class="d-flex align-items-center justify-content-center flex-column text-center pt-4" style="background-color:#F6F9FF">
            <h3 id="destination" class="text-capitalize">Ce que nous offrons</h3>
            <hr/>
            <p class="container">
                Votre porte d’entrée vers l’aventure et la découverte. Nous sommes animés par la passion de révéler les trésors cachés du Bénin et nous nous engageons à vous offrir des expériences de voyage uniques et enrichissantes.
                Que vous souhaitiez explorer de nouveaux horizons, vous détendre ou plonger dans la richesse culturelle, nous avons tout ce qu’il faut pour faire de votre voyage une expérience inoubliable.
            </p>

            <div class="container mt-2">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3">
                    <div class="col mb-3">
                        <div class="card h-100">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqZfNImq3YG_MGQs-srfdX53zgSA0hkFJ7FMNH7enLgbUZ1atbg7PTOQZ0BRSOInleTQo&usqp=CAU" 
                                class="card-img-top mx-auto mt-3 rounded-circle" 
                                style="width: 150px;" 
                                alt="Célébrations Exotiques et Romantiques">
                            <div class="card-body">
                                <h5 class="card-title fw-bold text-center">Célébrations Exotiques et Romantiques</h5>
                                <p class="card-text text-center">
                                    Organisez votre mariage dans des décors exotiques et enchanteurs au Bénin. Créez des souvenirs magiques dans un cadre culturellement riche et naturellement magnifique.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="card h-100">
                            <img src="{{ asset('assets/pages/lune_miel.avif') }}" 
                                class="card-img-top mx-auto mt-3 rounded-circle" 
                                style="width: 150px;" 
                                alt="Lune De Miel">
                            <div class="card-body">
                                <h5 class="card-title fw-bold text-center">Lune De Miel</h5>
                                <p class="card-text text-center">
                                    Profitez de moments inoubliables avec nos expériences de luxe sur mesure. Des hébergements exclusifs aux services personnalisés, chaque détail est conçu pour vous offrir une expérience de voyage exceptionnelle.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="card h-100">
                            <img src="{{ asset('assets/pages/escapades.png') }}" 
                                class="card-img-top mx-auto mt-3 rounded-circle" 
                                style="width: 150px;" 
                                alt="Escapades en Groupe">
                            <div class="card-body">
                                <h5 class="card-title fw-bold text-center">Escapades en Groupe</h5>
                                <p class="card-text text-center">
                                    Partez à l'aventure avec vos proches ou vos collègues. Nos escapades en groupe sont conçues pour renforcer les liens tout en explorant les trésors cachés du Bénin.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="card h-100">
                            <img src="{{ asset('assets/pages/famille.webp') }}" 
                                class="card-img-top mx-auto mt-3 rounded-circle" 
                                style="width: 150px;" 
                                alt="Vacances en Famille">
                            <div class="card-body">
                                <h5 class="card-title fw-bold text-center">Vacances en Famille</h5>
                                <p class="card-text text-center">
                                    Profitez de vacances en famille enrichissantes avec des activités adaptées à tous les âges. Découvrez des destinations fascinantes qui plairont à toute la famille.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Popular Destinations Section -->
         
        <section class="container mb-3 pt-4 text-center" >
            <h3 id="destination" class="text-capitalize">Nos destinations populaires</h3>
            <div class="container mt-2">
                <div class="row">
                    {{-- @if($dest->count() > 0) --}}
                    @if(-1 > 0)
                        @foreach($dest as $item)
                            <div class="col-md-12 col-lg-6 mb-3">
                                <div class="card h-100">
                                    <img src="{{ asset('assets/upload/trips/'.$item->img) }}" class="card-img-top dest-img" alt="Destination populaire">
                                    <div class="card-body custom-list">
                                        <h5 class="card-title fw-bold text-center">{{$item->titre}}</h5>
                                        <p class="card-text text-center">
                                            {!! $item->description !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-md-12 col-lg-6 mb-3">
                            <div class="item" style="background-image: url('{{ asset('assets/pages/template-python.webp') }}');">
                                <div class="item-content">
                                    <h6 class="text-uppercase text-white">Temple des Pythons</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 mb-3">
                            <div class="item" style="background-image: url('{{ asset('assets/pages/bio-guerra.png') }}');">
                                <div class="item-content">
                                    <h6 class="text-uppercase text-white">Place Bio Guerra (Parakou)</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 mb-3">
                            <div class="item" style="background-image: url('{{ asset('assets/pages/etoile-rouge.jpg') }}');">
                                <div class="item-content">
                                    <h6 class="text-uppercase text-white">Place de l'Étoile Rouge</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 mb-3">
                            <div class="item" style="background-image: url('{{ asset('assets/pages/amazone.jpg') }}');">
                                <div class="item-content">
                                    <h6 class="text-uppercase text-white">Place de l'Amazone</h6>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </section>
    </div>

@endsection