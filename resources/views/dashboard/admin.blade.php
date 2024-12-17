@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tableau de Bord Administrateur</h1>
    
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Utilisateurs enregistrés</h5>
                    <p class="card-text">{{ $userCount }}</p>
                </div>
            </div>
        </div>
    </div>

    <h3>Statistiques des Transactions</h3>
    <canvas id="transactionChart"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('transactionChart').getContext('2d');
        const chartData = @json($chartData);
        const labels = chartData.map(data => data.label);
        const values = chartData.map(data => data.value);

        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: values,
                    backgroundColor: ['#007bff', '#28a745', '#dc3545', '#ffc107']
                }]
            }
        });
    </script>

    <h3>Journaux des Logs</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Date</th>
                <th>Type</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
                <tr>
                    <td>{{ $log->created_at->format('d-m-Y H:i') }}</td>
                    <td>{{ $log->type }}</td>
                    <td>{{ $log->message }}</td>
                </tr>
            @endforeach

            
        </tbody>
    </table>
    {{ $logs->links() }}
    @if (session('alert'))
        <div class="alert alert-danger">
            {{ session('alert') }}
        </div>
    @endif
    <div class="mt-3">
        <ul>
            <li><span class="badge bg-primary">Bleu</span> : Transactions réussies</li>
            <li><span class="badge bg-danger">Rouge</span> : Transactions échouées</li>
            <li><span class="badge bg-warning">Jaune</span> : Transactions en attente</li>
        </ul>
    </div>

</div>
@endsection
