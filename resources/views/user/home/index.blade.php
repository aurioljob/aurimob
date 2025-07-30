@extends('base')
@section('title', 'Accueil')
@section('header')
    @include('user.navUser')
@endsection
@section('content')
<style>
    /* Personnalisation du carrousel */
    .carousel-caption {
        bottom: 15%;
        padding: 2rem;
        background: rgba(0, 0, 0, 0.5);
        border-radius: 1rem;
        left: 25%;
        transform: translateX(-25%);
        width: 90%;
        max-width: 800px;
    }

    .image-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .carousel-item {
        transition: transform 1.5s ease, opacity .5s ease;
    }
    .carousel-item img {
    object-fit: cover;
    height: 85vh;
    }
    @media (max-width: 768px) {
        .carousel-caption {
            bottom: 5%;
            padding: 1rem;
        }
        .carousel-item img {
        height: 60vh;
        }
        .carousel-caption h1,
        .carousel-caption h2 {
            font-size: 1.5rem !important;
        }
        .carousel-caption p {
            display: none !important;
        }

        .image-container {
            height: 60vh !important;
        }
    }
</style>
<div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/chambre-universitaire.jpg') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption animate__animated animate__fadeInDown">
                <div class="container text-center">
                    <h1 class="display-4 fw-bold mb-3">Bienvenue chez AURIMOB</h1>
                    <p class="lead d-none d-md-block">Votre solution pour des logements étudiants confortables à Douala.</p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/immeuble1.webp') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption animate__animated animate__zoomIn">
                <div class="container text-center">
                    <h2 class="display-5 fw-bold mb-3">Proximité des universités</h2>
                    <p class="fs-5 d-none d-md-block">À moins de 10 minutes des principaux campus.</p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/logement-etudiant.jpg') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption animate__animated animate__fadeInUp">
                <div class="container text-center">
                    <h2 class="display-5 fw-bold mb-3">Sécurité & Confort</h2>
                    <p class="fs-5 d-none d-md-block">24/7 sécurisé avec espaces communs.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- AVANTAGES -->
<section class="bg-light text-center py-5">
    <div class="container">
        <h2 class="mb-5 animate__animated animate__fadeIn">Pourquoi AURIMOB ?</h2>
        <div class="row">
            <div class="col-md-4 animate__animated animate__fadeInLeft">
                <i class="fa fa-wallet fa-3x text-success mb-3"></i>
                <h5>Prix Étudiants</h5>
                <p>Loyers adaptés au budget étudiant, sans frais cachés.</p>
            </div>
            <div class="col-md-4 animate__animated animate__fadeInUp">
                <i class="fa fa-map-marker-alt fa-3x text-info mb-3"></i>
                <h5>Près de Université</h5>
                <p>PK17, PK18, PK16, Logbessou... proches de tout.</p>
            </div>
            <div class="col-md-4 animate__animated animate__fadeInRight">
                <i class="fa fa-phone fa-3x text-warning mb-3"></i>
                <h5>Support Rapide</h5>
                <p>Contactez-nous facilement via WhatsApp ou téléphone.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA SECTION -->
<section class="bg-warning text-center py-5">
    <h2 class="animate__animated animate__heartBeat">Trouvez votre chambre maintenant !</h2>
    <p class="lead">Consultez nos offres disponibles et réservez en un clic.</p>
    <a href="{{ route('room') }}" class="btn btn-dark btn-lg mt-3 animate__animated animate__pulse animate__infinite">Voir les chambres</a>
</section>

<!-- PROPRIÉTÉS EN VITRINE -->
<section class="container py-5">
    <h2 class="text-center mb-4 animate__animated animate__fadeIn">Quelques chambres disponibles</h2>
    <div class="row">
        @foreach($properties->take(6) as $property)
            <div class="col-md-4 mb-4 animate__animated animate__zoomIn">
                <div class="card property-card h-100 shadow-sm">
                    <img src="{{ asset('uploads/uploads/' . $property->images[0]) }}"
                         class="card-img-top property-image"
                         alt="{{ $property->title }}"
                         style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $property->title }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($property->description, 80) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if($properties->count() > 6)
    <div class="text-center mt-4">
        <a href="{{ route('room') }}" class="btn btn-primary px-4">
            Voir tous nos chambres <i class="fas fa-arrow-right ms-2"></i>
        </a>
    </div>
    @endif
</section>
{{-- <section class="container py-5">
    <h2 class="text-center mb-4 animate__animated animate__fadeIn">Quelques logements disponibles</h2>
    <div class="row">
        @foreach($properties->take(6) as $property)
            <div class="col-md-4 mb-4 animate__animated animate__zoomIn">
                <div class="card property-card">
                    <img src="{{ asset('uploads/uploads/' . $property->images[0]) }}" class="card-img-top" alt="{{ $property->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $property->title }}</h5>
                        <p class="card-text">{{ Str::limit($property->description, 80) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section> --}}

@include('contact')

<!-- À PROPOS -->
<section class="bg-light py-5">
    <div class="container text-center">
        <h3 class="animate__animated animate__fadeInUp">Qui sommes-nous ?</h3>
        <p class="text-muted">AURIMOB est une agence immobilière spécialisée dans les chambres pour étudiants. Notre mission est de vous fournir des logements sûrs, confortables et proches de vos lieux d'études.</p>
    </div>
</section>
@endsection

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
@endpush

