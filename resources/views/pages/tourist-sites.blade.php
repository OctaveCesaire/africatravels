@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1>Sites Touristiques</h1>
    <div class="row">
        @foreach($sites as $site)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ $site->image }}" class="card-img-top" alt="{{ $site->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $site->title }}</h5>
                    <p class="card-text">{{ Str::limit($site->description, 100) }}</p>
                    <a href="{{ route('tourist.site.details', $site->id) }}" class="btn btn-primary">View More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
