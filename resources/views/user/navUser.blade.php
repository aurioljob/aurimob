{{--
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm py-3">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('images/monLogo.png') }}" alt="AURIMOB" height="45" class="rounded-circle me-2">
            <span class="fw-bold">AURIMOB</span>
        </a>

        <!-- Burger -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            @php
                $route = request()->route()->getName();
            @endphp
            <ul class="navbar-nav me-3">
                <li class="nav-item">
                    <a class="nav-link {{ $route === 'home' ? 'active fw-bold text-info' : '' }}" href="{{ route('home') }}">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $route === 'room' ? 'active fw-bold text-info' : '' }}" href="{{ route('room') }}">Chambres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $route === 'contact' ? 'active fw-bold text-info' : '' }}" href="{{ route('contact') }}">Contacts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $route === 'about' ? 'active fw-bold text-info' : '' }}" href="{{ route('about') }}">À propos</a>
                </li>
            </ul>
        </div>
    </div>
</nav> --}}

{{-- <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm py-3">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('images/monLogo.png') }}" alt="AURIMOB" height="45" class="rounded-circle me-2">
            <span class="fw-bold text-primary">AURIMOB</span>
        </a>
        <!-- Burger -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Menu -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            @php
                $route = request()->route()->getName();
            @endphp
            <ul class="navbar-nav">
                <li class="nav-item mx-2">
                    <a class="nav-link {{ $route === 'home' ? 'active fw-bold text-info' : '' }}" href="{{ route('home') }}">
                        <i class="fas fa-home me-1"></i> Accueil
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link {{ $route === 'room' ? 'active fw-bold text-info' : '' }}" href="{{ route('room') }}">
                        <i class="fas fa-bed me-1"></i> Chambres
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link {{ $route === 'contact' ? 'active fw-bold text-info' : '' }}" href="{{ route('contact') }}">
                        <i class="fas fa-envelope me-1"></i> Contacts
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link {{ $route === 'about' ? 'active fw-bold text-info' : '' }}" href="{{ route('about') }}">
                        <i class="fas fa-info-circle me-1"></i> À propos
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<style>
    .navbar {
    transition: all 0.3s ease;
}

.navbar-light .navbar-nav .nav-link {
    color: #555;
    font-size: 1.1rem;
    transition: color 0.3s ease;
}

.navbar-light .navbar-nav .nav-link:hover {
    color: #0d6efd;
}

.navbar-light .navbar-nav .nav-link.active {
    color: #0d6efd;
    font-weight: bold;
}

.navbar-brand img {
    transition: transform 0.3s ease;
}

.navbar-brand img:hover {
    transform: scale(1.1);
}

</style> --}}

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg fixed-top" style="background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);">
    <div class="container">
        <!-- Logo avec animation -->
        <a class="navbar-brand d-flex align-items-center hover-scale" href="{{ route('home') }}" style="transition: all 0.3s ease;">
            <div class="logo-wrapper position-relative me-2">
                <img src="{{ asset('images/monLogo.png') }}" alt="AURIMOB" height="50" class="rounded-circle shadow-sm">
                <div class="logo-glow position-absolute top-0 start-0 w-100 h-100 rounded-circle"></div>
            </div>
            <span class="fw-bold fs-4 ms-2" style="letter-spacing: 1px;">AURIMOB</span>
        </a>

        <!-- Burger menu animé -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu principal -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            @php
                $currentRoute = request()->route()->getName();
            @endphp

            <ul class="navbar-nav">
                <li class="nav-item mx-1">
                    <a class="nav-link position-relative px-3 {{ $currentRoute === 'home' ? 'active' : '' }}"
                       href="{{ route('home') }}">
                        <span class="nav-link-text"> Accueil</span>
                        <span class="nav-underline"></span>
                    </a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link position-relative px-3 {{ $currentRoute === 'room' ? 'active' : '' }}"
                       href="{{ route('room') }}">
                        <span class="nav-link-text">Nos Chambres</span>
                        <span class="nav-underline"></span>
                    </a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link position-relative px-3 {{ $currentRoute === 'contact' ? 'active' : '' }}"
                       href="{{ route('contact') }}">
                        <span class="nav-link-text"> Contact</span>
                        <span class="nav-underline"></span>
                    </a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link position-relative px-3 {{ $currentRoute === 'about' ? 'active' : '' }}"
                       href="{{ route('about') }}">
                        <span class="nav-link-text"> À propos</span>
                        <span class="nav-underline"></span>
                    </a>
                </li>
            </ul>

            <!-- Bouton CTA -->
            <div class="ms-lg-4 mt-3 mt-lg-0">
                <a href="tel:+237695217270" class="btn btn-outline-light btn-sm rounded-pill px-3 py-2">
                    <i class="fas fa-phone-alt me-2"></i> Appelez-nous
                </a>
            </div>
        </div>
    </div>
</nav>

<style>
    /* Animation du logo */
    .hover-scale:hover {
        transform: scale(1.03);
    }

    .logo-glow {
        box-shadow: 0 0 15px rgba(255, 255, 255, 0.5);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .navbar-brand:hover .logo-glow {
        opacity: 0.7;
    }

    /* Style des liens */
    .nav-link {
        color: rgba(255, 255, 255, 0.85) !important;
        font-weight: 500;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
    }

    .nav-link:hover {
        color: white !important;
        transform: translateY(-2px);
    }

    .nav-link.active {
        color: white !important;
        font-weight: 600;
    }

    /* Soulignement animé */
    .nav-underline {
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 0;
        height: 2px;
        background: white;
        transform: translateX(-50%);
        transition: width 0.3s ease;
    }

    .nav-link:hover .nav-underline,
    .nav-link.active .nav-underline {
        width: 50%;
    }

    /* Burger menu animé */
    .navbar-toggler {
        border: none;
        padding: 0.5rem;
    }

    .navbar-toggler span {
        display: block;
        width: 25px;
        height: 2px;
        background: white;
        margin: 5px 0;
        transition: all 0.3s ease;
    }

    .navbar-toggler[aria-expanded="true"] span:nth-child(1) {
        transform: translateY(7px) rotate(45deg);
    }

    .navbar-toggler[aria-expanded="true"] span:nth-child(2) {
        opacity: 0;
    }

    .navbar-toggler[aria-expanded="true"] span:nth-child(3) {
        transform: translateY(-7px) rotate(-45deg);
    }
</style>

<script>
    // Animation au scroll
    document.addEventListener('DOMContentLoaded', function() {
        const navbar = document.querySelector('.navbar');

        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.1)';
                navbar.style.background = 'linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%)';
            } else {
                navbar.style.boxShadow = 'none';
                navbar.style.background = 'linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%)';
            }
        });
    });
</script>
