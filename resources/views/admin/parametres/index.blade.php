@extends('layouts.admin')

@section('title', 'Paramètres | Administration')

@section('page-title', 'Paramètres du portfolio')

@section('content')

<style>

/* =========================================================
   PARAMÈTRES
========================================================= */

.settings-container {
    max-width: 900px;
    margin: 0 auto;
}

.settings-intro {
    margin-bottom: 25px;
}

.settings-intro h2 {
    margin: 0 0 8px;
    font-size: 25px;
    font-weight: 700;
    color: #17221b;
}

.settings-intro p {
    margin: 0;
    color: #7c8a82;
    font-size: 14px;
}


/* =========================================================
   CARTE
========================================================= */

.settings-card {
    background: #ffffff;
    border: 1px solid #e8eee9;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0, 0, 0, .03);
}

.settings-header {
    padding: 22px 25px;
    border-bottom: 1px solid #edf1ee;
    display: flex;
    align-items: center;
    gap: 12px;
}

.settings-header-icon {
    width: 42px;
    height: 42px;
    border-radius: 12px;
    background: #ecfdf3;
    color: #16a34a;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
}

.settings-header h3 {
    margin: 0;
    font-size: 17px;
    font-weight: 700;
    color: #17221b;
}

.settings-body {
    padding: 25px;
}


/* =========================================================
   PHOTO
========================================================= */

.profile-photo-section {
    display: flex;
    align-items: center;
    gap: 25px;
    padding-bottom: 25px;
    margin-bottom: 25px;
    border-bottom: 1px solid #edf1ee;
}

.profile-photo {
    width: 110px;
    height: 110px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid #ecfdf3;
    box-shadow: 0 5px 20px rgba(0, 0, 0, .08);
}

.photo-info h4 {
    margin: 0 0 7px;
    font-size: 16px;
    color: #26332b;
}

.photo-info p {
    margin: 0 0 13px;
    color: #89958e;
    font-size: 13px;
}


/* =========================================================
   FORMULAIRE
========================================================= */

.form-group {
    margin-bottom: 22px;
}

.form-label {
    display: block;
    margin-bottom: 8px;
    font-size: 14px;
    font-weight: 600;
    color: #26332b;
}

.form-control {
    width: 100%;
    padding: 12px 14px;
    border: 1px solid #dfe7e1;
    border-radius: 10px;
    font-size: 14px;
    color: #26332b;
    background: #ffffff;
    outline: none;
    transition: .2s;
    box-sizing: border-box;
}

.form-control:focus {
    border-color: #4ade80;
    box-shadow: 0 0 0 3px rgba(74, 222, 128, .12);
}

textarea.form-control {
    min-height: 110px;
    resize: vertical;
}


/* =========================================================
   RÉSEAUX SOCIAUX
========================================================= */

.social-section {
    margin-top: 30px;
    padding-top: 25px;
    border-top: 1px solid #edf1ee;
}

.social-section-title {
    margin-bottom: 18px;
}

.social-section-title h4 {
    margin: 0 0 5px;
    font-size: 17px;
    color: #26332b;
}

.social-section-title p {
    margin: 0;
    font-size: 13px;
    color: #89958e;
}

.social-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 18px;
}


/* =========================================================
   BOUTONS
========================================================= */

.btn-save {
    border: none;
    background: #16a34a;
    color: #ffffff;
    padding: 12px 22px;
    border-radius: 10px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: .25s;
}

.btn-save:hover {
    background: #15803d;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(22, 163, 74, .18);
}

.btn-file {
    display: inline-block;
    padding: 9px 15px;
    border-radius: 9px;
    background: #ecfdf3;
    color: #15803d;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
}

.btn-file:hover {
    background: #dcfce7;
}


/* =========================================================
   ALERTES
========================================================= */

.alert-success {
    background: #ecfdf3;
    border: 1px solid #bbf7d0;
    color: #166534;
    padding: 13px 16px;
    border-radius: 10px;
    margin-bottom: 20px;
    font-size: 14px;
}

.alert-error {
    background: #fef2f2;
    border: 1px solid #fecaca;
    color: #b91c1c;
    padding: 13px 16px;
    border-radius: 10px;
    margin-bottom: 20px;
    font-size: 14px;
}

.error-text {
    color: #dc2626;
    font-size: 12px;
    margin-top: 5px;
}


/* =========================================================
   PETITES INFORMATIONS
========================================================= */

