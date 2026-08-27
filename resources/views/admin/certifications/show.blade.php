```blade
@extends('layouts.admin')

@section('title', 'Détails de la certification')

@section('page-title', 'Détails de la certification')

@section('content')

<style>

/* =========================================================
   PAGE CERTIFICATION - SHOW
========================================================= */

.certification-page {
    color: #17231c;
}

/* =========================================================
   EN-TÊTE
========================================================= */

.certification-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    gap: 20px;
}

.certification-title h1 {
    font-size: 30px;
    font-weight: 700;
    margin-bottom: 6px;
    color: #17231c;
}

.certification-title p {
    margin: 0;
    color: #718078;
    font-size: 14px;
}

.certification-title-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 48px;
    height: 48px;
    border-radius: 13px;
    margin-right: 10px;
    background: #ecfdf3;
    color: #16a34a;
    vertical-align: middle;
}

/* =========================================================
   BOUTONS
========================================================= */

.certification-actions {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.certification-actions .btn {
    border-radius: 10px;
    padding: 11px 17px;
    font-size: 14px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 7px;
    transition: .25s;
}

.certification-actions .btn-primary {
    background: linear-gradient(135deg, #16a34a, #22c55e);
    border: none;
    color: white;
    box-shadow: 0 7px 18px rgba(22, 163, 74, .18);
}

.certification-actions .btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 25px rgba(22, 163, 74, .28);
}

.certification-actions .btn-outline-secondary {
    border-color: #d8e0da;
    color: #53645a;
}

.certification-actions .btn-outline-secondary:hover {
    background: #f4f8f5;
    color: #17231c;
}

/* =========================================================
   ALERT
========================================================= */

.certification-alert {
    border: none;
    border-radius: 12px;
    padding: 14px 18px;
    margin-bottom: 25px;
}

/* =========================================================
   CARDS
========================================================= */

.certification-card {
    background: white;
    border: none !important;
    border-radius: 18px !important;
    overflow: hidden;
    box-shadow: 0 8px 30px rgba(0, 0, 0, .05) !important;
    margin-bottom: 25px;
}

.certification-card-header {
    background: #ffffff;
    border-bottom: 1px solid #edf1ee;
    padding: 18px 22px;
}

.certification-card-header h5 {
    margin: 0;
    color: #17231c;
    font-size: 16px;
    font-weight: 700;
}

.certification-card-header i {
    color: #16a34a;
    margin-right: 8px;
}

.certification-card-body {
    padding: 25px;
}

/* =========================================================
   TITRE CERTIFICATION
========================================================= */

.certification-main-title {
    display: flex;
    align-items: flex-start;
    gap: 16px;
    margin-bottom: 25px;
}

.certification-icon {
    width: 58px;
    height: 58px;
    flex-shrink: 0;
    border-radius: 14px;
    background: linear-gradient(
        135deg,
        #ecfdf3,
        #dcfce7
    );
    color: #16a34a;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 27px;
}

.certification-main-title h2 {
    font-size: 24px;
    font-weight: 700;
    margin: 2px 0 7px;
    color: #17231c;
}

.certification-organisme {
    display: flex;
    align-items: center;
    gap: 7px;
    color: #718078;
    font-size: 14px;
}

.certification-organisme i {
    color: #16a34a;
}

/* =========================================================
   DESCRIPTION
========================================================= */

.description-box {
    background: #f7faf8;
    border: 1px solid #edf1ee;
    border-radius: 13px;
    padding: 18px;
    margin-bottom: 25px;
}

.description-title {
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 700;
    color: #34443a;
    margin-bottom: 10px;
}

.description-title i {
    color: #16a34a;
}

.description-content {
    color: #718078;
    line-height: 1.7;
    font-size: 14px;
    white-space: pre-line;
}

/* =========================================================
   INFORMATIONS DATES
========================================================= */

.info-box {
    height: 100%;
    border: 1px solid #edf1ee;
    background: #ffffff;
    border-radius: 13px;
    padding: 17px;
    transition: .25s;
}

.info-box:hover {
    border-color: #bbf7d0;
    transform: translateY(-2px);
    box-shadow: 0 7px 20px rgba(22, 163, 74, .07);
}

.info-label {
    display: flex;
    align-items: center;
    gap: 7px;
    color: #718078;
    font-size: 12px;
    margin-bottom: 8px;
}

.info-label i {
    color: #16a34a;
    font-size: 15px;
}

.info-value {
    color: #34443a;
    font-weight: 700;
    font-size: 15px;
}

/* =========================================================
   IMAGE
========================================================= */

.certificate-image-wrapper {
    background: #f7faf8;
    border: 1px solid #edf1ee;
    border-radius: 14px;
    padding: 20px;
    text-align: center;
}

.certificate-image {
    max-width: 100%;
    max-height: 600px;
    object-fit: contain;
    border-radius: 12px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, .08);
}

.image-action {
    margin-top: 18px;
}

.image-action .btn {
    border-radius: 9px;
    font-weight: 600;
}

/* =========================================================
   DOCUMENTS
========================================================= */

.document-item {
    display: flex;
    align-items: center;
    gap: 13px;
    padding: 14px;
    border-radius: 12px;
    background: #f7faf8;
    border: 1px solid #edf1ee;
    margin-bottom: 12px;
}

.document-icon {
    width: 45px;
    height: 45px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    font-size: 21px;
}

.document-icon.pdf {
    background: #fef2f2;
    color: #dc2626;
}

.document-icon.link {
    background: #eff6ff;
    color: #2563eb;
}

.document-info {
    flex: 1;
    min-width: 0;
}

.document-info strong {
    display: block;
    color: #34443a;
    font-size: 13px;
    margin-bottom: 3px;
}

.document-info span {
    color: #718078;
    font-size: 12px;
}

.document-button {
    border-radius: 8px;
    font-size: 12px;
    font-weight: 600;
}

/* =========================================================
   ABSENCE DOCUMENT
========================================================= */

.no-document {
    text-align: center;
    padding: 25px 15px;
    color: #718078;
}

.no-document i {
    display: block;
    font-size: 38px;
    color: #b7c8bd;
    margin-bottom: 10px;
}

/* =========================================================
   ACTIONS
========================================================= */

.action-list {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.action-list .btn {
    width: 100%;
    border-radius: 10px;
    padding: 11px 15px;
    font-size: 14px;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.action-list .btn-primary {
    background: linear-gradient(135deg, #16a34a, #22c55e);
    border: none;
}

.action-list .btn-outline-danger {
    color: #dc2626;
    border-color: #fecaca;
}

.action-list .btn-outline-danger:hover {
    background: #fef2f2;
}

.action-list .btn-outline-secondary:hover {
    background: #f4f8f5;
}

/* =========================================================
   INFORMATIONS SYSTÈME
========================================================= */

.system-info {
    display: flex;
    flex-direction: column;
    gap: 17px;
}

.system-item {
    padding-bottom: 15px;
    border-bottom: 1px solid #edf1ee;
}

.system-item:last-child {
    padding-bottom: 0;
    border-bottom: none;
}

.system-item small {
    display: block;
    color: #718078;
    font-size: 11px;
    margin-bottom: 5px;
}

.system-item strong {
    color: #34443a;
    font-size: 13px;
}

/* =========================================================
   BADGES
========================================================= */

.status-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 10px;
    border-radius: 8px;
    background: #ecfdf3;
    color: #15803d;
    font-size: 11px;
    font-weight: 700;
}

.status-badge i {
    font-size: 7px;
}

/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 992px) {

    .certification-header {
        align-items: flex-start;
        flex-direction: column;
    }

    .certification-actions {
        width: 100%;
    }

}

@media (max-width: 600px) {

    .certification-title h1 {
        font-size: 24px;
    }

    .certification-card-body {
        padding: 18px;
    }

    .certification-main-title h2 {
        font-size: 20px;
    }

    .certification-actions {
        flex-direction: column;
    }

    .certification-actions .btn {
        width: 100%;
        justify-content: center;
    }

}

</style>


<div class="container-fluid py-4 certification-page">


    {{-- =========================================================
         EN-TÊTE
    ========================================================== --}}

    <div class="certification-header">

        <div class="certification-title">

            <h1>

                <span class="certification-title-icon">
                    <i class="bi bi-award"></i>
                </span>

                Détails de la certification

            </h1>

            <p>
                Consultez les informations détaillées de cette certification.
            </p>

        </div>


        <div class="certification-actions">

            <a
                href="{{ route('admin.certifications.index') }}"
                class="btn btn-outline-secondary"
            >
                <i class="bi bi-arrow-left"></i>
                Retour
            </a>


            <a
                href="{{ route('admin.certifications.edit', $certification) }}"
                class="btn btn-primary"
            >
                <i class="bi bi-pencil"></i>
                Modifier
            </a>

        </div>

    </div>


    {{-- =========================================================
         MESSAGE DE SUCCÈS
    ========================================================== --}}

    @if(session('success'))

        <div
            class="alert alert-success certification-alert alert-dismissible fade show"
            role="alert"
        >

            <i class="bi bi-check-circle-fill me-2"></i>

            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>

        </div>

    @endif


    {{-- =========================================================
         CONTENU
    ========================================================== --}}

    <div class="row g-4">


        {{-- =====================================================
             COLONNE PRINCIPALE
        ====================================================== --}}

        <div class="col-lg-8">


            {{-- =================================================
                 INFORMATIONS GÉNÉRALES
            ================================================== --}}

            <div class="certification-card">

                <div class="certification-card-header">

                    <h5>
                        <i class="bi bi-info-circle"></i>
                        Informations générales
                    </h5>

                </div>


                <div class="certification-card-body">


                    {{-- Titre --}}

                    <div class="certification-main-title">

                        <div class="certification-icon">

                            <i class="bi bi-award"></i>

                        </div>


                        <div>

                            <h2>
                                {{ $certification->titre }}
                            </h2>


                            @if($certification->organisme)

                                <div class="certification-organisme">

                                    <i class="bi bi-building"></i>

                                    {{ $certification->organisme }}

                                </div>

                            @else

                                <div class="certification-organisme">

                                    <i class="bi bi-building"></i>

                                    Organisme non renseigné

                                </div>

                            @endif

                        </div>

                    </div>


                    {{-- Statut --}}

                    <div class="mb-4">

                        <span class="status-badge">

                            <i class="bi bi-circle-fill"></i>

                            Certification enregistrée

                        </span>

                    </div>


                    {{-- Description --}}

                    @if($certification->description)

                        <div class="description-box">

                            <div class="description-title">

                                <i class="bi bi-card-text"></i>

                                Description

                            </div>


                            <div class="description-content">

                                {{ $certification->description }}

                            </div>

                        </div>

                    @endif


                    {{-- Dates --}}

                    <div class="row g-3">


                        {{-- Date obtention --}}

                        <div class="col-md-4">

                            <div class="info-box">

                                <div class="info-label">

                                    <i class="bi bi-calendar-check"></i>

                                    Date d'obtention

                                </div>


                                <div class="info-value">

                                    @if($certification->date_obtention)

                                        {{ $certification->date_obtention->format('d/m/Y') }}

                                    @else

                                        <span class="text-muted">
                                            Non renseignée
                                        </span>

                                    @endif

                                </div>

                            </div>

                        </div>


                        {{-- Date début --}}

                        <div class="col-md-4">

                            <div class="info-box">

                                <div class="info-label">

                                    <i class="bi bi-calendar-event"></i>

                                    Date de début

                                </div>


                                <div class="info-value">

                                    @if($certification->date_debut)

                                        {{ $certification->date_debut->format('d/m/Y') }}

                                    @else

                                        <span class="text-muted">
                                            Non renseignée
                                        </span>

                                    @endif

                                </div>

                            </div>

                        </div>


                        {{-- Date fin --}}

                        <div class="col-md-4">

                            <div class="info-box">

                                <div class="info-label">

                                    <i class="bi bi-calendar-event"></i>

                                    Date de fin

                                </div>


                                <div class="info-value">

                                    @if($certification->date_fin)

                                        {{ $certification->date_fin->format('d/m/Y') }}

                                    @else

                                        <span class="text-muted">
                                            Non renseignée
                                        </span>

                                    @endif

                                </div>

                            </div>

                        </div>


                    </div>

                </div>

            </div>


            {{-- =================================================
                 IMAGE DU CERTIFICAT
            ================================================== --}}

            @if($certification->image)

                <div class="certification-card">

                    <div class="certification-card-header">

                        <h5>

                            <i class="bi bi-image"></i>

                            Image du certificat

                        </h5>

                    </div>


                    <div class="certification-card-body">

                        <div class="certificate-image-wrapper">

                            <img
                                src="{{ asset('storage/' . $certification->image) }}"
                                alt="{{ $certification->titre }}"
                                class="certificate-image"
                            >


                            <div class="image-action">

                                <a
                                    href="{{ asset('storage/' . $certification->image) }}"
                                    target="_blank"
                                    class="btn btn-outline-primary"
                                >

                                    <i class="bi bi-box-arrow-up-right me-1"></i>

                                    Ouvrir l'image

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            @endif


        </div>


        {{-- =====================================================
             COLONNE LATÉRALE
        ====================================================== --}}

        <div class="col-lg-4">


            {{-- =================================================
                 DOCUMENTS
            ================================================== --}}

            <div class="certification-card">

                <div class="certification-card-header">

                    <h5>

                        <i class="bi bi-folder2-open"></i>

                        Documents

                    </h5>

                </div>


                <div class="certification-card-body">


                    {{-- PDF --}}

                    @if($certification->document)

                        <div class="document-item">

                            <div class="document-icon pdf">

                                <i class="bi bi-file-earmark-pdf"></i>

                            </div>


                            <div class="document-info">

                                <strong>
                                    Certificat PDF
                                </strong>

                                <span>
                                    Document disponible
                                </span>

                            </div>


                            <a
                                href="{{ asset('storage/' . $certification->document) }}"
                                target="_blank"
                                class="btn btn-sm btn-outline-danger document-button"
                                title="Voir le PDF"
                            >

                                <i class="bi bi-eye"></i>

                            </a>

                        </div>

                    @endif


                    {{-- IMAGE --}}

                    @if($certification->image)

                        <div class="document-item">

                            <div class="document-icon link">

                                <i class="bi bi-image"></i>

                            </div>


                            <div class="document-info">

                                <strong>
                                    Image du certificat
                                </strong>

                                <span>
                                    Image disponible
                                </span>

                            </div>


                            <a
                                href="{{ asset('storage/' . $certification->image) }}"
                                target="_blank"
                                class="btn btn-sm btn-outline-primary document-button"
                                title="Voir l'image"
                            >

                                <i class="bi bi-eye"></i>

                            </a>

                        </div>

                    @endif


                    {{-- LIEN --}}

                    @if($certification->lien)

                        <div class="document-item">

                            <div class="document-icon link">

                                <i class="bi bi-link-45deg"></i>

                            </div>


                            <div class="document-info">

                                <strong>
                                    Vérification en ligne
                                </strong>

                                <span>
                                    Lien disponible
                                </span>

                            </div>


                            <a
                                href="{{ $certification->lien }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="btn btn-sm btn-outline-primary document-button"
                                title="Vérifier"
                            >

                                <i class="bi bi-box-arrow-up-right"></i>

                            </a>

                        </div>

                    @endif


                    {{-- Aucun document --}}

                    @if(
                        !$certification->document &&
                        !$certification->image &&
                        !$certification->lien
                    )

                        <div class="no-document">

                            <i class="bi bi-folder-x"></i>

                            <div>
                                Aucun document disponible.
                            </div>

                        </div>

                    @endif


                </div>

            </div>


            {{-- =================================================
                 ACTIONS
            ================================================== --}}

            <div class="certification-card">

                <div class="certification-card-header">

                    <h5>

                        <i class="bi bi-gear"></i>

                        Actions

                    </h5>

                </div>


                <div class="certification-card-body">

                    <div class="action-list">


                        {{-- Modifier --}}

                        <a
                            href="{{ route('admin.certifications.edit', $certification) }}"
                            class="btn btn-primary"
                        >

                            <i class="bi bi-pencil"></i>

                            Modifier la certification

                        </a>


                        {{-- Supprimer --}}

                        <form
                            action="{{ route('admin.certifications.destroy', $certification) }}"
                            method="POST"
                            onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette certification ? Cette action est irréversible.');"
                        >

                            @csrf

                            @method('DELETE')


                            <button
                                type="submit"
                                class="btn btn-outline-danger"
                            >

                                <i class="bi bi-trash"></i>

                                Supprimer

                            </button>

                        </form>


                        {{-- Retour --}}

                        <a
                            href="{{ route('admin.certifications.index') }}"
                            class="btn btn-outline-secondary"
                        >

                            <i class="bi bi-arrow-left"></i>

                            Retour à la liste

                        </a>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 INFORMATIONS SYSTÈME
            ================================================== --}}

            <div class="certification-card">

                <div class="certification-card-header">

                    <h5>

                        <i class="bi bi-clock-history"></i>

                        Informations

                    </h5>

                </div>


                <div class="certification-card-body">

                    <div class="system-info">


                        {{-- Création --}}

                        <div class="system-item">

                            <small>
                                <i class="bi bi-plus-circle me-1"></i>
                                Ajoutée le
                            </small>

                            <strong>

                                {{ $certification->created_at->format('d/m/Y à H:i') }}

                            </strong>

                        </div>


                        {{-- Modification --}}

                        <div class="system-item">

                            <small>
                                <i class="bi bi-pencil-square me-1"></i>
                                Dernière modification
                            </small>

                            <strong>

                                {{ $certification->updated_at->format('d/m/Y à H:i') }}

                            </strong>

                        </div>


                        {{-- ID --}}

                        <div class="system-item">

                            <small>
                                <i class="bi bi-hash me-1"></i>
                                Identifiant
                            </small>

                            <strong>

                                #{{ $certification->id }}

                            </strong>

                        </div>


                    </div>

                </div>

            </div>


        </div>

    </div>

</div>

@endsection
```
