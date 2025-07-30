<div class="card property-card">
    <div class="card-body">
        @if(!empty($property->images))
            <div id="propertyCarousel-{{ $property->id }}" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ((array)$property->images as $key => $image)
                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}" style="height: 100%;">
                            <img src="{{ asset('uploads/uploads/' . $image) }}"
                                 class="d-block w-100 h-100"
                                 style="object-fit: cover;"
                                 alt="Image du bien {{ $key + 1 }}">
                        </div>
                    @endforeach
                </div>

                @if(count((array)$property->images) > 1)
                    <button class="carousel-control-prev" type="button" data-bs-target="#propertyCarousel-{{ $property->id }}" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Précédent</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#propertyCarousel-{{ $property->id }}" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Suivant</span>
                    </button>
                @endif
            </div>
        @else
            <div class="bg-light d-flex justify-content-center align-items-center" style="height: 250px;">
                <span class="text-muted">Aucune recherche disponible</span>
            </div>
        @endif

        <!-- Reste du contenu de la carte -->
        <p class="card-text">{{ $property->surface }} m² - {{ $property->zone }} ({{ $property->status }})</p>
        <div class="text-primary fw-bold" style="font-size: 1.4rem">
            {{ number_format($property->price, 2, ',', ' ') }} Francs
        </div>
        <a href="{{ route('room.show', ['slug' => Str::slug($property->name), 'property' => $property->id]) }}" class="btn btn-outline-primary mt-auto">Détail</a>
    </div>
</div>
