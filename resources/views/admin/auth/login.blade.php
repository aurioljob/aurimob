@extends('base')

@section('title', 'Admin - Login')

@section('content')
<div class="mt-4 container">
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (
        $errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>@yield('title')</h1>
    <form action="{{ route('dologin') }}" method="post" class="vstack gap-3">
        @csrf
        @include('shared.input', [
            'label' => 'Email',
            'name' => 'email',
            'type' => 'email',
            'class' => 'col'
        ])
        @include('shared.input', [
            'label' => 'Mot de passe',
            'name' => 'password',
            'type' => 'password',
            'class' => 'col'
        ])
        <div class="my-3">
            <button class="btn btn-info">Se connecter</button>
            <div class="d-flex justify-content-end">
                <a href="{{ route('home') }}" class="btn btn-link text-danger">Retour a la page d'Accueil</a>
            </div>

        </div>
    </form>
</div>
@endsection
