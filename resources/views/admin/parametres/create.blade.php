@extends('layouts.admin')

@section('title', 'Ajouter les paramètres | Administration')

@section('page-title', 'Paramètres du portfolio')

@section('content')

<style>

.parametre-container {
    max-width: 950px;
    margin: 0 auto;
}

.parametre-card {
    background: #fff;
    border: 1px solid #e8eee9;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,.04);
}

.parametre-header {
    padding: 22px 25px;
    border-bottom: 1px solid #edf1ee;
    display: flex;
    align-items: center;
    gap: 12px;
}

.parametre-header-icon {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    background: #ecfdf3;
    color: #16a34a;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
}

.parametre-header h3 {
    margin: 0;
    color: #17221b;
    font-size: 18px;
}

.parametre-body {
    padding: 25px;
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group.full {
    grid-column: 1 / -1;
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
    box-sizing: border-box;
    padding: 12px 14px;
    border: 1px solid #dfe7e1;
    border-radius: 10px;
    background: #fff;
    color: #26332b;
    font-size: 14px;
    outline: none;
    transition: .2s;
}

.form-control:focus {
    border-color: #4ade80;
    box-shadow: 0 0 0 3px rgba(74,222,128,.12);
}

textarea.form-control {
    min-height: 130px;
    resize: vertical;
}

.form-help {
    display: block;
    margin-top: 6px;
    color: #89958e;
    font-size: 12px;
}

.error-text {
    color: #dc2626;
    font-size: 12px;
    margin-top: 5px;
}

.form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    margin-top: 25px;
    padding-top: 20px;
    border-top: 1px solid #edf1ee;
}

.btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 20px;
    border-radius: 10px;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    border: none;
}

.btn-cancel {
    background: #f3f5f4;
    color: #526057;
}

.btn-cancel:hover {
    background: #e8ece9;
}

.btn-save {
    background: #16a34a;
    color: white;
}

