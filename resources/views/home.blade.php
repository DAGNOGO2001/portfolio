```blade
<x-layout>

{{-- =========================================================
     HERO / ACCUEIL
========================================================= --}}
<section id="accueil" class="hero">
    <div class="container hero-container">

        <div class="hero-content">

            <div class="availability">
                <span></span>
                Disponible pour de nouvelles opportunités
            </div>

            <p class="hero-intro">Bonjour, je suis</p>

            <h1>
                {{ $parametre?->nom ?? 'DAGNOGO TCHABOUAN' }}
            </h1>

            <h2>
                Développeur
                <span>Web & Mobile</span>
            </h2>

            <p class="hero-description">
                {{ $parametre?->description
                    ?? "Je conçois et développe des applications web et mobiles modernes, performantes et adaptées aux besoins des utilisateurs." }}
            </p>

            <div class="hero-actions">
                <a href="#projets" class="btn btn-primary">
                    Découvrir mes projets
                    <i class="bi bi-arrow-right"></i>
                </a>

                <a href="#contact" class="btn btn-secondary">
                    Me contacter
                </a>
            </div>

            <div class="hero-tech">
                <span>Technologies :</span>

                <div class="tech-list">
                    <span>Laravel</span>
                    <span>PHP</span>
                    <span>JavaScript</span>
                    <span>Kotlin</span>
                    <span>MySQL</span>
                </div>
            </div>

        </div>

        <div class="hero-profile">

            <div class="profile-card">

                <div class="profile-top">
                    <span class="profile-dot"></span>
                    <span>developer.profile</span>
                </div>

                <div class="profile-photo">

                    @if($parametre?->photo)

                        <img
                            src="{{ asset('storage/' . $parametre->photo) }}"
                            alt="Photo de {{ $parametre->nom ?? 'Dagnogo Tchabouan' }}"
                        >

                    @else

                        <img
                            src="{{ asset('images/profil.jpg') }}"
                            alt="Photo de profil"
                        >

                    @endif

                </div>

                <div class="profile-info">

                    <h3>
                        {{ $parametre?->nom ?? 'Dagnogo Tchabouan' }}
                    </h3>

                    <p>Développeur Web & Mobile</p>

                    <div class="profile-location">
                        <i class="bi bi-geo-alt"></i>
                        {{ $parametre?->localisation ?? "Abidjan, Côte d'Ivoire" }}
                    </div>

                </div>

            </div>

            <div class="floating-code code-one">&lt;/&gt;</div>
            <div class="floating-code code-two">{ }</div>

        </div>

    </div>
</section>


{{-- =========================================================
     À PROPOS
========================================================= --}}
<section id="apropos" class="section about">

    <div class="container">

        <div class="section-heading">
            <span>01 — À PROPOS</span>
            <h2>Qui suis-je ?</h2>
            <p>
                Quelques informations sur mon parcours et ma passion pour le numérique.
            </p>
        </div>

        <div class="about-grid">

            <div class="about-image-wrapper">

                <div class="about-image">

                    @if($parametre?->photo)

                        <img
                            src="{{ asset('storage/' . $parametre->photo) }}"
                            alt="Photo de {{ $parametre->nom ?? 'Dagnogo Tchabouan' }}"
                        >

                    @else

                        <img
                            src="{{ asset('images/profil.jpg') }}"
                            alt="Dagnogo Tchabouan"
                        >

                    @endif

                </div>

                <div class="about-badge">
                    <i class="bi bi-code-slash"></i>
                    Développeur
                </div>

            </div>

            <div class="about-content">

                <span class="small-label">MON PROFIL</span>

                <h3>
                    Passionné par le développement
                    <span>et les nouvelles technologies.</span>
                </h3>

                <p>
                    Je suis
                    <strong>
                        {{ $parametre?->nom ?? 'Dagnogo Tchabouan' }}
                    </strong>,
                    étudiant en Licence Professionnelle en informatique.
                    Je m'intéresse particulièrement au développement web
                    et mobile.
                </p>

                <p>
                    Au cours de ma formation et de mes expériences,
                    j'ai travaillé sur différents projets permettant
                    de développer mes compétences en programmation,
                    bases de données, conception d'interfaces et
                    développement d'applications.
                </p>

                <p>
                    Mon objectif est de continuer à progresser,
                    acquérir de l'expérience professionnelle et
                    participer à la création de solutions numériques
                    utiles et innovantes.
                </p>

                <div class="about-details">

                    <div>
                        <span>Nom</span>
                        <strong>
                            {{ $parametre?->nom ?? 'Dagnogo Tchabouan' }}
                        </strong>
                    </div>

                    <div>
                        <span>Domaine</span>
                        <strong>Informatique</strong>
                    </div>

                    <div>
                        <span>Spécialité</span>
                        <strong>Web & Mobile</strong>
                    </div>

                    <div>
                        <span>Localisation</span>
                        <strong>
                            {{ $parametre?->localisation ?? "Abidjan, Côte d'Ivoire" }}
                        </strong>
                    </div>

                </div>

                @if($parametre?->cv)

                    <a
                        href="{{ asset('storage/' . $parametre->cv) }}"
                        class="btn btn-primary"
                        download
                    >
                        <i class="bi bi-download"></i>
                        Télécharger mon CV
                    </a>

                @endif

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     COMPÉTENCES
========================================================= --}}
<section id="competences" class="section skills">

    <div class="container">

        <div class="section-heading">
            <span>02 — COMPÉTENCES</span>
            <h2>Mes compétences techniques</h2>
            <p>
                Les technologies et outils que j'utilise pour développer mes projets.
            </p>
        </div>

        <div class="skills-grid">

            @forelse($competences ?? [] as $competence)

                <article class="skill-card">

                    <div class="skill-header">

                        <div class="skill-icon">
                            <i class="{{ $competence->icone ?: 'bi bi-code-slash' }}"></i>
                        </div>

                        <span>
                            {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                        </span>

                    </div>

                    <h3>
                        {{ $competence->nom }}
                    </h3>

                    @if($competence->categorie)

                        <p class="skill-category">
                            {{ $competence->categorie }}
                        </p>

                    @endif

                    @if($competence->niveau)

                        @php
                            $niveau = (int) str_replace('%', '', $competence->niveau);
                            $niveau = max(0, min(100, $niveau));
                        @endphp

                        <div class="skill-level">

                            <div>
                                <span>Maîtrise</span>
                                <strong>{{ $competence->niveau }}</strong>
                            </div>

                            <div class="progress">
                                <div
                                    class="progress-bar"
                                    style="width: {{ $niveau }}%"
                                ></div>
                            </div>

                        </div>

                    @endif

                </article>

            @empty

                <div class="empty-state">
                    <i class="bi bi-code-square"></i>
                    <h3>Aucune compétence disponible</h3>
                    <p>Les compétences seront affichées ici.</p>
                </div>

            @endforelse

        </div>

    </div>

</section>


{{-- =========================================================
     PROJETS
========================================================= --}}
<section id="projets" class="section projects">

    <div class="container">

        <div class="section-heading">
            <span>03 — PROJETS</span>
            <h2>Mes réalisations</h2>
            <p>
                Une sélection de projets réalisés pendant ma formation
                et mes expériences.
            </p>
        </div>

        <div class="projects-grid">

            @forelse($projets ?? [] as $projet)

                <article class="project-card">

                    <div class="project-image">

                        @if($projet->image)

                            <img
                                src="{{ asset('storage/' . $projet->image) }}"
                                alt="{{ $projet->titre }}"
                            >

                        @else

                            <img
                                src="{{ asset('images/projets/default.jpg') }}"
                                alt="{{ $projet->titre }}"
                            >

                        @endif

                        <div class="project-overlay">

                            @if($projet->demo_url)

                                <a
                                    href="{{ $projet->demo_url }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    title="Voir le projet"
                                >
                                    <i class="bi bi-box-arrow-up-right"></i>
                                </a>

                            @endif

                            @if($projet->github_url)

                                <a
                                    href="{{ $projet->github_url }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    title="Code source"
                                >
                                    <i class="bi bi-github"></i>
                                </a>

                            @endif

                        </div>

                    </div>

                    <div class="project-content">

                        <span class="project-type">
                            PROJET
                        </span>

                        <h3>
                            {{ $projet->titre }}
                        </h3>

                        @if($projet->description)

                            <p>
                                {!! nl2br(e($projet->description)) !!}
                            </p>

                        @endif

                        @if($projet->technologies)

                            <div class="project-technologies">

                                @foreach(explode(',', $projet->technologies) as $technologie)

                                    @if(trim($technologie))

                                        <span>
                                            {{ trim($technologie) }}
                                        </span>

                                    @endif

                                @endforeach

                            </div>

                        @endif

                        <div class="project-links">

                            @if($projet->demo_url)

                                <a
                                    href="{{ $projet->demo_url }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    Voir le projet
                                    <i class="bi bi-arrow-up-right"></i>
                                </a>

                            @endif

                            @if($projet->github_url)

                                <a
                                    href="{{ $projet->github_url }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    <i class="bi bi-github"></i>
                                    GitHub
                                </a>

                            @endif

                            @if($projet->apk_url)

                                <a
                                    href="{{ asset('storage/' . $projet->apk_url) }}"
                                    download
                                >
                                    <i class="bi bi-android2"></i>
                                    APK
                                </a>

                            @endif

                        </div>

                    </div>

                </article>

            @empty

                <div class="empty-state">
                    <i class="bi bi-folder2-open"></i>
                    <h3>Aucun projet enregistré</h3>
                    <p>Les projets seront affichés ici.</p>
                </div>

            @endforelse

        </div>

    </div>

</section>


{{-- =========================================================
     EXPÉRIENCES
========================================================= --}}
<section id="experiences" class="section experience">

    <div class="container">

        <div class="section-heading">
            <span>04 — EXPÉRIENCE</span>
            <h2>Mon parcours professionnel</h2>
            <p>
                Mes principales expériences et missions réalisées.
            </p>
        </div>

        <div class="timeline">

            @forelse($experiences ?? [] as $experience)

                <div class="timeline-item">

                    <div class="timeline-marker">
                        <span></span>
                    </div>

                    <div class="timeline-card">

                        <div class="timeline-date">

                            @if($experience->date_debut)
                                {{ \Carbon\Carbon::parse($experience->date_debut)->format('Y') }}
                            @endif

                            @if($experience->date_fin)
                                — {{ \Carbon\Carbon::parse($experience->date_fin)->format('Y') }}
                            @else
                                — Aujourd'hui
                            @endif

                        </div>

                        <h3>
                            {{ $experience->poste }}
                        </h3>

                        <h4>
                            <i class="bi bi-building"></i>
                            {{ $experience->entreprise }}

                            @if($experience->lieu)
                                <span>— {{ $experience->lieu }}</span>
                            @endif
                        </h4>

                        @if($experience->description)

                            <p>
                                {!! nl2br(e($experience->description)) !!}
                            </p>

                        @endif

                    </div>

                </div>

            @empty

                <div class="empty-state">
                    <i class="bi bi-briefcase"></i>
                    <h3>Aucune expérience enregistrée</h3>
                </div>

            @endforelse

        </div>

    </div>

</section>


{{-- =========================================================
     FORMATION
========================================================= --}}
<section id="formation" class="section education">

    <div class="container">

        <div class="section-heading">
            <span>05 — FORMATION</span>
            <h2>Mon parcours académique</h2>
            <p>
                Les formations et diplômes qui construisent mon parcours.
            </p>
        </div>

        <div class="education-grid">

            @forelse($formations ?? [] as $formation)

                <article class="education-card">

                    <div class="education-icon">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>

                    <div class="education-content">

                        <div class="education-date">

                            @if($formation->date_debut)
                                {{ \Carbon\Carbon::parse($formation->date_debut)->format('Y') }}
                            @endif

                            @if($formation->date_fin)
                                — {{ \Carbon\Carbon::parse($formation->date_fin)->format('Y') }}
                            @else
                                — Aujourd'hui
                            @endif

                        </div>

                        <h3>
                            {{ $formation->diplome }}
                        </h3>

                        <p class="education-school">
                            <i class="bi bi-building"></i>
                            {{ $formation->etablissement }}
                        </p>

                        @if($formation->description)

                            <p class="education-description">
                                {!! nl2br(e($formation->description)) !!}
                            </p>

                        @endif

                    </div>

                </article>

            @empty

                <div class="empty-state">
                    <i class="bi bi-mortarboard"></i>
                    <h3>Aucune formation enregistrée</h3>
                </div>

            @endforelse

        </div>

    </div>

</section>


{{-- =========================================================
     CERTIFICATIONS
========================================================= --}}
<section id="certifications" class="section certifications">

    <div class="container">

        <div class="section-heading">
            <span>06 — CERTIFICATIONS</span>
            <h2>Certifications & attestations</h2>
            <p>
                Mes certifications et attestations obtenues.
            </p>
        </div>

        <div class="certifications-grid">

            @forelse($certifications ?? [] as $certification)

                <article class="certification-card">

                    <div class="certification-image">

                        @if($certification->image)

                            <img
                                src="{{ asset('storage/' . $certification->image) }}"
                                alt="{{ $certification->titre }}"
                            >

                        @else

                            <div class="certificate-placeholder">
                                <i class="bi bi-award"></i>
                            </div>

                        @endif

                    </div>

                    <div class="certification-content">

                        <span class="certification-label">
                            <i class="bi bi-patch-check-fill"></i>
                            CERTIFICATION
                        </span>

                        <h3>
                            {{ $certification->titre }}
                        </h3>

                        @if($certification->organisme)

                            <p class="certification-organisme">
                                <i class="bi bi-building"></i>
                                {{ $certification->organisme }}
                            </p>

                        @endif

                        @if($certification->description)

                            <p class="certification-description">
                                {!! nl2br(e($certification->description)) !!}
                            </p>

                        @endif

                        @if($certification->date_obtention)

                            <div class="certification-date">

                                <i class="bi bi-calendar-check"></i>

                                Obtenue le
                                {{ \Carbon\Carbon::parse($certification->date_obtention)->format('d/m/Y') }}

                            </div>

                        @endif

                        <div class="certification-actions">

                            @if($certification->document)

                                <a
                                    href="{{ asset('storage/' . $certification->document) }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    <i class="bi bi-file-earmark-pdf"></i>
                                    Voir le certificat
                                </a>

                            @endif

                            @if($certification->lien)

                                <a
                                    href="{{ $certification->lien }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    <i class="bi bi-patch-check"></i>
                                    Vérifier
                                </a>

                            @endif

                        </div>

                    </div>

                </article>

            @empty

                <div class="empty-state">
                    <i class="bi bi-award"></i>
                    <h3>Aucune certification disponible</h3>
                    <p>Mes certifications seront affichées ici.</p>
                </div>

            @endforelse

        </div>

    </div>

</section>


{{-- =========================================================
     SERVICES
========================================================= --}}
<section id="services" class="section services">

    <div class="container">

        <div class="section-heading">
            <span>07 — SERVICES</span>
            <h2>Ce que je peux faire pour vous</h2>
            <p>
                Des solutions numériques adaptées à vos besoins.
            </p>
        </div>

        <div class="services-grid">

            @forelse($services ?? [] as $index => $service)

                <article class="service-card">

                    <div class="service-top">

                        <span class="service-number">
                            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                        </span>

                        <div class="service-icon">
                            <i class="{{ $service->icone ?: 'bi bi-code-slash' }}"></i>
                        </div>

                    </div>

                    <h3>
                        {{ $service->titre }}
                    </h3>

                    @if($service->description)

                        <p>
                            {!! nl2br(e($service->description)) !!}
                        </p>

                    @endif

                    <div class="service-arrow">
                        <i class="bi bi-arrow-up-right"></i>
                    </div>

                </article>

            @empty

                <div class="empty-state">
                    <i class="bi bi-briefcase"></i>
                    <h3>Aucun service disponible</h3>
                    <p>Mes services seront affichés ici prochainement.</p>
                </div>

            @endforelse

        </div>

    </div>

</section>


{{-- =========================================================
     CONTACT
========================================================= --}}
<section id="contact" class="section contact">

    <div class="container">

        <div class="section-heading light">

            <span>08 — CONTACT</span>

            <h2>Travaillons ensemble</h2>

            <p>
                Vous avez un projet ou une opportunité ?
                N'hésitez pas à me contacter.
            </p>

        </div>

        <div class="contact-grid">

            <div class="contact-info">

                <h3>
                    Construisons ensemble
                    <span>des solutions numériques.</span>
                </h3>

                <p>
                    Je suis disponible pour discuter d'un projet,
                    d'une opportunité professionnelle ou d'une
                    collaboration.
                </p>

                @if($parametre?->email)

                    <div class="contact-item">

                        <div class="contact-icon">
                            <i class="bi bi-envelope"></i>
                        </div>

                        <div>

                            <span>Email</span>

                            <a href="mailto:{{ $parametre->email }}">
                                {{ $parametre->email }}
                            </a>

                        </div>

                    </div>

                @endif

                @if($parametre?->telephone)

                    <div class="contact-item">

                        <div class="contact-icon">
                            <i class="bi bi-telephone"></i>
                        </div>

                        <div>

                            <span>Téléphone</span>

                            <a href="tel:{{ $parametre->telephone }}">
                                {{ $parametre->telephone }}
                            </a>

                        </div>

                    </div>

                @endif

                @if($parametre?->localisation)

                    <div class="contact-item">

                        <div class="contact-icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>

                        <div>

                            <span>Localisation</span>

                            <p>
                                {{ $parametre->localisation }}
                            </p>

                        </div>

                    </div>

                @endif

                <div class="contact-socials">

                    @if($parametre?->github)

                        <a
                            href="{{ $parametre->github }}"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            <i class="bi bi-github"></i>
                        </a>

                    @endif

                    @if($parametre?->linkedin)

                        <a
                            href="{{ $parametre->linkedin }}"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            <i class="bi bi-linkedin"></i>
                        </a>

                    @endif

                </div>

            </div>


            {{-- =====================================================
                 FORMULAIRE DE CONTACT CORRIGÉ
            ====================================================== --}}

            <form
                class="contact-form"
                action="{{ route('contact.store') }}"
                method="POST"
                autocomplete="off"
            >

                @csrf

                <div class="form-title">

                    <i class="bi bi-chat-square-text"></i>

                    Envoyez-moi un message

                </div>


                {{-- MESSAGE DE SUCCÈS --}}

                @if(session('success'))

                    <div class="form-success">
                        <i class="bi bi-check-circle-fill"></i>
                        {{ session('success') }}
                    </div>

                @endif


                {{-- ERREURS DE VALIDATION --}}

                @if($errors->any())

                    <div class="form-errors">

                        <strong>
                            Veuillez corriger les erreurs suivantes :
                        </strong>

                        <ul>

                            @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                <div class="form-row">

                    <div class="form-group">

                        <label for="nom">
                            Nom
                        </label>

                        <input
                            type="text"
                            id="nom"
                            name="nom"
                            value="{{ old('nom') }}"
                            placeholder="Votre nom"
                            autocomplete="name"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="email">
                            Email
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Votre email"
                            autocomplete="email"
                            required
                        >

                    </div>

                </div>


                <div class="form-group">

                    <label for="sujet">
                        Sujet
                    </label>

                    <input
                        type="text"
                        id="sujet"
                        name="sujet"
                        value="{{ old('sujet') }}"
                        placeholder="Sujet de votre message"
                    >

                </div>


                <div class="form-group">

                    <label for="message">
                        Message
                    </label>

                    <textarea
                        id="message"
                        name="message"
                        rows="6"
                        placeholder="Décrivez votre projet ou votre demande..."
                        required
                    >{{ old('message') }}</textarea>

                </div>


                <button
                    type="submit"
                    class="btn btn-primary submit-button"
                >

                    <span>
                        Envoyer le message
                    </span>

                    <i class="bi bi-send"></i>

                </button>

            </form>

        </div>

    </div>

</section>


{{-- =========================================================
     STYLE
========================================================= --}}
<style>

:root {

    --primary: #16a34a;
    --primary-light: #22c55e;
    --primary-soft: #dcfce7;

    --dark: #0f172a;
    --dark-2: #172033;
    --dark-3: #1e293b;

    --text: #17251d;
    --muted: #64748b;

    --white: #ffffff;

    --background: #f8fafc;
    --background-2: #f1f5f9;

    --border: #e2e8f0;

    --shadow:
        0 10px 30px rgba(15, 23, 42, .07);

    --shadow-lg:
        0 20px 50px rgba(15, 23, 42, .12);

}


/* =========================================================
   GLOBAL
========================================================= */

html {
    scroll-behavior: smooth;
}

body {
    background: var(--background);
    color: var(--text);
    font-size: 16px;
}

section {
    position: relative;
    overflow: hidden;
}

.section {
    padding: 110px 0;
}

.container {
    position: relative;
    z-index: 2;
}


/* =========================================================
   HERO
========================================================= */

.hero {

    min-height: 90vh;

    display: flex;

    align-items: center;

    padding: 140px 0 110px;

    background:
        linear-gradient(
            135deg,
            #f8fafc 0%,
            #ffffff 50%,
            #f0fdf4 100%
        );
}

.hero-container {

    display: grid;

    grid-template-columns:
        1.15fr .85fr;

    align-items: center;

    gap: 80px;
}

.hero-content {
    max-width: 720px;
}

.availability {

    display: inline-flex;

    align-items: center;

    gap: 10px;

    padding: 10px 16px;

    margin-bottom: 28px;

    border: 1px solid #bbf7d0;

    border-radius: 7px;

    background: #f0fdf4;

    color: #15803d;

    font-size: 14px;

    font-weight: 700;
}

.availability span {

    width: 9px;
    height: 9px;

    border-radius: 50%;

    background: var(--primary);
}

.hero-intro {

    margin: 0 0 9px;

    color: var(--primary);

    font-size: 19px;

    font-weight: 700;
}

.hero h1 {

    margin: 0;

    color: var(--dark);

    font-size: clamp(48px, 6vw, 78px);

    line-height: 1;

    letter-spacing: -3px;

    font-weight: 900;
}

.hero h2 {

    margin: 22px 0;

    color: var(--dark-3);

    font-size: clamp(30px, 3vw, 42px);

    line-height: 1.2;

    font-weight: 700;
}

.hero h2 span {
    color: var(--primary);
}

.hero-description {

    max-width: 680px;

    margin: 0 0 34px;

    color: var(--muted);

    font-size: 18px;

    line-height: 1.8;
}

.hero-actions {

    display: flex;

    flex-wrap: wrap;

    gap: 14px;
}

.btn {

    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: 10px;

    padding: 15px 24px;

    border-radius: 8px;

    border: 1px solid transparent;

    font-size: 16px;

    font-weight: 700;

    text-decoration: none;

    transition: .25s ease;
}

.btn-primary {

    background: var(--primary);

    color: white;
}

.btn-primary:hover {

    background: #15803d;

    color: white;

    transform: translateY(-2px);

    box-shadow:
        0 10px 25px rgba(22,163,74,.2);
}

.btn-secondary {

    background: white;

    border-color: var(--border);

    color: var(--dark);
}

.btn-secondary:hover {

    border-color: var(--primary);

    color: var(--primary);

    transform: translateY(-2px);
}

.hero-tech {

    display: flex;

    align-items: center;

    flex-wrap: wrap;

    gap: 14px;

    margin-top: 40px;

    padding-top: 28px;

    border-top: 1px solid var(--border);
}

.hero-tech > span {

    color: #94a3b8;

    font-size: 13px;

    font-weight: 700;

    text-transform: uppercase;
}

.tech-list {

    display: flex;

    flex-wrap: wrap;

    gap: 8px;
}

.tech-list span {

    padding: 7px 11px;

    border-radius: 5px;

    background: #f1f5f9;

    color: #475569;

    font-size: 13px;

    font-weight: 700;
}


/* =========================================================
   HERO PROFILE
========================================================= */

.hero-profile {

    position: relative;

    width: min(450px, 100%);

    margin: auto;
}

.profile-card {

    overflow: hidden;

    border: 1px solid var(--border);

    border-radius: 16px;

    background: white;

    box-shadow: var(--shadow-lg);
}

.profile-top {

    display: flex;

    align-items: center;

    gap: 9px;

    padding: 15px 20px;

    border-bottom: 1px solid var(--border);

    background: #f8fafc;

    color: #64748b;

    font-family: monospace;

    font-size: 13px;
}

.profile-dot {

    width: 9px;
    height: 9px;

    border-radius: 50%;

    background: var(--primary);
}

.profile-photo {

    height: 390px;

    background: #e2e8f0;

    overflow: hidden;
}

.profile-photo img {

    width: 100%;
    height: 100%;

    object-fit: cover;
}

.profile-info {
    padding: 25px;
}

.profile-info h3 {

    margin: 0 0 7px;

    color: var(--dark);

    font-size: 23px;
}

.profile-info p {

    margin: 0 0 15px;

    color: var(--primary);

    font-size: 16px;

    font-weight: 700;
}

.profile-location {

    display: flex;

    align-items: center;

    gap: 7px;

    color: var(--muted);

    font-size: 14px;
}

.profile-location i {
    color: var(--primary);
}

.floating-code {

    position: absolute;

    width: 62px;
    height: 62px;

    display: flex;

    align-items: center;
    justify-content: center;

    border: 1px solid #bbf7d0;

    border-radius: 11px;

    background: white;

    color: var(--primary);

    font-family: monospace;

    font-size: 17px;

    font-weight: 800;

    box-shadow: var(--shadow);
}

.code-one {
    left: -30px;
    top: 80px;
}

.code-two {
    right: -30px;
    bottom: 80px;
}


/* =========================================================
   SECTION TITLES
========================================================= */

.section-heading {

    max-width: 750px;

    margin-bottom: 60px;
}

.section-heading > span {

    display: block;

    margin-bottom: 11px;

    color: var(--primary);

    font-size: 13px;

    font-weight: 900;

    letter-spacing: 1.5px;
}

.section-heading h2 {

    margin: 0 0 15px;

    color: var(--dark);

    font-size: clamp(34px, 4vw, 48px);

    line-height: 1.1;

    letter-spacing: -1.2px;

    font-weight: 800;
}

.section-heading p {

    margin: 0;

    color: var(--muted);

    line-height: 1.8;

    font-size: 17px;
}


/* =========================================================
   ABOUT
========================================================= */

.about {
    background: white;
}

.about-grid {

    display: grid;

    grid-template-columns: .8fr 1.2fr;

    align-items: center;

    gap: 85px;
}

.about-image-wrapper {

    position: relative;

    width: min(410px, 100%);

    margin: auto;
}

.about-image {

    position: relative;

    overflow: hidden;

    border-radius: 12px;

    background: #e2e8f0;
}

.about-image img {

    display: block;

    width: 100%;

    aspect-ratio: .9;

    object-fit: cover;
}

.about-badge {

    position: absolute;

    left: -20px;
    bottom: 28px;

    display: flex;

    align-items: center;

    gap: 9px;

    padding: 14px 18px;

    border-radius: 8px;

    background: var(--dark);

    color: white;

    font-size: 14px;

    font-weight: 700;

    box-shadow: var(--shadow-lg);
}

.about-badge i {
    color: var(--primary-light);
}

.small-label {

    color: var(--primary);

    font-size: 13px;

    font-weight: 900;

    letter-spacing: 1.5px;
}

.about-content h3 {

    margin: 12px 0 22px;

    color: var(--dark);

    font-size: 34px;

    line-height: 1.25;
}

.about-content h3 span {
    color: var(--primary);
}

.about-content p {

    color: var(--muted);

    line-height: 1.9;

    font-size: 17px;
}

.about-content strong {
    color: var(--dark);
}

.about-details {

    display: grid;

    grid-template-columns: repeat(2, 1fr);

    gap: 14px;

    margin: 28px 0;
}

.about-details > div {

    padding: 16px;

    border: 1px solid var(--border);

    border-radius: 7px;

    background: #f8fafc;
}

.about-details span {

    display: block;

    margin-bottom: 5px;

    color: #94a3b8;

    font-size: 11px;

    font-weight: 700;

    text-transform: uppercase;
}

.about-details strong {

    color: var(--dark);

    font-size: 15px;
}


/* =========================================================
   SKILLS
========================================================= */

.skills {
    background: var(--background);
}

.skills-grid {

    display: grid;

    grid-template-columns:
        repeat(4, 1fr);

    gap: 20px;
}

.skill-card {

    padding: 26px;

    border: 1px solid var(--border);

    border-radius: 11px;

    background: white;

    transition: .25s ease;
}

.skill-card:hover {

    transform: translateY(-5px);

    border-color: #bbf7d0;

    box-shadow: var(--shadow);
}

.skill-header {

    display: flex;

    align-items: center;

    justify-content: space-between;
}

.skill-icon {

    width: 54px;
    height: 54px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 9px;

    background: #f0fdf4;

    color: var(--primary);

    font-size: 25px;
}

.skill-header > span {

    color: #cbd5e1;

    font-size: 13px;

    font-weight: 800;
}

.skill-card h3 {

    margin: 20px 0 9px;

    color: var(--dark);

    font-size: 20px;
}

.skill-category {

    display: inline-block;

    margin: 0;

    padding: 6px 10px;

    border-radius: 5px;

    background: #f0fdf4;

    color: #15803d;

    font-size: 12px;

    font-weight: 700;
}

.skill-level {
    margin-top: 22px;
}

.skill-level > div:first-child {

    display: flex;

    justify-content: space-between;

    margin-bottom: 8px;

    color: #94a3b8;

    font-size: 12px;
}

.skill-level strong {
    color: var(--primary);
}

.progress {

    height: 6px;

    overflow: hidden;

    border-radius: 10px;

    background: #e2e8f0;
}

.progress-bar {

    height: 100%;

    border-radius: 10px;

    background: var(--primary);
}


/* =========================================================
   PROJECTS
========================================================= */

.projects {
    background: white;
}

.projects-grid {

    display: grid;

    grid-template-columns:
        repeat(3, 1fr);

    gap: 24px;
}

.project-card {

    overflow: hidden;

    border: 1px solid var(--border);

    border-radius: 11px;

    background: white;

    transition: .3s ease;
}

.project-card:hover {

    transform: translateY(-6px);

    box-shadow: var(--shadow-lg);
}

.project-image {

    position: relative;

    height: 230px;

    overflow: hidden;

    background: #e2e8f0;
}

.project-image img {

    width: 100%;
    height: 100%;

    object-fit: cover;

    transition: .4s ease;
}

.project-card:hover .project-image img {
    transform: scale(1.04);
}

.project-overlay {

    position: absolute;

    inset: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    gap: 9px;

    background: rgba(15,23,42,.65);

    opacity: 0;

    transition: .25s;
}

.project-card:hover .project-overlay {
    opacity: 1;
}

.project-overlay a {

    width: 46px;
    height: 46px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 7px;

    background: white;

    color: var(--dark);

    font-size: 17px;

    text-decoration: none;
}

.project-overlay a:hover {
    color: var(--primary);
}

.project-content {
    padding: 25px;
}

.project-type {

    color: var(--primary);

    font-size: 12px;

    font-weight: 900;

    letter-spacing: 1px;
}

.project-content h3 {

    margin: 8px 0 12px;

    color: var(--dark);

    font-size: 22px;
}

.project-content > p {

    color: var(--muted);

    font-size: 16px;

    line-height: 1.8;
}

.project-technologies {

    display: flex;

    flex-wrap: wrap;

    gap: 7px;

    margin-top: 17px;
}

.project-technologies span {

    padding: 6px 9px;

    border-radius: 5px;

    background: #f1f5f9;

    color: #475569;

    font-size: 12px;

    font-weight: 700;
}

.project-links {

    display: flex;

    flex-wrap: wrap;

    gap: 9px;

    margin-top: 22px;
}

.project-links a {

    display: inline-flex;

    align-items: center;

    gap: 7px;

    padding: 10px 13px;

    border-radius: 6px;

    background: #f8fafc;

    color: var(--dark);

    text-decoration: none;

    font-size: 13px;

    font-weight: 700;
}

.project-links a:first-child {

    background: var(--primary);

    color: white;
}

.project-links a:hover {
    color: var(--primary);
}

.project-links a:first-child:hover {

    color: white;

    background: #15803d;
}


/* =========================================================
   EXPERIENCE
========================================================= */

.experience {
    background: var(--background);
}

.timeline {

    position: relative;

    max-width: 950px;

    margin: auto;
}

.timeline::before {

    content: "";

    position: absolute;

    left: 14px;

    top: 0;
    bottom: 0;

    width: 2px;

    background: #d1fae5;
}

.timeline-item {

    position: relative;

    display: grid;

    grid-template-columns: 30px 1fr;

    gap: 28px;

    margin-bottom: 28px;
}

.timeline-marker {
    position: relative;
}

.timeline-marker span {

    position: absolute;

    top: 29px;
    left: 5px;

    width: 18px;
    height: 18px;

    border: 4px solid var(--background);

    border-radius: 50%;

    background: var(--primary);
}

.timeline-card {

    padding: 28px;

    border: 1px solid var(--border);

    border-radius: 10px;

    background: white;

    box-shadow: var(--shadow);
}

.timeline-date {

    display: inline-block;

    margin-bottom: 12px;

    padding: 6px 10px;

    border-radius: 5px;

    background: #f0fdf4;

    color: #15803d;

    font-size: 12px;

    font-weight: 800;
}

.timeline-card h3 {

    margin: 0 0 8px;

    color: var(--dark);

    font-size: 22px;
}

.timeline-card h4 {

    margin: 0 0 16px;

    color: var(--primary);

    font-size: 15px;
}

.timeline-card h4 span {
    color: #94a3b8;
}

.timeline-card p {

    margin: 0;

    color: var(--muted);

    font-size: 16px;

    line-height: 1.85;
}


/* =========================================================
   EDUCATION
========================================================= */

.education {
    background: white;
}

.education-grid {

    display: grid;

    grid-template-columns:
        repeat(2, 1fr);

    gap: 20px;
}

.education-card {

    display: flex;

    gap: 22px;

    padding: 28px;

    border: 1px solid var(--border);

    border-radius: 11px;

    background: #ffffff;

    transition: .25s;
}

.education-card:hover {

    border-color: #bbf7d0;

    transform: translateY(-4px);

    box-shadow: var(--shadow);
}

.education-icon {

    flex-shrink: 0;

    width: 60px;
    height: 60px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 9px;

    background: #f0fdf4;

    color: var(--primary);

    font-size: 25px;
}

.education-date {

    color: var(--primary);

    font-size: 12px;

    font-weight: 900;
}

.education-content h3 {

    margin: 9px 0;

    color: var(--dark);

    font-size: 21px;
}

.education-school {

    margin: 0 0 12px;

    color: #475569;

    font-size: 14px;

    font-weight: 600;
}

.education-school i {

    margin-right: 5px;

    color: var(--primary);
}

.education-description {

    margin: 0;

    color: var(--muted);

    font-size: 15px;

    line-height: 1.75;
}


/* =========================================================
   CERTIFICATIONS
========================================================= */

.certifications {
    background: var(--background);
}

.certifications-grid {

    display: grid;

    grid-template-columns:
        repeat(3, 1fr);

    gap: 22px;
}

.certification-card {

    overflow: hidden;

    border: 1px solid var(--border);

    border-radius: 11px;

    background: white;

    transition: .3s;
}

.certification-card:hover {

    transform: translateY(-5px);

    box-shadow: var(--shadow-lg);
}

.certification-image {

    height: 200px;

    display: flex;

    align-items: center;
    justify-content: center;

    overflow: hidden;

    background:
        linear-gradient(
            135deg,
            #0f172a,
            #1e293b
        );
}

.certification-image img {

    width: 100%;
    height: 100%;

    object-fit: cover;
}

.certificate-placeholder {

    width: 75px;
    height: 75px;

    display: flex;

    align-items: center;
    justify-content: center;

    border: 1px solid rgba(255,255,255,.15);

    border-radius: 50%;

    color: #86efac;

    font-size: 34px;
}

.certification-content {
    padding: 25px;
}

.certification-label {

    display: inline-flex;

    align-items: center;

    gap: 6px;

    padding: 6px 9px;

    border-radius: 5px;

    background: #f0fdf4;

    color: #15803d;

    font-size: 11px;

    font-weight: 900;
}

.certification-content h3 {

    margin: 14px 0 10px;

    color: var(--dark);

    font-size: 21px;

    line-height: 1.4;
}

.certification-organisme {

    color: var(--primary);

    font-size: 14px;

    font-weight: 700;
}

.certification-description {

    color: var(--muted);

    font-size: 15px;

    line-height: 1.8;
}

.certification-date {

    margin: 17px 0;

    color: #64748b;

    font-size: 13px;
}

.certification-date i {

    margin-right: 5px;

    color: var(--primary);
}

.certification-actions {

    display: flex;

    flex-direction: column;

    gap: 8px;
}

.certification-actions a {

    display: flex;

    align-items: center;
    justify-content: center;

    gap: 8px;

    padding: 11px;

    border-radius: 6px;

    background: #f8fafc;

    color: var(--dark);

    text-decoration: none;

    font-size: 13px;

    font-weight: 700;
}

.certification-actions a:hover {

    background: var(--primary-soft);

    color: #15803d;
}


/* =========================================================
   SERVICES
========================================================= */

.services {
    background: white;
}

.services-grid {

    display: grid;

    grid-template-columns:
        repeat(3, 1fr);

    gap: 22px;
}

.service-card {

    position: relative;

    min-height: 290px;

    padding: 30px;

    overflow: hidden;

    border: 1px solid var(--border);

    border-radius: 11px;

    background: white;

    transition: .3s;
}

.service-card:hover {

    transform: translateY(-6px);

    border-color: #bbf7d0;

    box-shadow: var(--shadow-lg);
}

.service-top {

    display: flex;

    justify-content: space-between;

    align-items: center;
}

.service-number {

    color: #cbd5e1;

    font-size: 13px;

    font-weight: 900;
}

.service-icon {

    width: 62px;
    height: 62px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 9px;

    background: #f0fdf4;

    color: var(--primary);

    font-size: 27px;
}

.service-card h3 {

    margin: 27px 0 13px;

    color: var(--dark);

    font-size: 22px;
}

.service-card p {

    color: var(--muted);

    font-size: 16px;

    line-height: 1.85;
}

.service-arrow {

    position: absolute;

    right: 27px;
    bottom: 27px;

    width: 38px;
    height: 38px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: #f8fafc;

    color: var(--primary);
}

.service-card:hover .service-arrow {

    background: var(--primary);

    color: white;
}


/* =========================================================
   CONTACT
========================================================= */

.contact {

    background: var(--dark);

    color: white;
}

.section-heading.light h2 {
    color: white;
}

.section-heading.light p {
    color: #94a3b8;
}

.contact-grid {

    display: grid;

    grid-template-columns: .85fr 1.15fr;

    gap: 75px;

    align-items: start;
}

.contact-info h3 {

    margin: 0 0 20px;

    color: white;

    font-size: 36px;

    line-height: 1.25;
}

.contact-info h3 span {
    color: var(--primary-light);
}

.contact-info > p {

    margin-bottom: 34px;

    color: #94a3b8;

    line-height: 1.85;

    font-size: 16px;
}

.contact-item {

    display: flex;

    align-items: center;

    gap: 15px;

    margin-bottom: 20px;
}

.contact-icon {

    width: 48px;
    height: 48px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 7px;

    background: rgba(34,197,94,.1);

    color: var(--primary-light);

    font-size: 18px;
}

.contact-item span {

    display: block;

    margin-bottom: 4px;

    color: #64748b;

    font-size: 11px;

    font-weight: 800;

    text-transform: uppercase;
}

.contact-item a,
.contact-item p {

    margin: 0;

    color: #e2e8f0;

    font-size: 15px;

    text-decoration: none;
}

.contact-item a:hover {
    color: var(--primary-light);
}

.contact-socials {

    display: flex;

    gap: 9px;

    margin-top: 32px;
}

.contact-socials a {

    width: 43px;
    height: 43px;

    display: flex;

    align-items: center;
    justify-content: center;

    border: 1px solid #334155;

    border-radius: 6px;

    color: #94a3b8;

    font-size: 17px;

    text-decoration: none;

    transition: .25s;
}

.contact-socials a:hover {

    border-color: var(--primary);

    background: var(--primary);

    color: white;
}


/* =========================================================
   CONTACT FORM
   CORRECTION PRINCIPALE
========================================================= */

.contact-form {

    padding: 34px;

    border: 1px solid #334155;

    border-radius: 11px;

    background: #172033;

    color: white;
}


/* TITRE DU FORMULAIRE */

.form-title {

    display: flex;

    align-items: center;

    gap: 10px;

    padding-bottom: 20px;

    margin-bottom: 25px;

    border-bottom: 1px solid #334155;

    color: white;

    font-size: 17px;

    font-weight: 800;
}

.form-title i {
    color: var(--primary-light);
}


/* MESSAGE SUCCÈS */

.form-success {

    display: flex;

    align-items: center;

    gap: 10px;

    margin-bottom: 20px;

    padding: 13px 15px;

    border: 1px solid #166534;

    border-radius: 7px;

    background: #052e16;

    color: #bbf7d0;

    font-size: 14px;

    font-weight: 600;
}

.form-success i {
    color: #22c55e;
}


/* ERREURS */

.form-errors {

    margin-bottom: 20px;

    padding: 14px 16px;

    border: 1px solid #7f1d1d;

    border-radius: 7px;

    background: #450a0a;

    color: #fecaca;

    font-size: 14px;
}

.form-errors strong {
    color: #fca5a5;
}

.form-errors ul {

    margin: 8px 0 0;

    padding-left: 20px;
}


/* LIGNE NOM / EMAIL */

.form-row {

    display: grid;

    grid-template-columns: repeat(2, 1fr);

    gap: 16px;
}


/* GROUPE */

.form-group {
    margin-bottom: 19px;
}


/* LABEL */

.form-group label {

    display: block;

    margin-bottom: 8px;

    color: #cbd5e1 !important;

    font-size: 13px;

    font-weight: 700;
}


/*
=========================================================
 INPUTS — CORRECTION DU TEXTE INVISIBLE
=========================================================
*/

.contact-form input,
.contact-form textarea {

    width: 100%;

    box-sizing: border-box;

    padding: 14px 16px;

    border: 1px solid #475569;

    border-radius: 7px;

    outline: none;

    background-color: #ffffff !important;

    color: #0f172a !important;

    -webkit-text-fill-color: #0f172a !important;

    font-family: inherit;

    font-size: 15px;

    line-height: 1.5;

    transition: .2s;
}


/* PLACEHOLDER */

.contact-form input::placeholder,
.contact-form textarea::placeholder {

    color: #64748b !important;

    opacity: 1 !important;

    -webkit-text-fill-color: #64748b !important;
}


/* FOCUS */

.contact-form input:focus,
.contact-form textarea:focus {

    background-color: #ffffff !important;

    color: #0f172a !important;

    -webkit-text-fill-color: #0f172a !important;

    border-color: var(--primary);

    box-shadow:
        0 0 0 3px rgba(34,197,94,.15);
}


/* VALEUR AUTOMATIQUE DU NAVIGATEUR */

.contact-form input:-webkit-autofill,
.contact-form input:-webkit-autofill:hover,
.contact-form input:-webkit-autofill:focus,
.contact-form textarea:-webkit-autofill,
.contact-form textarea:-webkit-autofill:hover,
.contact-form textarea:-webkit-autofill:focus {

    -webkit-text-fill-color: #0f172a !important;

    -webkit-box-shadow: 0 0 0 1000px #ffffff inset !important;

    box-shadow: 0 0 0 1000px #ffffff inset !important;

    background-color: #ffffff !important;
}


/* TEXTAREA */

.contact-form textarea {

    min-height: 160px;

    resize: vertical;
}


/* BOUTON */

.submit-button {

    width: 100%;

    border: none;

    cursor: pointer;

    color: white !important;
}

.submit-button span {
    color: white !important;
}

.submit-button i {
    color: white !important;
}


/* =========================================================
   EMPTY STATE
========================================================= */

.empty-state {

    grid-column: 1 / -1;

    padding: 70px 20px;

    text-align: center;
}

.empty-state i {

    display: block;

    margin-bottom: 17px;

    color: var(--primary);

    font-size: 45px;
}

.empty-state h3 {

    margin: 0 0 8px;

    color: var(--dark);

    font-size: 21px;
}

.empty-state p {

    margin: 0;

    color: var(--muted);

    font-size: 16px;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 1100px) {

    .hero-container {
        gap: 45px;
    }

    .skills-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .projects-grid,
    .certifications-grid,
    .services-grid {
        grid-template-columns: repeat(2, 1fr);
    }

}


@media (max-width: 900px) {

    .hero {
        padding-top: 120px;
    }

    .hero-container,
    .about-grid,
    .contact-grid {
        grid-template-columns: 1fr;
    }

    .hero-content {

        max-width: 750px;

        text-align: center;

        margin: auto;
    }

    .hero-description {

        margin-left: auto;

        margin-right: auto;
    }

    .hero-actions,
    .hero-tech {
        justify-content: center;
    }

    .hero-profile {

        width: min(420px, 90vw);

        margin-top: 30px;
    }

    .about-image-wrapper {
        margin-bottom: 25px;
    }

    .contact-info {
        max-width: 700px;
    }

}


@media (max-width: 700px) {

    .section {
        padding: 80px 0;
    }

    .hero {
        padding: 105px 0 75px;
    }

    .hero h1 {

        font-size: 45px;

        letter-spacing: -2px;
    }

    .hero h2 {
        font-size: 27px;
    }

    .hero-description {
        font-size: 17px;
    }

    .hero-actions {
        flex-direction: column;
    }

    .hero-actions .btn {
        width: 100%;
    }

    .projects-grid,
    .certifications-grid,
    .services-grid,
    .education-grid {
        grid-template-columns: 1fr;
    }

    .skills-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .about-details {
        grid-template-columns: 1fr;
    }

    .form-row {
        grid-template-columns: 1fr;
    }

    .contact-form {
        padding: 24px;
    }

    .section-heading h2 {
        font-size: 36px;
    }

}


@media (max-width: 500px) {

    .skills-grid {
        grid-template-columns: 1fr;
    }

    .hero h1 {
        font-size: 39px;
    }

    .hero h2 {
        font-size: 24px;
    }

    .profile-photo {
        height: 310px;
    }

    .floating-code {
        display: none;
    }

    .education-card {
        flex-direction: column;
    }

    .timeline-item {
        gap: 16px;
    }

    .about-content h3 {
        font-size: 28px;
    }

    .contact-info h3 {
        font-size: 30px;
    }

}

</style>

</x-layout>
```
