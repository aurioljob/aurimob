@extends('base')

@section('title', $property->name)

@section('header')
    @include('user.navUser')
@endsection
@section('content')
<div class="container py-5">
    <!-- En-tête avec animation -->
    <div class="text-center mb-5" data-aos="fade-down">
        <h1 class="display-4 fw-bold gradient-text">{{$property->name}}</h1>
        <div class="divider mx-auto bg-primary"></div>
    </div>

    <!-- Galerie d'images modernisée -->
    <div class="row g-4 mb-5">
        @foreach ((array)$property->images as $key => $image)
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="{{ $key * 100 }}">
                <div class="gallery-card rounded-4 overflow-hidden shadow-lg">
                    <img src="{{ asset('uploads/uploads/' . $image) }}"
                         class="w-100 h-100 object-fit-cover gallery-image"
                         alt="Image du bien {{ $key + 1 }}"
                         data-bs-toggle="modal"
                         data-bs-target="#galleryModal"
                         data-bs-slide-to="{{ $key }}">
                </div>
            </div>
        @endforeach
    </div>

    <!-- Description avec effet de révélation -->
    <div class="row justify-content-center mb-5" data-aos="fade-up">
        <div class="col-lg-10">
            <div class="glass-card p-4 p-md-5 rounded-4">
                <h3 class="section-title mb-4">👌 Description</h3>
                <p class="lead text-center">{{$property->description}}</p>
            </div>
        </div>
    </div>

    <!-- Grille caractéristiques/specificités -->
    <div class="row g-4">
        <!-- Caractéristiques -->
        <div class="col-lg-8" data-aos="fade-right">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body p-4">
                    <h3 class="section-title mb-4">📋 Caractéristiques</h3>
                    <div class="features-grid">
                        <div class="feature-item">
                            <i class="fas fa-tag feature-icon"></i>
                            <div>
                                <span class="feature-label">Prix</span>
                                <span class="feature-value">{{ number_format($property->price, 0, ',', ' ') }} FCFA/Mois</span>
                            </div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-map-marker-alt feature-icon"></i>
                            <div>
                                <span class="feature-label">Zone</span>
                                <span class="feature-value">{{$property->zone}}</span>
                            </div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-layer-group feature-icon"></i>
                            <div>
                                <span class="feature-label">Catégorie</span>
                                <span class="feature-value">{{ $property->category->name ?? 'Non définie' }}</span>
                            </div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-info-circle feature-icon"></i>
                            <div>
                                <span class="feature-label">Status</span>
                                <span class="feature-value">{{$property->status}}</span>
                            </div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-building feature-icon"></i>
                            <div>
                                <span class="feature-label">Étage</span>
                                <span class="feature-value">{{$property->rooms ?? 'Rez-de-chaussée'}}</span>
                            </div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-ruler-combined feature-icon"></i>
                            <div>
                                <span class="feature-label">Surface</span>
                                <span class="feature-value">{{$property->surface}} m²</span>
                            </div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-door-open feature-icon"></i>
                            <div>
                                <span class="feature-label">Nombre de pièces</span>
                                <span class="feature-value">{{$property->number_of_pieces}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Spécificités -->
        <div class="col-lg-4" data-aos="fade-left">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body p-4">
                    <h3 class="section-title mb-4">✨ Spécificités</h3>
                    <div class="tags-cloud">
                        @foreach ($property->options as $option)
                            <span class="tag-item">
                                <i class="fas fa-check-circle me-2"></i>
                                {{$option->name}}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Gallery (pour les images en plein écran) -->
<div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body p-0">
                <div id="propertyCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ((array)$property->images as $key => $image)
                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                <img src="{{ asset('uploads/uploads/' . $image) }}"
                                     class="d-block w-100 rounded-3"
                                     style="max-height: 80vh; object-fit: contain;">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#propertyCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#propertyCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Styles modernes */
    .gradient-text {
        background: linear-gradient(135deg, #3B82F6 0%, #1D4ED8 100%);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .divider {
        width: 80px;
        height: 3px;
        background: #3B82F6;
        margin: 1rem auto;
    }

    .gallery-card {
        transition: all 0.3s ease;
        border: none;
        overflow: hidden;
        aspect-ratio: 1/1;
    }

    .gallery-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2) !important;
    }

    .gallery-image {
        transition: transform 0.5s ease;
        cursor: zoom-in;
    }

    .gallery-card:hover .gallery-image {
        transform: scale(1.05);
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .section-title {
        font-weight: 600;
        color: #1E40AF;
        position: relative;
        padding-bottom: 10px;
    }

    .section-title::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 3px;
        background: #3B82F6;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 1.5rem;
    }

    .feature-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background: rgba(59, 130, 246, 0.05);
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .feature-item:hover {
        background: rgba(59, 130, 246, 0.1);
        transform: translateX(5px);
    }

    .feature-icon {
        font-size: 1.5rem;
        color: #3B82F6;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(59, 130, 246, 0.1);
        border-radius: 50%;
    }

    .feature-label {
        display: block;
        font-size: 0.8rem;
        color: #6B7280;
    }

    .feature-value {
        font-weight: 600;
        color: #1F2937;
    }

    .tags-cloud {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .tag-item {
        background: #EFF6FF;
        color: #1D4ED8;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .tag-item:hover {
        background: #DBEAFE;
        transform: translateY(-2px);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .features-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    // Initialisation des animations
    AOS.init({
        duration: 800,
        once: true
    });

    // Initialisation de la galerie modale
    document.querySelectorAll('.gallery-image').forEach((img, index) => {
        img.addEventListener('click', function() {
            const carousel = document.querySelector('#propertyCarousel');
            const bsCarousel = new bootstrap.Carousel(carousel);
            bsCarousel.to(index);
        });
    });
</script>
@include('contact')
@endsection