.btn-save:hover {
    background: #15803d;
    box-shadow: 0 8px 20px rgba(22,163,74,.18);
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

@media(max-width: 700px) {

    .form-grid {
        grid-template-columns: 1fr;
    }

    .form-group.full {
        grid-column: auto;
    }

    .parametre-body {
        padding: 18px;
    }

    .form-actions {
        flex-direction: column;
    }

    .btn {
        width: 100%;
        justify-content: center;
    }
}

</style>

<div class="parametre-container">

```
{{-- =====================================================
     ERREURS
====================================================== --}}

@if($errors->any())

    <div class="alert-error">

        <strong>
            Veuillez corriger les erreurs suivantes :
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


{{-- =====================================================
     CARTE
====================================================== --}}

<div class="parametre-card">

    <div class="parametre-header">

        <div class="parametre-header-icon">

            <i class="bi bi-person-gear"></i>

        </div>

        <div>

            <h3>
                Ajouter les informations du portfolio
            </h3>

            <small style="color:#89958e;">
                Ces informations seront utilisées sur votre site public.
            </small>

        </div>

    </div>


    <div class="parametre-body">

        <form
            action="{{ route('admin.parametres.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf


            <div class="form-grid">


                {{-- =================================================
                     NOM
                ================================================== --}}

                <div class="form-group">

                    <label class="form-label">
                        Nom
                    </label>

                    <input
                        type="text"
                        name="nom"
                        class="form-control"
                        value="{{ old('nom') }}"
                        placeholder="Ex : DAGNOGO"
                    >

                    @error('nom')

                        <div class="error-text">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- =================================================
                     PRÉNOM
                ================================================== --}}

                <div class="form-group">

                    <label class="form-label">
                        Prénom
                    </label>

                    <input
                        type="text"
                        name="prenom"
                        class="form-control"
                        value="{{ old('prenom') }}"
                        placeholder="Ex : Tchabouan"
                    >

                    @error('prenom')

                        <div class="error-text">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- =================================================
                     TITRE
                ================================================== --}}

                <div class="form-group full">

                    <label class="form-label">
                        Titre professionnel
                    </label>

                    <input
                        type="text"
                        name="titre"
                        class="form-control"
                        value="{{ old('titre') }}"
                        placeholder="Ex : Développeur Web & Mobile"
                    >

                    @error('titre')

                        <div class="error-text">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- =================================================
                     EMAIL
                ================================================== --}}

                <div class="form-group">

                    <label class="form-label">
                        Email du portfolio
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email') }}"
                        placeholder="contact@exemple.com"
                    >

                    <small class="form-help">
                        Cet email peut être différent de votre email de connexion.
                    </small>

                    @error('email')

                        <div class="error-text">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- =================================================
                     TÉLÉPHONE
                ================================================== --}}

                <div class="form-group">

                    <label class="form-label">
                        Téléphone
                    </label>

                    <input
                        type="text"
                        name="telephone"
                        class="form-control"
                        value="{{ old('telephone') }}"
                        placeholder="+225 XX XX XX XX XX"
                    >

                    @error('telephone')

                        <div class="error-text">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- =================================================
                     ADRESSE
                ================================================== --}}

                <div class="form-group">

                    <label class="form-label">
                        Adresse / Localisation
                    </label>

                    <input
                        type="text"
                        name="adresse"
                        class="form-control"
                        value="{{ old('adresse') }}"
                        placeholder="Ex : Abidjan, Côte d'Ivoire"
                    >

                    @error('adresse')

                        <div class="error-text">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- =================================================
                     PHOTO
                ================================================== --}}

                <div class="form-group">

                    <label class="form-label">
                        Photo de profil
                    </label>

                    <input
                        type="file"
                        name="photo"
                        class="form-control"
                        accept=".jpg,.jpeg,.png,.webp"
                    >

                    <small class="form-help">
                        JPG, JPEG, PNG ou WEBP — maximum 2 Mo.
                    </small>

                    @error('photo')

                        <div class="error-text">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- =================================================
                     CV
                ================================================== --}}

                <div class="form-group">

                    <label class="form-label">
                        CV
                    </label>

                    <input
                        type="file"
                        name="cv"
                        class="form-control"
                        accept=".pdf,.doc,.docx"
                    >

                    <small class="form-help">
                        PDF, DOC ou DOCX — maximum 5 Mo.
                    </small>

                    @error('cv')

                        <div class="error-text">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- =================================================
                     DESCRIPTION
                ================================================== --}}

                <div class="form-group full">

                    <label class="form-label">
                        Présentation
                    </label>

                    <textarea
                        name="description"
                        class="form-control"
                        placeholder="Présentez-vous en quelques lignes..."
                    >{{ old('description') }}</textarea>

                    @error('description')

                        <div class="error-text">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- =================================================
                     LINKEDIN
                ================================================== --}}

                <div class="form-group">

                    <label class="form-label">
                        LinkedIn
                    </label>

                    <input
                        type="url"
                        name="linkedin"
                        class="form-control"
                        value="{{ old('linkedin') }}"
                        placeholder="https://linkedin.com/in/..."
                    >

                    @error('linkedin')

                        <div class="error-text">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- =================================================
                     GITHUB
                ================================================== --}}

                <div class="form-group">

                    <label class="form-label">
                        GitHub
                    </label>

                    <input
                        type="url"
                        name="github"
                        class="form-control"
                        value="{{ old('github') }}"
                        placeholder="https://github.com/..."
                    >

                    @error('github')

                        <div class="error-text">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- =================================================
                     FACEBOOK
                ================================================== --}}

                <div class="form-group">

                    <label class="form-label">
                        Facebook
                    </label>

                    <input
                        type="url"
                        name="facebook"
                        class="form-control"
                        value="{{ old('facebook') }}"
                        placeholder="https://facebook.com/..."
                    >

                    @error('facebook')

                        <div class="error-text">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- =================================================
                     INSTAGRAM
                ================================================== --}}

                <div class="form-group">

                    <label class="form-label">
                        Instagram
                    </label>

                    <input
                        type="url"
                        name="instagram"
                        class="form-control"
                        value="{{ old('instagram') }}"
                        placeholder="https://instagram.com/..."
                    >

                    @error('instagram')

                        <div class="error-text">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


            </div>


            {{-- =====================================================
                 BOUTONS
            ====================================================== --}}

            <div class="form-actions">

                <a
                    href="{{ route('admin.dashboard') }}"
                    class="btn btn-cancel"
                >

                    <i class="bi bi-arrow-left"></i>

                    Annuler

                </a>


                <button
                    type="submit"
                    class="btn btn-save"
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
