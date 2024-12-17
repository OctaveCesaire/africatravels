@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mon Tableau de Bord</h1>
    <h3>Mes Transactions</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Transaction</th>
                <th>Montant</th>
                <th>Statut</th>
                <th>Date</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ number_format($transaction->amount, 2) }} USD</td>
                    <td>{{ $transaction->status }}</td>
                    <td>{{ $transaction->created_at->format('d-m-Y H:i') }}</td>
                    <td>{{ $transaction->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $transactions->links() }}
</div>
@endsection
