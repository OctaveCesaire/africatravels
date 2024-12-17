@extends('layouts.app')

@section('title', 'Events')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Événements</h1>
        <div class="row">
            @foreach($events as $event)
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <img src="{{ $event->image }}" class="card-img-top" alt="{{ $event->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                            <a href="{{ route('event.details', $event->id) }}" class="btn btn-primary">View More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