.form-help {
    display: block;
    margin-top: 6px;
    color: #89958e;
    font-size: 12px;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media(max-width: 700px) {

    .social-grid {
        grid-template-columns: 1fr;
    }

}

@media(max-width: 600px) {

    .settings-body {
        padding: 18px;
    }

    .settings-header {
        padding: 18px;
    }

    .profile-photo-section {
        flex-direction: column;
        align-items: flex-start;
    }

    .profile-photo {
        width: 90px;
        height: 90px;
    }

}

</style>

<div class="settings-container">

```
<!-- =====================================================
     INTRODUCTION
====================================================== -->

<div class="settings-intro">

    <h2>
        Paramètres du portfolio
    </h2>

    <p>
        Modifiez les informations qui seront affichées
        sur votre portfolio public.
    </p>

</div>


<!-- =====================================================
     MESSAGES
====================================================== -->

@if(session('success'))

    <div class="alert-success">

        <i class="bi bi-check-circle"></i>

        {{ session('success') }}

    </div>

@endif


@if($errors->any())

    <div class="alert-error">

        <strong>
            Une erreur est survenue :
        </strong>

        <ul style="margin:8px 0 0 18px;">

            @foreach($errors->all() as $error)

                <li>
                    {{ $error }}
                </li>

            @endforeach

        </ul>

    </div>

@endif


<!-- =====================================================
     CARTE PARAMÈTRES
====================================================== -->

<div class="settings-card">

    <div class="settings-header">

        <div class="settings-header-icon">

            <i class="bi bi-person-gear"></i>

        </div>

        <h3>
            Informations du portfolio
        </h3>

    </div>


    <div class="settings-body">

        <form
            action="{{ route('admin.parametres.update') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            @method('PUT')


            <!-- =================================================
                 PHOTO DE PROFIL
            ================================================== -->

            <div class="profile-photo-section">

                @if(isset($parametre) && $parametre->photo)

                    <img
                        src="{{ asset('storage/' . $parametre->photo) }}"
                        alt="Photo de profil"
                        class="profile-photo"
                    >

                @else

                    <img
                        src="{{ asset('images/default-profile.png') }}"
                        alt="Photo de profil"
                        class="profile-photo"
                    >

                @endif


                <div class="photo-info">

                    <h4>
                        Photo de profil
                    </h4>

                    <p>
                        Cette photo sera affichée sur votre portfolio.
                        Format JPG, JPEG ou PNG.
                    </p>

                    <label class="btn-file">

                        <i class="bi bi-camera"></i>

                        Choisir une photo

                        <input
                            type="file"
                            name="photo"
                            accept="image/png,image/jpeg"
                            hidden
                        >

                    </label>

                </div>

            </div>


            <!-- =================================================
                 NOM
            ================================================== -->

            <div class="form-group">

                <label class="form-label">
                    Nom
                </label>

                <input
                    type="text"
                    name="nom"
                    class="form-control"
                    value="{{ old('nom', $parametre->nom ?? '') }}"
                    placeholder="Ex : DAGNOGO"
                >

                @error('nom')

                    <div class="error-text">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <!-- =================================================
                 PRÉNOM
            ================================================== -->

            <div class="form-group">

                <label class="form-label">
                    Prénom
                </label>

                <input
                    type="text"
                    name="prenom"
                    class="form-control"
                    value="{{ old('prenom', $parametre->prenom ?? '') }}"
                    placeholder="Ex : Tchabouan"
                >

                @error('prenom')

                    <div class="error-text">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <!-- =================================================
                 TITRE
            ================================================== -->

            <div class="form-group">

                <label class="form-label">
                    Titre professionnel
                </label>

                <input
                    type="text"
                    name="titre"
                    class="form-control"
                    value="{{ old('titre', $parametre->titre ?? '') }}"
                    placeholder="Ex : Développeur Web & Mobile"
                >

                @error('titre')

                    <div class="error-text">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <!-- =================================================
                 EMAIL
            ================================================== -->

            <div class="form-group">

                <label class="form-label">
                    Email du portfolio
                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email', $parametre->email ?? '') }}"
                    placeholder="Ex : contact@monportfolio.com"
                >

                <small class="form-help">
                    Cet email est indépendant de l'email utilisé
                    pour vous connecter à l'administration.
                </small>

                @error('email')

                    <div class="error-text">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <!-- =================================================
                 TÉLÉPHONE
            ================================================== -->

            <div class="form-group">

                <label class="form-label">
                    Téléphone
                </label>

                <input
                    type="text"
                    name="telephone"
                    class="form-control"
                    value="{{ old('telephone', $parametre->telephone ?? '') }}"
                    placeholder="Ex : +225 07 XX XX XX XX"
                >

                <small class="form-help">
                    Ce numéro pourra être affiché dans la section Contact.
                </small>

                @error('telephone')

                    <div class="error-text">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <!-- =================================================
                 ADRESSE
            ================================================== -->

            <div class="form-group">

                <label class="form-label">
                    Adresse / Localisation
                </label>

                <input
                    type="text"
                    name="adresse"
                    class="form-control"
                    value="{{ old('adresse', $parametre->adresse ?? '') }}"
                    placeholder="Ex : Abidjan, Côte d'Ivoire"
                >

                @error('adresse')

                    <div class="error-text">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <!-- =================================================
                 DESCRIPTION
            ================================================== -->

            <div class="form-group">

                <label class="form-label">
                    Présentation
                </label>

                <textarea
                    name="description"
                    class="form-control"
                    placeholder="Présentez-vous en quelques lignes..."
                >{{ old('description', $parametre->description ?? '') }}</textarea>

                @error('description')

                    <div class="error-text">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <!-- =================================================
                 RÉSEAUX SOCIAUX
            ================================================== -->

            <div class="social-section">

                <div class="social-section-title">

                    <h4>
                        <i class="bi bi-share"></i>
                        Réseaux sociaux
                    </h4>

                    <p>
                        Ces champs sont facultatifs.
                        Les réseaux non renseignés ne seront pas affichés
                        sur le portfolio.
                    </p>

                </div>


                <div class="social-grid">


                    <!-- =================================================
                         LINKEDIN
                    ================================================== -->

                    <div class="form-group">

                        <label class="form-label">
                            <i class="bi bi-linkedin"></i>
                            LinkedIn
                        </label>

                        <input
                            type="url"
                            name="linkedin"
                            class="form-control"
                            value="{{ old('linkedin', $parametre->linkedin ?? '') }}"
                            placeholder="https://www.linkedin.com/in/..."
                        >

                        @error('linkedin')

                            <div class="error-text">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- =================================================
                         GITHUB
                    ================================================== -->

                    <div class="form-group">

                        <label class="form-label">
                            <i class="bi bi-github"></i>
                            GitHub
                        </label>

                        <input
                            type="url"
                            name="github"
                            class="form-control"
                            value="{{ old('github', $parametre->github ?? '') }}"
                            placeholder="https://github.com/..."
                        >

                        @error('github')

                            <div class="error-text">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- =================================================
                         FACEBOOK
                    ================================================== -->

                    <div class="form-group">

                        <label class="form-label">
                            <i class="bi bi-facebook"></i>
                            Facebook
                        </label>

                        <input
                            type="url"
                            name="facebook"
                            class="form-control"
                            value="{{ old('facebook', $parametre->facebook ?? '') }}"
                            placeholder="https://www.facebook.com/..."
                        >

                        @error('facebook')

                            <div class="error-text">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- =================================================
                         INSTAGRAM
                    ================================================== -->

                    <div class="form-group">

                        <label class="form-label">
                            <i class="bi bi-instagram"></i>
                            Instagram
                        </label>

                        <input
                            type="url"
                            name="instagram"
                            class="form-control"
                            value="{{ old('instagram', $parametre->instagram ?? '') }}"
                            placeholder="https://www.instagram.com/..."
                        >

                        @error('instagram')

                            <div class="error-text">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                </div>

            </div>


            <!-- =================================================
                 CV
            ================================================== -->

            <div class="form-group" style="margin-top:30px;">

                <label class="form-label">
                    CV
                </label>

                @if(isset($parametre) && $parametre->cv)

                    <div style="
                        background:#f0fdf4;
                        border:1px solid #bbf7d0;
                        padding:12px 15px;
                        border-radius:10px;
                        margin-bottom:10px;
                    ">

                        <i class="bi bi-file-earmark-pdf"></i>

                        CV actuellement enregistré

                        <a
                            href="{{ asset('storage/' . $parametre->cv) }}"
                            target="_blank"
                            style="
                                color:#15803d;
                                font-weight:600;
                                margin-left:8px;
                                text-decoration:none;
                            "
                        >
                            Voir le CV
                        </a>

                    </div>

                @endif


                <input
                    type="file"
                    name="cv"
                    class="form-control"
                    accept=".pdf,.doc,.docx"
                >

                <small class="form-help">
                    Formats acceptés : PDF, DOC, DOCX.
                </small>

                @error('cv')

                    <div class="error-text">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <!-- =================================================
                 BOUTON ENREGISTRER
            ================================================== -->

            <div style="
                display:flex;
                justify-content:flex-end;
                margin-top:30px;
            ">

                <button
                    type="submit"
                    class="btn-save"
                >

                    <i class="bi bi-check-lg"></i>

                    Enregistrer les paramètres

                </button>

            </div>


        </form>

    </div>

</div>
```

</div>

@endsection
