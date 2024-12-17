@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tableau de Bord de l'Agence</h1>

    <h3>Mes Services</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom du Service</th>
                <th>Description</th>
                <th>Tarif</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
                <tr>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->description }}</td>
                    <td>{{ number_format($service->price, 2) }} USD</td>
                    <td>
                        <a href="{{ route('services.edit', $service->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                        <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $services->links() }}

    <h3>Mes Événements</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Date</th>
                <th>Lieu</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->date->format('d-m-Y') }}</td>
                    <td>{{ $event->location }}</td>
                    <td>
                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $events->links() }}
    @if ($pendingServices->count() > 0)
        <div class="alert alert-warning">
            Vous avez {{ $pendingServices->count() }} service(s) en attente de validation.
        </div>
    @endif
    @if ($events->count() == 0)
        <div class="alert alert-info">
            Vous n'avez pas encore d'événements. <a href="{{ route('events.create') }}">Ajoutez-en ici</a>.
        </div>
    @endif

</div>
@endsection
