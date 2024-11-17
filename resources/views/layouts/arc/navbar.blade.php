{{-- <nav class="navbar navbar-main navbar-expand-lg bg-success shadow" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-1 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
            </ol>
            <h6 class="font-weight-bold mb-0">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            </div>
            <div class="mb-0 font-weight-bold breadcrumb-text text-white">

            </div>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner border">
                            <i class="sidenav-toggler-line border"></i>
                            <i class="sidenav-toggler-line border"></i>
                            <i class="sidenav-toggler-line border"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item px-3 d-flex align-items-center">
                    <a href="{{ route('dash') }}" class="nav-link">Tableau de Bord</a>
                    <a href="{{ route('event') }}" class="nav-link">Evènement</a>
                    <a href="{{ route('transactions') }}" class="nav-link">Transactions</a>
                </li>
                <li class="nav-item dropdown pe-2 d-flex align-items-center">

                    <a href="javascript:;" class="nav-link text-body p-0"  id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="false">

                    -- @if (Auth::user()->profile && !empty(Auth::user()->profile))
                        <img src="{{ asset('assets/upload/imgs/' . Auth::user()->profile) }}" class="avatar avatar-sm" alt="avatar" />
                    @else
                        <img src="https://t4.ftcdn.net/jpg/08/18/74/99/360_F_818749915_psvSd5Lu6ecXYPhqh3FsGH5T93cDHFdO.jpg" class="avatar avatar-sm" alt="avatar" />
                    @endif --
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                        aria-labelledby="dropdownMenuButton">
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md "  href="">
                                <i class="fas fa-user ms-2 w-10 h-auto"></i>
                                <span class="nav-link-text ms-1">Mon Profil</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <form method="POST" action="#">
                                <a href="javascript:;">
                                    @csrf
                                    <a href="login" onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-item border-radius-md">
                                        <i class="fas fa-right-from-bracket ms-2 w-10 h-auto"></i>
                                        <span class="nav-link-text ms-1">Déconnexion</span>
                                    </a>
                                </a>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav> --}}
<!-- End Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #00441B">
    <div class="container-fluid">
        <a class="navbar-brand  text-white" href="#">{{ env('APP_NAME') }}</a>
        <button class="navbar-toggler border-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars text-white py-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active text-white {{ Route::is('arcDash') ? 'active bg-info rounded' : '' }}" aria-current="page" href="{{ route('arcDash') }}">Tableau De Bord</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::is('classement') ? 'active bg-info rounded' : '' }}" href="{{ route('classement') }}">Classement</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::is('tansactionsArc') ? 'active bg-info rounded' : '' }}" href="{{ route('tansactionsArc') }}">Tansactions</a>
                </li>
            </ul>
      </div>
    </div>
</nav>