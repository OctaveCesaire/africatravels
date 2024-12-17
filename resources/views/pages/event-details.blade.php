@extends('layouts.app')

@section('title', $event->title)

@section('content')
    <div class="container py-5">
        <div class="card">
            <img src="{{ $event->image }}" class="card-img-top" alt="{{ $event->title }}">
            <div class="card-body">
                <h1>{{ $event->title }}</h1>
                <p>{{ $event->description }}</p>
            </div>
        </div>
        <h3 class="mt-4">Votes et Avis</h3>
        @foreach($reviews as $review)
            <div class="card mb-3">
                <div class="card-body">
                    <h5>
                        <img src="{{ $review->user->profile_picture ?: 'default.png' }}" class="rounded-circle" width="30">
                        {{ $review->user->username }} 
                        <span class="text-warning">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star{{ $i <= $review->rating ? '' : '-o' }}"></i>
                            @endfor
                        </span>
                    </h5>
                    <p>{{ $review->comment }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
