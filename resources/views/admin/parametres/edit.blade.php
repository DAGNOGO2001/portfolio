@extends('layouts.admin')

@section('title', 'Modifier les paramètres | Administration')

@section('page-title', 'Modifier les paramètres du portfolio')

@section('content')

<style>

/* =========================================================
   PARAMÈTRES
========================================================= */

.settings-container {
    max-width: 950px;
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
    margin-bottom: 25px;
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

    box-shadow:
        0 0 0 3px rgba(74, 222, 128, .12);
}

textarea.form-control {
    min-height: 120px;
    resize: vertical;
}


/* =========================================================
   GRILLE
========================================================= */

.form-grid {
    display: grid;

    grid-template-columns: repeat(2, 1fr);

    gap: 20px;
}


/* =========================================================
   RÉSEAUX SOCIAUX
========================================================= */

.social-section {
    margin-top: 10px;
}

.social-title {
    display: flex;
    align-items: center;
    gap: 10px;

    margin-bottom: 20px;

    padding-bottom: 12px;

    border-bottom: 1px solid #edf1ee;
}

.social-title i {
    width: 36px;
    height: 36px;

    border-radius: 10px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #ecfdf3;
    color: #16a34a;

    font-size: 17px;
}

.social-title h4 {
    margin: 0;

    color: #26332b;

    font-size: 16px;
    font-weight: 700;
}

.social-input {
    position: relative;
}

.social-input-icon {
    position: absolute;

    left: 14px;
    top: 50%;

    transform: translateY(-50%);

    color: #16a34a;

    font-size: 17px;

    z-index: 2;
}

.social-input .form-control {
    padding-left: 43px;
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

    box-shadow:
        0 8px 20px rgba(22, 163, 74, .18);
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
   CV
========================================================= */

.cv-current {
    background: #f0fdf4;

    border: 1px solid #bbf7d0;

    padding: 12px 15px;

    border-radius: 10px;

    margin-bottom: 10px;

    font-size: 14px;

    color: #166534;
}

.cv-current a {
    color: #15803d;

    font-weight: 600;

    margin-left: 8px;

    text-decoration: none;
}

.cv-current a:hover {
    text-decoration: underline;
}


/* =========================================================
   FOOTER FORMULAIRE
========================================================= */

.form-actions {
    display: flex;

    justify-content: flex-end;

    margin-top: 30px;

    padding-top: 20px;

    border-top: 1px solid #edf1ee;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media(max-width: 700px) {

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

    .form-grid {
        grid-template-columns: 1fr;
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
        Modifier les paramètres du portfolio
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
     FORMULAIRE
====================================================== -->

<form
    action="{{ route('admin.parametres.update', $parametre->id) }}"
    method="POST"
    enctype="multipart/form-data"
>

    @csrf

    @method('PUT')


    <!-- =================================================
         INFORMATIONS PERSONNELLES
    ================================================== -->

    <div class="settings-card">

        <div class="settings-header">

            <div class="settings-header-icon">

                <i class="bi bi-person-vcard"></i>

            </div>

            <h3>
                Informations personnelles
            </h3>

        </div>


        <div class="settings-body">


            <!-- PHOTO -->

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


            <!-- NOM / PRÉNOM -->

            <div class="form-grid">


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


            </div>


            <!-- TITRE -->

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


            <!-- DESCRIPTION -->

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


            <!-- EMAIL / TÉLÉPHONE -->

            <div class="form-grid">


                <div class="form-group">

                    <label class="form-label">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email', $parametre->email ?? '') }}"
                        placeholder="Ex : contact@monportfolio.com"
                    >

                    @error('email')

                        <div class="error-text">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


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

                    @error('telephone')

                        <div class="error-text">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


            </div>


            <!-- ADRESSE -->

            <div class="form-group">

                <label class="form-label">
                    Adresse
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


        </div>

    </div>


    <!-- =================================================
         RÉSEAUX SOCIAUX
    ================================================== -->

    <div class="settings-card">

        <div class="settings-header">

            <div class="settings-header-icon">

                <i class="bi bi-share"></i>

            </div>

            <h3>
                Réseaux sociaux
            </h3>

        </div>


        <div class="settings-body">


            <div class="social-section">


                <div class="social-title">

                    <i class="bi bi-globe2"></i>

                    <h4>
                        Mes réseaux sociaux
                    </h4>

                </div>


                <div class="form-grid">


                    <!-- LINKEDIN -->

                    <div class="form-group">

                        <label class="form-label">
                            LinkedIn
                        </label>

                        <div class="social-input">

                            <i class="bi bi-linkedin social-input-icon"></i>

                            <input
                                type="url"
                                name="linkedin"
                                class="form-control"
                                value="{{ old('linkedin', $parametre->linkedin ?? '') }}"
                                placeholder="https://www.linkedin.com/in/votre-profil"
                            >

                        </div>

                        @error('linkedin')

                            <div class="error-text">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- GITHUB -->

                    <div class="form-group">

                        <label class="form-label">
                            GitHub
                        </label>

                        <div class="social-input">

                            <i class="bi bi-github social-input-icon"></i>

                            <input
                                type="url"
                                name="github"
                                class="form-control"
                                value="{{ old('github', $parametre->github ?? '') }}"
                                placeholder="https://github.com/votre-compte"
                            >

                        </div>

                        @error('github')

                            <div class="error-text">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- FACEBOOK -->

                    <div class="form-group">

                        <label class="form-label">
                            Facebook
                        </label>

                        <div class="social-input">

                            <i class="bi bi-facebook social-input-icon"></i>

                            <input
                                type="url"
                                name="facebook"
                                class="form-control"
                                value="{{ old('facebook', $parametre->facebook ?? '') }}"
                                placeholder="https://www.facebook.com/votre-profil"
                            >

                        </div>

                        @error('facebook')

                            <div class="error-text">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- INSTAGRAM -->

                    <div class="form-group">

                        <label class="form-label">
                            Instagram
                        </label>

                        <div class="social-input">

                            <i class="bi bi-instagram social-input-icon"></i>

                            <input
                                type="url"
                                name="instagram"
                                class="form-control"
                                value="{{ old('instagram', $parametre->instagram ?? '') }}"
                                placeholder="https://www.instagram.com/votre-compte"
                            >

                        </div>

                        @error('instagram')

                            <div class="error-text">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                </div>


            </div>

        </div>

    </div>


    <!-- =================================================
         CV
    ================================================== -->

    <div class="settings-card">

        <div class="settings-header">

            <div class="settings-header-icon">

                <i class="bi bi-file-earmark-person"></i>

            </div>

            <h3>
                CV
            </h3>

        </div>


        <div class="settings-body">


            @if(isset($parametre) && $parametre->cv)

                <div class="cv-current">

                    <i class="bi bi-file-earmark-pdf"></i>

                    CV actuellement enregistré

                    <a
                        href="{{ asset('storage/' . $parametre->cv) }}"
                        target="_blank"
                        rel="noopener noreferrer"
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


            <small style="
                display:block;
                margin-top:6px;
                color:#89958e;
            ">

                Formats acceptés : PDF, DOC, DOCX.

            </small>


            @error('cv')

                <div class="error-text">
                    {{ $message }}
                </div>

            @enderror


            <!-- BOUTON -->

            <div class="form-actions">

                <button
                    type="submit"
                    class="btn-save"
                >

                    <i class="bi bi-check-lg"></i>

                    Enregistrer les paramètres

                </button>

            </div>


        </div>

    </div>


</form>
```

</div>

@endsection
