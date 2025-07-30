@extends('base')

@section('title','chambres')

@section('header')
    @include('user.navUser')
@endsection

@section('content')
<!-- SECTION DE RECHERCHE AVANCÉE -->
<section class="search-hero py-6 position-relative overflow-hidden" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
    <div class="container position-relative z-index-1">
        <div class="text-center mb-5 mt-4" data-aos="fade-up">
            <h2 class="display-5 fw-bold mb-3">Trouvez Votre Havre de Paix</h2>
            <p class="lead text-muted">Découvrez des chambres étudiantes conçues pour votre confort et réussite</p>
            <div class="divider mx-auto bg-primary"></div>
        </div>

        <div class="search-card shadow-lg rounded-4 overflow-hidden" data-aos="fade-up" data-aos-delay="200">
            <form action="" method="get" class="p-4 p-lg-5 bg-white">
                <div class="row g-4">
                    <div class="col-md-3">
                        <div class="form-floating">
                            <select class="form-select" id="zone" name="zone">
                                <option value="" selected>Toutes zones</option>
                                <option value="Logbessou">Logbessou</option>
                                <option value="PK15">PK15</option>
                                <option value="PK16">PK16</option>
                                <option value="PK17">PK17</option>
                                <option value="PK18">PK18</option>
                                <option value="PK19">PK19</option>
                            </select>
                            <label for="zone"><i class="fas fa-map-marker-alt text-primary me-2"></i> Zone</label>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="number" class="form-control" id="price" name="price" placeholder="Budget max">
                            <label for="price"><i class="fas fa-wallet text-primary me-2"></i> Budget max (FCFA)</label>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="number" class="form-control" id="surface" name="surface" placeholder="Surface minimum">
                            <label for="surface"><i class="fas fa-vector-square text-primary me-2"></i> Surface minimum (m²)</label>
                        </div>
                    </div>

                    <div class="col-md-3 d-grid">
                        <button type="submit" class="btn btn-primary btn-lg h-100 rounded-3 hover-scale">
                            <i class="fas fa-search me-2"></i> Rechercher
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- SECTION DES CHAMBRES -->
<section class="container py-5">
<section class="py-6 bg-white">
    <div class="container">
        <div class="text-center mb-6" data-aos="fade-up">
            <h2 class="display-5 fw-bold mb-3">Nos Chambres Disponibles</h2>
            <p class="lead text-muted">Découvrez des espaces conçus pour votre bien-être</p>
            <div class="divider mx-auto bg-primary"></div>
        </div>

        <div class="row g-4 property-grid">
            @forelse ($properties as $property)
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                <!-- Votre carte existante avec wrapper animé -->
                <div class="h-100 animate__animated animate__fadeInUp">
                    @include('user.rooms.card', ['property' => $property])
                </div>
            </div>
            @empty
            <div class="col-12" data-aos="fade-up">
                <div class="empty-state text-center p-5 rounded-4 bg-light">
                    <img src="{{ asset('images/empty.png') }}" alt="Aucun résultat" height="120" class="mb-4">
                    <h4 class="mb-3">Aucune chambre ne correspond à votre recherche</h4>
                    <p class="text-muted mb-4">Essayez d'élargir vos critères ou contactez-nous pour une recherche personnalisée</p>
                    <a href="{{ route('room') }}" class="btn btn-primary px-4">
                        <i class="fas fa-redo me-2"></i> Réinitialiser la recherche
                    </a>
                </div>
            </div>
            @endforelse
        </div>
        <!-- En dehors du row -->
        <div class="container my-4">
            <div class="d-flex justify-content-center">
                {{ $properties->links() }}
            </div>
        </div>
@endsection
