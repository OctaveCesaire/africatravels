<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'AfricaTravels') }}</title>
        
        <!-- Nucleo Icons -->
        <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />

        <!-- CSS Files -->
        <link href="{{ asset('assets/css/argon-dashboard.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/corporate-ui-dashboard.css') }}" rel="stylesheet" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @if (auth()->user()->hasRole('admin'))
                @include('layouts.arc.navigation')
            @else
                @include('layouts.managers.navigation')
            @endif

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        
        <!-- Scripts -->
        <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>

        <!-- Dashboard Scripts -->
        <script src="{{ asset('assets/js/argon-dashboard.js') }}"></script>
        <script src="{{ asset('assets/js/corporate-ui-dashboard.min.js') }}"></script>

        {{-- SWEETALERT & JQUERY --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


        @stack('js');
        <!-- Stack Pour Le Graphisme ( Global, Graphe ) -->
        {{-- <script src="https://soft-ui-dashboard-pro-laravel.creative-tim.com/assets/js/plugins/chartjs.min.js"></script>
        <script src="https://soft-ui-dashboard-pro-laravel.creative-tim.com/assets/js/plugins/threejs.js"></script>
        <script src="https://soft-ui-dashboard-pro-laravel.creative-tim.com/assets/js/plugins/orbit-controls.js"></script> --}}

        
    </body>
</html>