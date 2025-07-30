@extends('base')

@section('title','A propos')

@section('header')
    @include('user.navUser')
@endsection

@section('content')
<section class="bg-white py-5 animate__animated animate__fadeIn" id="about">
    <div class="container">
        <div class="row align-items-center">
            <!-- Texte -->
            <div class="col-md-6 mb-4">
                <h2 class="display-6 fw-bold text-primary">À propos de <span class="text-dark">AURIMOB</span></h2>
                <p class="lead">
                    AURIMOB est la plateforme de référence pour la <strong>recherche de chambres étudiantes</strong> à Douala.
                    Simple, rapide et fiable, elle permet à chaque étudiant de trouver un logement adapté à ses besoins.
                </p>
                <ul class="list-unstyled mt-4">
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Offres vérifiées et sécurisées</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Service client réactif</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Des milliers d'étudiants accompagnés</li>
                </ul>
                <a href="{{ route('contact') }}" class="btn btn-outline-primary mt-4">Nous contacter</a>
            </div>

            <!-- Image + Compteurs -->
            <div class="col-md-6 text-center">
                <img src="{{ asset('images/Universite_de_Douala.jpg') }}" alt="Image AURIMOB" class="img-fluid rounded shadow mb-4 animate__animated animate__zoomIn">

                <!-- Compteurs -->
                <div class="row text-center">
                    <div class="col-6 mb-3">
                        <h3 class="text-primary" id="compteur-chambres">50</h3>
                        <p class="fw-bold">Chambres disponibles</p>
                    </div>
                    <div class="col-6 mb-3">
                        <h3 class="text-success" id="compteur-etudiants">42</h3>
                        <p class="fw-bold">Étudiants satisfaits</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
