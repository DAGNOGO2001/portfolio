```blade
@extends('layouts.admin')

@section('title', 'Ajouter une certification | Administration')

@section('page-title', 'Ajouter une certification')

@section('content')

<style>

/* =========================
   PAGE CERTIFICATION
========================= */

.certification-form-card {

    background: white;

    border-radius: 18px;

    overflow: hidden;

    box-shadow:
        0 8px 30px rgba(0, 0, 0, .05);

}


/* =========================
   HEADER FORMULAIRE
========================= */

.form-card-header {

    padding: 22px 25px;

    border-bottom: 1px solid #edf1ee;

}

.form-card-header h2 {

    color: #17231c;

    font-size: 18px;

    margin: 0 0 5px 0;

}

.form-card-header p {

    color: #718078;

    font-size: 13px;

    margin: 0;

}


/* =========================
   FORMULAIRE
========================= */

.certification-form {

    padding: 30px;

}


.form-section {

    margin-bottom: 30px;

}


.section-title {

    display: flex;

    align-items: center;

    gap: 10px;

    margin-bottom: 22px;

    padding-bottom: 12px;

    border-bottom: 1px solid #edf1ee;

}

.section-title i {

    color: #16a34a;

    font-size: 20px;

}

.section-title h3 {

    margin: 0;

    color: #17231c;

    font-size: 16px;

}


/* =========================
   CHAMPS
========================= */

.form-group {

    margin-bottom: 20px;

}


.form-label-custom {

    display: block;

    margin-bottom: 8px;

    color: #34443a;

    font-size: 13px;

    font-weight: 700;

}


.required {

    color: #dc2626;

}


.form-control-custom {

    width: 100%;

    padding: 12px 14px;

    border: 1px solid #dce5df;

    border-radius: 10px;

    background: #fff;

    color: #17231c;

    font-family: inherit;

    font-size: 14px;

    outline: none;

    transition: .2s;

}


.form-control-custom:focus {

    border-color: #16a34a;

    box-shadow:
        0 0 0 3px rgba(22, 163, 74, .10);

}


.form-control-custom::placeholder {

    color: #9aa69f;

}


textarea.form-control-custom {

    resize: vertical;

    min-height: 130px;

}


.form-help {

    display: block;

    margin-top: 7px;

    color: #7b8981;

    font-size: 12px;

    line-height: 1.5;

}


/* =========================
   INPUT FILE
========================= */

.file-input {

    padding: 10px;

    cursor: pointer;

}


.file-input::file-selector-button {

    border: none;

    border-radius: 8px;

    padding: 8px 12px;

    margin-right: 10px;

    background: #ecfdf3;

    color: #15803d;

    font-weight: 600;

    cursor: pointer;

}


/* =========================
   ERREURS
========================= */

.field-error {

    display: block;

    margin-top: 7px;

    color: #dc2626;

    font-size: 12px;

}


.has-error {

    border-color: #dc2626;

}


.has-error:focus {

    border-color: #dc2626;

    box-shadow:
        0 0 0 3px rgba(220, 38, 38, .10);

}


/* =========================
   BLOC FICHIERS
========================= */

.upload-card {

    border: 1px dashed #cbd8cf;

    border-radius: 12px;

    padding: 18px;

    background: #fbfdfc;

}


.upload-icon {

    width: 42px;

    height: 42px;

    border-radius: 10px;

    background: #ecfdf3;

    color: #16a34a;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 20px;

    margin-bottom: 12px;

}


/* =========================
   ACTIONS
========================= */

.form-actions {

    display: flex;

    justify-content: space-between;

    align-items: center;

    gap: 12px;

    padding-top: 25px;

    border-top: 1px solid #edf1ee;

}


.form-actions-right {

    display: flex;

    gap: 10px;

}


/* =========================
   BOUTON SECONDAIRE
========================= */

.btn-secondary-custom {

    border: none;

    border-radius: 10px;

    padding: 11px 18px;

    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: 8px;

    font-size: 14px;

    font-weight: 600;

    cursor: pointer;

    transition: .25s;

    background: #f1f5f2;

    color: #53645a;

}


.btn-secondary-custom:hover {

    background: #e5ebe7;

    color: #34443a;

}


/* =========================
   BOUTON VERT
========================= */

.btn-success-custom {

    border: none;

    border-radius: 10px;

    padding: 11px 18px;

    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: 8px;

    font-size: 14px;

    font-weight: 600;

    cursor: pointer;

    transition: .25s;

    background: linear-gradient(
        135deg,
        #16a34a,
        #22c55e
    );

    color: white;

    box-shadow:
        0 7px 18px rgba(22, 163, 74, .20);

}


.btn-success-custom:hover {

    transform: translateY(-2px);

    box-shadow:
        0 12px 25px rgba(22, 163, 74, .30);

}


/* =========================
   ALERT
========================= */

.form-alert {

    display: flex;

    align-items: flex-start;

    gap: 10px;

    padding: 14px 18px;

    border-radius: 12px;

    margin-bottom: 25px;

    font-size: 14px;

}


.form-alert-danger {

    background: #fef2f2;

    border: 1px solid #fecaca;

    color: #b91c1c;

}


.form-alert-danger ul {

    margin: 6px 0 0 20px;

    padding: 0;

}


/* =========================
   RESPONSIVE
========================= */

@media (max-width: 768px) {

    .certification-form {

        padding: 20px;

    }


    .form-actions {

        flex-direction: column-reverse;

        align-items: stretch;

    }


    .form-actions-right {

        width: 100%;

        flex-direction: column;

    }


    .form-actions a,
    .form-actions button {

        width: 100%;

    }

}

</style>


<!-- =========================
     HEADER
========================= -->

<div class="topbar">

    <div class="page-title">

        <h1>
            Ajouter une certification
        </h1>

        <p>
            Ajoutez un certificat, une attestation ou une formation certifiante.
        </p>

    </div>

</div>


<!-- =========================
     ERREURS
========================= -->

@if($errors->any())

    <div class="form-alert form-alert-danger">

        <i class="bi bi-exclamation-triangle-fill"></i>

        <div>

            <strong>
                Des erreurs sont survenues :
            </strong>

            <ul>

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    </div>

@endif


<!-- =========================
     FORMULAIRE
========================= -->

<div class="certification-form-card">


    <!-- HEADER -->

    <div class="form-card-header">

        <h2>

            <i class="bi bi-award"
               style="color:#16a34a;margin-right:8px;">
            </i>

            Informations de la certification

        </h2>

        <p>
            Renseignez les informations relatives à votre certification.
        </p>

    </div>


    <!-- FORM -->

    <form
        action="{{ route('admin.certifications.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="certification-form"
    >

        @csrf


        <!-- =========================
             INFORMATIONS PRINCIPALES
        ========================== -->

        <div class="form-section">


            <div class="section-title">

                <i class="bi bi-info-circle"></i>

                <h3>
                    Informations principales
                </h3>

            </div>


            <div class="row">


                <!-- TITRE -->

                <div class="col-md-8">

                    <div class="form-group">

                        <label
                            for="titre"
                            class="form-label-custom"
                        >

                            Titre de la certification

                            <span class="required">
                                *
                            </span>

                        </label>


                        <input
                            type="text"
                            name="titre"
                            id="titre"
                            class="form-control-custom @error('titre') has-error @enderror"
                            value="{{ old('titre') }}"
                            placeholder="Ex : Certification Laravel"
                            required
                        >


                        @error('titre')

                            <span class="field-error">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>

                </div>


                <!-- ORGANISME -->

                <div class="col-md-4">

                    <div class="form-group">

                        <label
                            for="organisme"
                            class="form-label-custom"
                        >

                            Organisme / Établissement

                        </label>


                        <input
                            type="text"
                            name="organisme"
                            id="organisme"
                            class="form-control-custom @error('organisme') has-error @enderror"
                            value="{{ old('organisme') }}"
                            placeholder="Ex : DigiFemmes"
                        >


                        @error('organisme')

                            <span class="field-error">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>

                </div>


                <!-- DESCRIPTION -->

                <div class="col-12">

                    <div class="form-group">

                        <label
                            for="description"
                            class="form-label-custom"
                        >

                            Description

                        </label>


                        <textarea
                            name="description"
                            id="description"
                            rows="5"
                            class="form-control-custom @error('description') has-error @enderror"
                            placeholder="Décrivez brièvement cette certification ou cette formation..."
                        >{{ old('description') }}</textarea>


                        <span class="form-help">

                            <i class="bi bi-info-circle"></i>

                            Décrivez les compétences acquises,
                            le contenu de la formation ou l'objectif
                            de cette certification.

                        </span>


                        @error('description')

                            <span class="field-error">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>

                </div>

            </div>

        </div>


        <!-- =========================
             DATES
        ========================== -->

        <div class="form-section">


            <div class="section-title">

                <i class="bi bi-calendar3"></i>

                <h3>
                    Dates
                </h3>

            </div>


            <div class="row">


                <!-- DATE OBTENTION -->

                <div class="col-md-4">

                    <div class="form-group">

                        <label
                            for="date_obtention"
                            class="form-label-custom"
                        >

                            Date d'obtention

                        </label>


                        <input
                            type="date"
                            name="date_obtention"
                            id="date_obtention"
                            class="form-control-custom @error('date_obtention') has-error @enderror"
                            value="{{ old('date_obtention') }}"
                        >


                        @error('date_obtention')

                            <span class="field-error">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>

                </div>


                <!-- DATE DEBUT -->

                <div class="col-md-4">

                    <div class="form-group">

                        <label
                            for="date_debut"
                            class="form-label-custom"
                        >

                            Date de début

                        </label>


                        <input
                            type="date"
                            name="date_debut"
                            id="date_debut"
                            class="form-control-custom @error('date_debut') has-error @enderror"
                            value="{{ old('date_debut') }}"
                        >


                        @error('date_debut')

                            <span class="field-error">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>

                </div>


                <!-- DATE FIN -->

                <div class="col-md-4">

                    <div class="form-group">

                        <label
                            for="date_fin"
                            class="form-label-custom"
                        >

                            Date de fin

                        </label>


                        <input
                            type="date"
                            name="date_fin"
                            id="date_fin"
                            class="form-control-custom @error('date_fin') has-error @enderror"
                            value="{{ old('date_fin') }}"
                        >


                        @error('date_fin')

                            <span class="field-error">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>

                </div>

            </div>

        </div>


        <!-- =========================
             DOCUMENTS
        ========================== -->

        <div class="form-section">


            <div class="section-title">

                <i class="bi bi-folder2-open"></i>

                <h3>
                    Documents et justificatifs
                </h3>

            </div>


            <div class="row">


                <!-- IMAGE -->

                <div class="col-md-6">

                    <div class="form-group">


                        <div class="upload-card">


                            <div class="upload-icon">

                                <i class="bi bi-image"></i>

                            </div>


                            <label
                                for="image"
                                class="form-label-custom"
                            >

                                Image du certificat

                            </label>


                            <input
                                type="file"
                                name="image"
                                id="image"
                                class="form-control-custom file-input @error('image') has-error @enderror"
                                accept=".jpg,.jpeg,.png,.webp"
                            >


                            <span class="form-help">

                                JPG, JPEG, PNG ou WEBP.
                                Taille maximale : 2 Mo.

                            </span>


                            @error('image')

                                <span class="field-error">
                                    {{ $message }}
                                </span>

                            @enderror


                        </div>

                    </div>

                </div>


                <!-- PDF -->

                <div class="col-md-6">

                    <div class="form-group">


                        <div class="upload-card">


                            <div class="upload-icon">

                                <i class="bi bi-file-earmark-pdf"></i>

                            </div>


                            <label
                                for="document"
                                class="form-label-custom"
                            >

                                Document du certificat

                            </label>


                            <input
                                type="file"
                                name="document"
                                id="document"
                                class="form-control-custom file-input @error('document') has-error @enderror"
                                accept=".pdf"
                            >


                            <span class="form-help">

                                PDF uniquement.
                                Taille maximale : 10 Mo.

                            </span>


                            @error('document')

                                <span class="field-error">
                                    {{ $message }}
                                </span>

                            @enderror


                        </div>

                    </div>

                </div>


                <!-- LIEN -->

                <div class="col-12">

                    <div class="form-group">

                        <label
                            for="lien"
                            class="form-label-custom"
                        >

                            Lien de vérification

                        </label>


                        <input
                            type="url"
                            name="lien"
                            id="lien"
                            class="form-control-custom @error('lien') has-error @enderror"
                            value="{{ old('lien') }}"
                            placeholder="https://..."
                        >


                        <span class="form-help">

                            <i class="bi bi-link-45deg"></i>

                            Facultatif. Ajoutez un lien permettant
                            de vérifier la certification en ligne.

                        </span>


                        @error('lien')

                            <span class="field-error">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>

                </div>

            </div>

        </div>


        <!-- =========================
             ACTIONS
        ========================== -->

        <div class="form-actions">


            <!-- RETOUR -->

            <a
                href="{{ route('admin.certifications.index') }}"
                class="btn-secondary-custom"
            >

                <i class="bi bi-arrow-left"></i>

                Retour aux certifications

            </a>


            <!-- BOUTONS -->

            <div class="form-actions-right">


                <a
                    href="{{ route('admin.certifications.index') }}"
                    class="btn-secondary-custom"
                >

                    <i class="bi bi-x-lg"></i>

                    Annuler

                </a>


                <button
                    type="submit"
                    class="btn-success-custom"
                >

                    <i class="bi bi-check-lg"></i>

                    Enregistrer la certification

                </button>


            </div>

        </div>


    </form>

</div>


<!-- =========================
     JAVASCRIPT
========================= -->

<script>

document.addEventListener("DOMContentLoaded", function () {


    const buttons =
        document.querySelectorAll(
            ".btn-success-custom, .btn-secondary-custom"
        );


    buttons.forEach(function (button) {


        button.addEventListener(
            "click",
            function () {


                button.style.transform =
                    "scale(0.96)";


                setTimeout(function () {

                    button.style.transform = "";

                }, 100);


            }
        );


    });


});

</script>

@endsection
```
