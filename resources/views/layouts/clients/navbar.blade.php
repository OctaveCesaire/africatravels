<nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #00441B">
    <div class="container-fluid">
        <a class="navbar-brand  text-white" href="#">{{ env('APP_NAME') }}</a>
        <button class="navbar-toggler border-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars text-white py-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active text-white {{ Route::is('home') ? 'active bg-info rounded' : '' }}" aria-current="page" href="{{ route('home') }}">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::is('nous') ? 'active bg-info rounded' : '' }}" href="{{ route('nous') }}">Qui sommes-nous</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::is('trip') ? 'active bg-info rounded' : '' }}" href="{{ route('trip') }}">Voyages</a>
                </li>
            </ul>
      </div>
    </div>
</nav>