@extends('layouts.app')

@section('title', 'Agencies')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Agences de Tourisme</h1>
        <div class="row">
            @foreach($agencies as $agency)
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <img src="{{ $agency->image }}" class="card-img-top" alt="{{ $agency->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $agency->name }}</h5>
                            <p class="card-text">{{ Str::limit($agency->description, 100) }}</p>
                            <a href="{{ route('agency.details', $agency->id) }}" class="btn btn-primary">View More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
