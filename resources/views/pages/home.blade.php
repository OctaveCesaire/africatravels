@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
  <div class="jumbotron bg-light text-center py-5">
    <h1>Bienvenue sur Tourism and Events</h1>
    <p class="lead">Découvrez les meilleurs sites touristiques et évènements culturels.</p>
    <a href="{{ route('tourist.sites') }}" class="btn btn-primary">Explorer les sites touristiques</a>
    <a href="{{ route('events') }}" class="btn btn-secondary">Voir les événements</a>
  </div>
</div>
@endsection
