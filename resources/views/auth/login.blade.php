@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Connexion</h3>
                </div>
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="email">Email ou Nom d'utilisateur</label>
                            <input type="text" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Mot de passe</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-check mb-3">
                            <input type="checkbox" id="remember" name="remember" class="form-check-input">
                            <label for="remember" class="form-check-label">Se souvenir de moi</label>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                            <a href="{{ route('register') }}">Créer un compte</a>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 w-100">Connexion</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
