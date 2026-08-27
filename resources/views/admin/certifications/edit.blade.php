@extends('layouts.admin')

@section('title', 'Modifier une certification')

@section('page-title', 'Modifier une certification')

@section('content')

<style>
    /* =========================================================
       PAGE MODIFICATION CERTIFICATION
    ========================================================== */

    .certification-edit-page {
        max-width: 1400px;
        margin: 0 auto;
    }

    /* =========================================================
       EN-TÊTE
    ========================================================== */

    .certification-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 28px;
    }

    .certification-header-content {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .certification-header-icon {
        width: 58px;
        height: 58px;
        border-radius: 15px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: linear-gradient(
            135deg,
            #16a34a,
            #4ade80
        );

        color: white;
        font-size: 25px;

        box-shadow:
            0 8px 22px rgba(22, 163, 74, .20);
    }

    .certification-header h1 {
        font-size: 28px;
        font-weight: 750;
        color: #17231c;
        margin: 0 0 5px;
    }

    .certification-header p {
        margin: 0;
        color: #718078;
        font-size: 14px;
    }

    .header-actions {
        display: flex;
        gap: 9px;
        flex-wrap: wrap;
    }

    /* =========================================================
       BOUTONS
    ========================================================== */

    .cert-btn {
        border: none;
        border-radius: 10px;

        padding: 11px 17px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        gap: 8px;

        font-size: 14px;
        font-weight: 600;

        text-decoration: none;

        cursor: pointer;

        transition: .25s ease;
    }

    .cert-btn:hover {
        transform: translateY(-2px);
    }

    .cert-btn-primary {
        background: linear-gradient(
            135deg,
            #16a34a,
            #22c55e
        );

        color: white;

        box-shadow:
            0 7px 18px rgba(22, 163, 74, .20);
    }

    .cert-btn-primary:hover {
        color: white;

        box-shadow:
            0 12px 25px rgba(22, 163, 74, .30);
    }

    .cert-btn-secondary {
        background: white;
        color: #53645a;

        border: 1px solid #dce5df;
    }

    .cert-btn-secondary:hover {
        color: #16a34a;
        border-color: #16a34a;
        background: #f7fcf9;
    }

    .cert-btn-view {
        background: #eff6ff;
        color: #2563eb;

        border: 1px solid #dbeafe;
    }

    .cert-btn-view:hover {
        background: #dbeafe;
        color: #1d4ed8;
    }

    .cert-btn-danger {
        background: #fef2f2;
        color: #dc2626;

        border: 1px solid #fecaca;
    }

    .cert-btn-danger:hover {
        background: #fee2e2;
        color: #b91c1c;
    }

    /* =========================================================
       ALERTES
    ========================================================== */

    .cert-alert {
        border: none;
        border-radius: 13px;
        padding: 15px 18px;
        margin-bottom: 22px;
    }

    .cert-alert-danger {
        background: #fef2f2;
        border: 1px solid #fecaca;
        color: #991b1b;
    }

    .cert-alert-success {
        background: #ecfdf3;
        border: 1px solid #bbf7d0;
        color: #15803d;
    }

    .cert-alert ul {
        padding-left: 22px;
    }

    /* =========================================================
       CARTE PRINCIPALE
    ========================================================== */

    .certification-card {
        background: white;
        border: none;
        border-radius: 18px;

        box-shadow:
            0 8px 30px rgba(0, 0, 0, .05);

        overflow: hidden;
    }

    .certification-card-header {
        padding: 20px 25px;

        background: linear-gradient(
            135deg,
            #ffffff,
            #f8fcf9
        );

        border-bottom: 1px solid #edf1ee;
    }

    .certification-card-header-content {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .card-header-icon {
        width: 42px;
        height: 42px;

        border-radius: 11px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #ecfdf3;
        color: #16a34a;

        font-size: 19px;
    }

    .certification-card-header h5 {
        margin: 0;
        font-size: 17px;
        font-weight: 700;
        color: #17231c;
    }

    .certification-card-header small {
        color: #718078;
    }

    .certification-card-body {
        padding: 28px;
    }

    /* =========================================================
       SECTIONS
    ========================================================== */

    .form-section {
        margin-bottom: 28px;
    }

    .form-section:last-child {
        margin-bottom: 0;
    }

    .section-title {
        display: flex;
        align-items: center;
        gap: 9px;

        margin-bottom: 18px;

        color: #34443a;
        font-size: 15px;
        font-weight: 700;
    }

    .section-title i {
        color: #16a34a;
    }

    /* =========================================================
       FORMULAIRE
    ========================================================== */

    .certification-card .form-label {
        color: #34443a;
        font-size: 14px;
        margin-bottom: 8px;
    }

    .certification-card .form-control {
        border: 1px solid #dce5df;
        border-radius: 10px;

        padding: 11px 13px;

        color: #17231c;
        background: #fff;

        font-size: 14px;

        transition: .2s ease;
    }

    .certification-card .form-control:focus {
        border-color: #16a34a;

        box-shadow:
            0 0 0 3px rgba(22, 163, 74, .10);
    }

    .certification-card textarea.form-control {
        min-height: 130px;
        resize: vertical;
        line-height: 1.6;
    }

    .certification-card .form-text {
        color: #7b8981;
        font-size: 12px;
        margin-top: 7px;
    }

    .certification-card .form-text i {
        color: #16a34a;
    }

    .required {
        color: #dc2626;
    }

    /* =========================================================
       APERÇU IMAGE
    ========================================================== */

    .file-preview-card {
        height: 100%;

        border: 1px solid #e2e9e4;
        border-radius: 14px;

        background: #fbfdfc;

        padding: 16px;
    }

    .current-image-wrapper {
        background: #f4f8f5;

        border-radius: 11px;

        padding: 12px;

        margin-bottom: 13px;

        text-align: center;
    }

    .current-image {
        width: 100%;
        max-height: 250px;

        object-fit: contain;

        border-radius: 8px;

        display: block;
        margin: auto;
    }

    .no-file {
        min-height: 150px;

        display: flex;
        flex-direction: column;

        align-items: center;
        justify-content: center;

        color: #8a9990;

        text-align: center;
    }

    .no-file i {
        font-size: 42px;
        margin-bottom: 10px;
        color: #b7c8bd;
    }

    /* =========================================================
       PDF
    ========================================================== */

    .pdf-preview {
        display: flex;
        align-items: center;
        gap: 14px;

        background: #fff;

        border: 1px solid #e5e7eb;
        border-radius: 12px;

        padding: 16px;
    }

    .pdf-icon {
        width: 50px;
        height: 50px;

        border-radius: 11px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #fef2f2;
        color: #dc2626;

        font-size: 23px;

        flex-shrink: 0;
    }

    .pdf-info {
        min-width: 0;
    }

    .pdf-info strong {
        display: block;
        color: #34443a;
        margin-bottom: 4px;
    }

    .pdf-info a {
        color: #2563eb;
        font-size: 13px;
        text-decoration: none;
    }

    .pdf-info a:hover {
        text-decoration: underline;
    }

    /* =========================================================
       ZONE UPLOAD
    ========================================================== */

    .upload-box {
        border: 1px dashed #b8c9be;
        border-radius: 14px;

        padding: 20px;

        background: #fbfdfc;

        height: 100%;
    }

    .upload-box:hover {
        border-color: #16a34a;
        background: #f7fcf9;
    }

    /* =========================================================
       ACTIONS FINALES
    ========================================================== */

    .form-actions {
        border-top: 1px solid #edf1ee;

        margin-top: 28px;
        padding-top: 22px;

        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 15px;
    }

    .form-actions-right {
        display: flex;
        gap: 9px;
    }

    /* =========================================================
       SEPARATEUR
    ========================================================== */

    .cert-divider {
        border: 0;
        border-top: 1px solid #edf1ee;
        margin: 28px 0;
    }

    /* =========================================================
       RESPONSIVE
    ========================================================== */

    @media (max-width: 900px) {

        .certification-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .header-actions {
            width: 100%;
        }

    }

    @media (max-width: 600px) {

        .certification-header-content {
            align-items: flex-start;
        }

        .certification-header-icon {
            width: 48px;
            height: 48px;
            font-size: 20px;
        }

        .certification-header h1 {
            font-size: 23px;
        }

        .certification-card-body {
            padding: 18px;
        }

        .header-actions {
            flex-direction: column;
        }

        .header-actions .cert-btn {
            width: 100%;
        }

        .form-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .form-actions-right {
            flex-direction: column;
        }

        .form-actions .cert-btn {
            width: 100%;
        }

    }
</style>


<div class="container-fluid py-4 certification-edit-page">

    {{-- =========================================================
         EN-TÊTE
    ========================================================== --}}

    <div class="certification-header">

        <div class="certification-header-content">

            <div class="certification-header-icon">
                <i class="bi bi-award"></i>
            </div>

            <div>

                <h1>
                    Modifier la certification
                </h1>

                <p>
                    Modifiez les informations de votre certification.
                </p>

            </div>

        </div>


        <div class="header-actions">

            {{-- Voir --}}

            <a
                href="{{ route('admin.certifications.show', $certification) }}"
                class="cert-btn cert-btn-view"
            >

                <i class="bi bi-eye"></i>

                Voir

            </a>


            {{-- Retour --}}

            <a
                href="{{ route('admin.certifications.index') }}"
                class="cert-btn cert-btn-secondary"
            >

                <i class="bi bi-arrow-left"></i>

                Retour

            </a>

        </div>

    </div>


    {{-- =========================================================
         ERREURS
    ========================================================== --}}

    @if($errors->any())

        <div class="cert-alert cert-alert-danger">

            <div class="fw-bold mb-2">

                <i class="bi bi-exclamation-triangle me-2"></i>

                Des erreurs sont survenues :

            </div>

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- =========================================================
         SUCCÈS
    ========================================================== --}}

    @if(session('success'))

        <div class="cert-alert cert-alert-success">

            <i class="bi bi-check-circle me-2"></i>

            {{ session('success') }}

        </div>

    @endif


    {{-- =========================================================
         CARTE PRINCIPALE
    ========================================================== --}}

    <div class="certification-card">


        {{-- HEADER CARTE --}}

        <div class="certification-card-header">

            <div class="certification-card-header-content">

                <div class="card-header-icon">

                    <i class="bi bi-pencil-square"></i>

                </div>

                <div>

                    <h5>
                        Informations de la certification
                    </h5>

                    <small>
                        Modifiez les informations ci-dessous.
                    </small>

                </div>

            </div>

        </div>


        {{-- BODY --}}

        <div class="certification-card-body">


            {{-- =================================================
                 FORMULAIRE
            ================================================== --}}

            <form
                id="certification-form"
                action="{{ route('admin.certifications.update', $certification) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                @method('PUT')


                {{-- =================================================
                     INFORMATIONS GENERALES
                ================================================== --}}

                <div class="form-section">

                    <div class="section-title">

                        <i class="bi bi-info-circle"></i>

                        Informations générales

                    </div>


                    <div class="row g-4">


                        {{-- TITRE --}}

                        <div class="col-md-8">

                            <label
                                for="titre"
                                class="form-label fw-semibold"
                            >

                                Titre de la certification

                                <span class="required">*</span>

                            </label>

                            <input
                                type="text"
                                name="titre"
                                id="titre"
                                class="form-control @error('titre') is-invalid @enderror"
                                value="{{ old('titre', $certification->titre) }}"
                                placeholder="Ex : Certification Laravel"
                                required
                            >

                            @error('titre')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- ORGANISME --}}

                        <div class="col-md-4">

                            <label
                                for="organisme"
                                class="form-label fw-semibold"
                            >

                                Organisme / Établissement

                            </label>

                            <input
                                type="text"
                                name="organisme"
                                id="organisme"
                                class="form-control @error('organisme') is-invalid @enderror"
                                value="{{ old('organisme', $certification->organisme) }}"
                                placeholder="Ex : DigiFemmes"
                            >

                            @error('organisme')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- DESCRIPTION --}}

                        <div class="col-12">

                            <label
                                for="description"
                                class="form-label fw-semibold"
                            >

                                Description

                            </label>

                            <textarea
                                name="description"
                                id="description"
                                rows="5"
                                class="form-control @error('description') is-invalid @enderror"
                                placeholder="Décrivez brièvement cette certification ou cette formation..."
                            >{{ old('description', $certification->description) }}</textarea>

                            @error('description')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>

                </div>


                <hr class="cert-divider">


                {{-- =================================================
                     DATES
                ================================================== --}}

                <div class="form-section">

                    <div class="section-title">

                        <i class="bi bi-calendar3"></i>

                        Dates de la certification

                    </div>


                    <div class="row g-4">


                        {{-- DATE OBTENTION --}}

                        <div class="col-md-4">

                            <label
                                for="date_obtention"
                                class="form-label fw-semibold"
                            >

                                Date d'obtention

                            </label>

                            <input
                                type="date"
                                name="date_obtention"
                                id="date_obtention"
                                class="form-control @error('date_obtention') is-invalid @enderror"
                                value="{{ old(
                                    'date_obtention',
                                    $certification->date_obtention
                                        ? $certification->date_obtention->format('Y-m-d')
                                        : ''
                                ) }}"
                            >

                            @error('date_obtention')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- DATE DEBUT --}}

                        <div class="col-md-4">

                            <label
                                for="date_debut"
                                class="form-label fw-semibold"
                            >

                                Date de début

                            </label>

                            <input
                                type="date"
                                name="date_debut"
                                id="date_debut"
                                class="form-control @error('date_debut') is-invalid @enderror"
                                value="{{ old(
                                    'date_debut',
                                    $certification->date_debut
                                        ? $certification->date_debut->format('Y-m-d')
                                        : ''
                                ) }}"
                            >

                            @error('date_debut')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- DATE FIN --}}

                        <div class="col-md-4">

                            <label
                                for="date_fin"
                                class="form-label fw-semibold"
                            >

                                Date de fin

                            </label>

                            <input
                                type="date"
                                name="date_fin"
                                id="date_fin"
                                class="form-control @error('date_fin') is-invalid @enderror"
                                value="{{ old(
                                    'date_fin',
                                    $certification->date_fin
                                        ? $certification->date_fin->format('Y-m-d')
                                        : ''
                                ) }}"
                            >

                            @error('date_fin')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>

                </div>


                <hr class="cert-divider">


                {{-- =================================================
                     FICHIERS
                ================================================== --}}

                <div class="form-section">

                    <div class="section-title">

                        <i class="bi bi-folder2-open"></i>

                        Documents et fichiers

                    </div>


                    <div class="row g-4">


                        {{-- =================================================
                             IMAGE ACTUELLE
                        ================================================== --}}

                        <div class="col-lg-6">

                            <label class="form-label fw-semibold">

                                Image actuelle

                            </label>


                            <div class="file-preview-card">

                                @if($certification->image)

                                    <div class="current-image-wrapper">

                                        <img
                                            src="{{ asset('storage/' . $certification->image) }}"
                                            alt="{{ $certification->titre }}"
                                            class="current-image"
                                        >

                                    </div>


                                    <a
                                        href="{{ asset('storage/' . $certification->image) }}"
                                        target="_blank"
                                        class="cert-btn cert-btn-view"
                                    >

                                        <i class="bi bi-eye"></i>

                                        Voir l'image

                                    </a>

                                @else

                                    <div class="no-file">

                                        <i class="bi bi-image"></i>

                                        <strong>
                                            Aucune image
                                        </strong>

                                        <small>
                                            Aucune image n'est actuellement enregistrée.
                                        </small>

                                    </div>

                                @endif

                            </div>

                        </div>


                        {{-- =================================================
                             NOUVELLE IMAGE
                        ================================================== --}}

                        <div class="col-lg-6">

                            <label
                                for="image"
                                class="form-label fw-semibold"
                            >

                                Remplacer l'image

                            </label>


                            <div class="upload-box">

                                <input
                                    type="file"
                                    name="image"
                                    id="image"
                                    class="form-control @error('image') is-invalid @enderror"
                                    accept=".jpg,.jpeg,.png,.webp"
                                >


                                <div class="form-text">

                                    <i class="bi bi-info-circle me-1"></i>

                                    Laissez vide pour conserver l'image actuelle.

                                    <br>

                                    JPG, JPEG, PNG ou WEBP — maximum 2 Mo.

                                </div>


                                @error('image')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>

                        </div>


                        {{-- =================================================
                             DOCUMENT ACTUEL
                        ================================================== --}}

                        <div class="col-lg-6">

                            <label class="form-label fw-semibold">

                                Document actuel

                            </label>


                            <div class="file-preview-card">

                                @if($certification->document)

                                    <div class="pdf-preview">

                                        <div class="pdf-icon">

                                            <i class="bi bi-file-earmark-pdf"></i>

                                        </div>


                                        <div class="pdf-info">

                                            <strong>
                                                Document PDF
                                            </strong>

                                            <a
                                                href="{{ asset('storage/' . $certification->document) }}"
                                                target="_blank"
                                                rel="noopener noreferrer"
                                            >

                                                <i class="bi bi-box-arrow-up-right me-1"></i>

                                                Voir le document

                                            </a>

                                        </div>

                                    </div>

                                @else

                                    <div class="no-file">

                                        <i class="bi bi-file-earmark-x"></i>

                                        <strong>
                                            Aucun document PDF
                                        </strong>

                                        <small>
                                            Aucun document n'est actuellement enregistré.
                                        </small>

                                    </div>

                                @endif

                            </div>

                        </div>


                        {{-- =================================================
                             NOUVEAU DOCUMENT
                        ================================================== --}}

                        <div class="col-lg-6">

                            <label
                                for="document"
                                class="form-label fw-semibold"
                            >

                                Remplacer le document PDF

                            </label>


                            <div class="upload-box">

                                <input
                                    type="file"
                                    name="document"
                                    id="document"
                                    class="form-control @error('document') is-invalid @enderror"
                                    accept=".pdf"
                                >


                                <div class="form-text">

                                    <i class="bi bi-file-earmark-pdf me-1"></i>

                                    Laissez vide pour conserver le document actuel.

                                    <br>

                                    PDF uniquement — maximum 10 Mo.

                                </div>


                                @error('document')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>

                        </div>

                    </div>

                </div>


                <hr class="cert-divider">


                {{-- =================================================
                     LIEN
                ================================================== --}}

                <div class="form-section">

                    <div class="section-title">

                        <i class="bi bi-link-45deg"></i>

                        Vérification en ligne

                    </div>


                    <label
                        for="lien"
                        class="form-label fw-semibold"
                    >

                        Lien de vérification

                    </label>


                    <input
                        type="url"
                        name="lien"
                        id="lien"
                        class="form-control @error('lien') is-invalid @enderror"
                        value="{{ old('lien', $certification->lien) }}"
                        placeholder="https://..."
                    >


                    <div class="form-text">

                        <i class="bi bi-info-circle me-1"></i>

                        Facultatif. Ajoutez un lien permettant de vérifier
                        la certification en ligne.

                    </div>


                    @error('lien')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


            </form>


            {{-- =========================================================
                 ACTIONS FINALES
            ========================================================== --}}

            <div class="form-actions">


                {{-- SUPPRIMER --}}

                <form
                    action="{{ route('admin.certifications.destroy', $certification) }}"
                    method="POST"
                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette certification ? Cette action est irréversible.');"
                >

                    @csrf

                    @method('DELETE')


                    <button
                        type="submit"
                        class="cert-btn cert-btn-danger"
                    >

                        <i class="bi bi-trash"></i>

                        Supprimer

                    </button>

                </form>


                {{-- AUTRES ACTIONS --}}

                <div class="form-actions-right">

                    <a
                        href="{{ route('admin.certifications.show', $certification) }}"
                        class="cert-btn cert-btn-secondary"
                    >

                        <i class="bi bi-x-lg"></i>

                        Annuler

                    </a>


                    <button
                        type="submit"
                        form="certification-form"
                        class="cert-btn cert-btn-primary"
                    >

                        <i class="bi bi-check-lg"></i>

                        Enregistrer les modifications

                    </button>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- =========================================================
     JAVASCRIPT
