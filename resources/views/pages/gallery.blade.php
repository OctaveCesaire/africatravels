@extends('layouts.app')

@section('title', 'Gallery')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Galeries</h1>
        <div class="row">
            @foreach($galleries as $image)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ $image->url }}" class="card-img-top" alt="Gallery Image">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
