<x-app-layout>
    <x-slot name="header">
        <div class="d-flex">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>
    <div class="col-12 row py-3 px-1">
        <div class="col-md-6">
            <div class="card shadow">
                <h3 class="fw-bolder p-2 text-uppercase">{{ __("Chiffre d'affaire") }}</h3>
                <x-chart-line class="bg-dark"/>
            </div>
            <div class="card shadow mt-3">
                <h3 class="fw-bolder p-2 text-uppercase">{{ __("Avi, Note & Moyenne") }}</h3>
                <x-table-responsive :fields='$fields' :type='"journal"' :res='$data' class="bg-warning"/>
            </div>
        </div>
        <div class="card shadow col-md-6 mt-3">
            <div>
                <h3 class="fw-bolder p-2 text-uppercase">{{ __("Status des transaction") }}</h3>
                <x-chart-circle :chartData='$chartData'/>
            </div>
            <div>
                <h3 class="fw-bolder p-2 text-uppercase">{{ __("Journal des transaction") }}</h3>
                <x-table-responsive class="bg-info" :fields='$fields' :type='"journal"' :res='$data'/>
            </div>
        </div>
    </div>
</x-app-layout>
