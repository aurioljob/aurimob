{{-- <section class="bg-dark text-light py-5">
    <div class="container text-center">
        <h2 class="mb-4">Pour plus de detaille</h2>
        <p class="lead">Contactez-nous directement par téléphone ou WhatsApp. Nous sommes disponibles pour vous aider à trouver la chambre idéale !</p>
        <div class="d-flex justify-content-center gap-3 flex-wrap mt-4">
            <a href="tel:+237695217270" class="btn btn-outline-light btn-lg">
                <i class="fas fa-phone"></i> Appeler maintenant
            </a>
            <a href="https://wa.me/237695217270?text=Bonjour%20AURIMOB%2C%20je%20suis%20int%C3%A9ress%C3%A9(e)%20par%20l%E2%80%99une%20de%20vos%20chambres%20%C3%A0%20Douala.%20Pouvez-vous%20m%E2%80%99en%20dire%20plus%20s%E2%80%99il%20vous%20pla%C3%AEt%20%3F"
               target="_blank"
               class="btn btn-success btn-lg">
                <i class="fab fa-whatsapp"></i> WhatsApp
            </a>
        </div>
    </div>
</section> --}}

<section class="contact-cta bg-gradient-dark text-light py-6 position-relative overflow-hidden">
    <!-- Fond décoratif -->
    <div class="position-absolute top-0 start-0 w-100 h-100 opacity-10">
        <div class="pattern-dots-md" style="color: var(--bs-primary)"></div>
    </div>

    <div class="container position-relative">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <!-- Icône décorative -->
                <div class="mb-4">
                    <svg width="60" height="60" viewBox="0 0 24 24" class="text-primary">
                        <path fill="currentColor" d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 14H4V8l8 5l8-5v10zm-8-7L4 6h16l-8 5z"/>
                    </svg>
                </div>

                <!-- Titre avec animation -->
                <h2 class="display-5 fw-bold mb-4 animate__animated animate__fadeIn">
                    Trouvez votre logement idéal
                    <span class="text-primary">dès aujourd'hui</span>
                </h2>

                <!-- Texte avec limite de largeur -->
                <p class="lead mb-5 mx-auto" style="max-width: 600px">
                    Notre équipe est disponible 7j/7 pour vous conseiller. Contactez-nous par votre canal préféré :
                </p>

                <!-- Boutons avec effets -->
                <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
                    <!-- Bouton téléphone -->
                    <a href="tel:+237695217270"
                       class="btn btn-primary btn-lg px-4 py-3 rounded-pill shadow-sm hover-scale">
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-phone fs-5"></i>
                            <div>
                                <div class="fs-7">Appel direct</div>
                                <div class="fw-bold fs-6">+237 695 217 270</div>
                            </div>
                        </div>
                    </a>

                    <!-- Bouton WhatsApp -->
                    <a href="https://wa.me/237695217270?text=Bonjour%20AURIMOB%2C%20je%20suis%20int%C3%A9ress%C3%A9(e)%20par%20l%E2%80%99une%20de%20vos%20chambres%20%C3%A0%20Douala.%20Pouvez-vous%20m%E2%80%99en%20dire%20plus%20s%E2%80%99il%20vous%20pla%C3%AEt%20%3F"
                       target="_blank"
                       class="btn btn-success btn-lg px-4 py-3 rounded-pill shadow-sm hover-scale">
                        <div class="d-flex align-items-center gap-2">
                            <i class="fab fa-whatsapp fs-5"></i>
                            <div>
                                <div class="fs-7">Message instantané</div>
                                <div class="fw-bold fs-6">WhatsApp</div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Info complémentaire -->
                <p class="small mt-4 opacity-75">
                    <i class="fas fa-clock me-2"></i> Réponse garantie sous 2 heures
                </p>
            </div>
        </div>
    </div>
</section>

<style>
    .contact-cta {
        background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    }
    .hover-scale {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-scale:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .pattern-dots-md {
        background-image: radial-gradient(currentColor 1px, transparent 1px);
        background-size: 15px 15px;
    }
</style>