========================================================== --}}

<script>

document.addEventListener("DOMContentLoaded", function () {

    /*
    |------------------------------------------------------------------
    | APERÇU DE LA NOUVELLE IMAGE
    |------------------------------------------------------------------
    */

    const imageInput = document.getElementById("image");

    if (imageInput) {

        imageInput.addEventListener("change", function () {

            const file = this.files[0];

            if (!file) {
                return;
            }

            const allowedTypes = [
                "image/jpeg",
                "image/png",
                "image/webp"
            ];

            if (!allowedTypes.includes(file.type)) {

                alert(
                    "Veuillez sélectionner une image JPG, JPEG, PNG ou WEBP."
                );

                this.value = "";

                return;
            }


            /*
            |----------------------------------------------------------
            | Vérification taille : 2 Mo
            |----------------------------------------------------------
            */

            if (file.size > 2 * 1024 * 1024) {

                alert(
                    "L'image ne doit pas dépasser 2 Mo."
                );

                this.value = "";

                return;
            }

        });

    }


    /*
    |------------------------------------------------------------------
    | VÉRIFICATION DU PDF
    |------------------------------------------------------------------
    */

    const documentInput =
        document.getElementById("document");

    if (documentInput) {

        documentInput.addEventListener("change", function () {

            const file = this.files[0];

            if (!file) {
                return;
            }


            if (file.type !== "application/pdf") {

                alert(
                    "Veuillez sélectionner uniquement un fichier PDF."
                );

                this.value = "";

                return;
            }


            /*
            |----------------------------------------------------------
            | Vérification taille : 10 Mo
            |----------------------------------------------------------
            */

            if (file.size > 10 * 1024 * 1024) {

                alert(
                    "Le document PDF ne doit pas dépasser 10 Mo."
                );

                this.value = "";

                return;
            }

        });

    }


    /*
    |------------------------------------------------------------------
    | ANIMATION DES BOUTONS
    |------------------------------------------------------------------
    */

    const buttons =
        document.querySelectorAll(
            ".cert-btn"
        );


    buttons.forEach(function (button) {

        button.addEventListener(
            "click",
            function () {

                button.style.transform =
                    "scale(0.97)";


                setTimeout(function () {

                    button.style.transform = "";

                }, 100);

            }
        );

    });

});

</script>

@endsection