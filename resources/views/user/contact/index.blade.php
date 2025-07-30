@extends('base')

@section('title','contact')

@section('header')
    @include('user.navUser')
@endsection

@section('content')
    <!-- SECTION HERO CONTACT -->
<section class="bg-primary text-white text-center py-5 animate__animated animate__fadeInDown mt-2">
    <div class="container">
        <h1 class="display-5">📞 Contactez-nous</h1>
        <p class="lead">Nous sommes là pour répondre à toutes vos questions.</p>
    </div>
</section>

<!-- SECTION INFOS DE CONTACT -->
<section class="py-5 bg-light animate__animated animate__fadeInUp">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="p-4 border rounded bg-white shadow-sm h-100">
                    <i class="fas fa-phone fa-2x text-primary mb-2"></i>
                    <h5>Téléphone</h5>
                    <p><a href="tel:+237695217270" class="text-dark">+237 695 21 72 70</a></p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="p-4 border rounded bg-white shadow-sm h-100">
                    <i class="fab fa-whatsapp fa-2x text-success mb-2"></i>
                    <h5>WhatsApp</h5>
                    <p>
                        <a href="https://wa.me/237695217270?text=Bonjour%20AURIMOB%2C%20j'aimerais%20avoir%20plus%20d'infos%20sur%20les%20logements."
                           class="text-dark"
                           target="_blank">
                           Écrivez-nous
                        </a>
                    </p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="p-4 border rounded bg-white shadow-sm h-100">
                    <i class="fas fa-map-marker-alt fa-2x text-danger mb-2"></i>
                    <h5>Adresse</h5>
                    <p>Douala, PK17 - Cameroun</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION FORMULAIRE DE CONTACT (optionnel) -->
<section class="py-5 animate__animated animate__fadeIn">
    <div class="container">
        <h2 class="text-center mb-4">✉️ Laissez-nous un message</h2>
        <form action="#" class="row g-3">
            @csrf
            <div class="col-md-6">
                <input type="text" name="name" class="form-control" placeholder="Votre nom" required>
            </div>
            <div class="col-md-6">
                <input type="email" name="email" class="form-control" placeholder="Votre email" required>
            </div>
            <div class="col-12">
                <textarea name="message" class="form-control" rows="5" placeholder="Votre message" required></textarea>
            </div>
            <div class="col-12 text-center">
                <button class="btn btn-primary btn-lg px-5">Envoyer</button>
            </div>
        </form>
    </div>
</section>
@endsection
