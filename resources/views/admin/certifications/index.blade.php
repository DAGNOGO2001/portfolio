@extends('layouts.admin')

@section('title', 'Gestion des certifications | Administration')

@section('page-title', 'Mes certifications')

@section('content')

<style>

/* =========================================================
   VARIABLES
========================================================= */

.certifications-page {

    --green: #16a34a;
    --green-dark: #15803d;
    --green-light: #ecfdf3;
    --green-soft: #f0fdf4;

    --dark: #17231c;
    --text: #34443a;
    --muted: #718078;
    --border: #e8eee9;

    --white: #ffffff;
    --danger: #dc2626;
    --danger-light: #fef2f2;

}


/* =========================================================
   PAGE HEADER
========================================================= */

.cert-page-header {

    display: flex;

    justify-content: space-between;

    align-items: center;

    gap: 20px;

    margin-bottom: 30px;

}


.cert-page-title {

    display: flex;

    align-items: center;

    gap: 16px;

}


.cert-page-title-icon {

    width: 58px;

    height: 58px;

    border-radius: 16px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: linear-gradient(
        135deg,
        #dcfce7,
        #ecfdf3
    );

    color: var(--green);

    font-size: 26px;

    box-shadow:
        0 8px 20px rgba(22, 163, 74, .10);

}


.cert-page-title h1 {

    margin: 0 0 5px;

    color: var(--dark);

    font-size: 28px;

    font-weight: 800;

    letter-spacing: -.5px;

}


.cert-page-title p {

    margin: 0;

    color: var(--muted);

    font-size: 14px;

}


/* =========================================================
   SUCCESS ALERT
========================================================= */

.cert-alert {

    display: flex;

    align-items: center;

    gap: 12px;

    padding: 14px 18px;

    margin-bottom: 25px;

    border-radius: 12px;

    border: 1px solid #bbf7d0;

    background: #f0fdf4;

    color: #166534;

    font-size: 14px;

    animation: certFadeIn .3s ease;

}


.cert-alert i {

    font-size: 20px;

}


/* =========================================================
   ERROR ALERT
========================================================= */

.cert-error-alert {

    display: flex;

    align-items: flex-start;

    gap: 12px;

    padding: 16px 18px;

    margin-bottom: 25px;

    border-radius: 12px;

    border: 1px solid #fecaca;

    background: #fef2f2;

    color: #b91c1c;

}


.cert-error-alert > i {

    font-size: 20px;

    margin-top: 2px;

}


.cert-error-alert ul {

    margin: 6px 0 0 18px;

    padding: 0;

}


/* =========================================================
   STATISTICS
========================================================= */

.certification-stats {

    display: grid;

    grid-template-columns:
        repeat(3, minmax(0, 1fr));

    gap: 20px;

    margin-bottom: 25px;

}


.stat-card {

    position: relative;

    overflow: hidden;

    display: flex;

    align-items: center;

    gap: 16px;

    padding: 22px;

    background: var(--white);

    border: 1px solid var(--border);

    border-radius: 18px;

    box-shadow:
        0 8px 30px rgba(23, 35, 28, .05);

    transition:
        transform .25s ease,
        box-shadow .25s ease;

}


.stat-card::after {

    content: "";

    position: absolute;

    width: 90px;

    height: 90px;

    border-radius: 50%;

    background: var(--green-light);

    right: -35px;

    bottom: -40px;

    opacity: .8;

}


.stat-card:hover {

    transform: translateY(-4px);

    box-shadow:
        0 15px 35px rgba(23, 35, 28, .09);

}


.stat-icon {

    position: relative;

    z-index: 1;

    width: 54px;

    height: 54px;

    flex-shrink: 0;

    border-radius: 15px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: var(--green-light);

    color: var(--green);

    font-size: 23px;

}


.stat-icon.pdf {

    background: #fef2f2;

    color: #dc2626;

}


.stat-icon.image {

    background: #ecfeff;

    color: #0891b2;

}


.stat-info {

    position: relative;

    z-index: 1;

}


.stat-info span {

    display: block;

    margin-bottom: 5px;

    color: var(--muted);

    font-size: 12px;

}


.stat-info strong {

    display: block;

    color: var(--dark);

    font-size: 28px;

    font-weight: 800;

    line-height: 1;

}


/* =========================================================
   ACTION BAR
========================================================= */

.cert-action-bar {

    display: flex;

    justify-content: space-between;

    align-items: center;

    gap: 20px;

    padding: 18px 20px;

    margin-bottom: 18px;

    background: var(--white);

    border: 1px solid var(--border);

    border-radius: 16px;

    box-shadow:
        0 5px 20px rgba(23, 35, 28, .04);

}


.certification-count {

    color: var(--muted);

    font-size: 14px;

}


.certification-count strong {

    color: var(--dark);

    font-size: 20px;

    font-weight: 800;

    margin-right: 4px;

}


/* =========================================================
   ADD BUTTON
========================================================= */

.cert-add-btn {

    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: 8px;

    padding: 11px 18px;

    border-radius: 10px;

    background: linear-gradient(
        135deg,
        #16a34a,
        #22c55e
    );

    color: white !important;

    font-size: 13px;

    font-weight: 700;

    text-decoration: none;

    border: none;

    box-shadow:
        0 7px 18px rgba(22, 163, 74, .18);

    transition: all .25s ease;

}


.cert-add-btn:hover {

    transform: translateY(-2px);

    box-shadow:
        0 10px 25px rgba(22, 163, 74, .25);

}


.cert-add-btn i {

    font-size: 17px;

}


/* =========================================================
   TABLE CARD
========================================================= */

.cert-table-card {

    overflow: hidden;

    background: var(--white);

    border: 1px solid var(--border);

    border-radius: 18px;

    box-shadow:
        0 8px 30px rgba(23, 35, 28, .05);

}


.cert-table-container {

    width: 100%;

    overflow-x: auto;

}


.cert-table {

    width: 100%;

    min-width: 1050px;

    border-collapse: collapse;

}


/* =========================================================
   TABLE HEADER
========================================================= */

.cert-table thead th {

    padding: 16px 20px;

    background: #f8faf9;

    border-bottom: 1px solid var(--border);

    color: #607067;

    font-size: 11px;

    font-weight: 800;

    text-transform: uppercase;

    letter-spacing: .6px;

    white-space: nowrap;

}


.cert-table tbody td {

    padding: 18px 20px;

    border-bottom: 1px solid #eef2ef;

    vertical-align: middle;

}


.cert-table tbody tr {

    transition: background .2s ease;

}


.cert-table tbody tr:hover {

    background: #fbfdfb;

}


.cert-table tbody tr:last-child td {

    border-bottom: none;

}


/* =========================================================
   CERTIFICATION ITEM
========================================================= */

.certification-item {

    display: flex;

    align-items: center;

    gap: 13px;

    min-width: 280px;

}


.certification-icon {

    position: relative;

    width: 52px;

    height: 52px;

    flex-shrink: 0;

    display: flex;

    align-items: center;

    justify-content: center;

    overflow: hidden;

    border-radius: 13px;

    background: linear-gradient(
        135deg,
        #dcfce7,
        #ecfdf3
    );

    color: var(--green);

    font-size: 22px;

}


.certification-icon img {

    width: 100%;

    height: 100%;

    object-fit: cover;

}


.certification-info {

    min-width: 0;

}


.certification-info strong {

    display: block;

    max-width: 300px;

    margin-bottom: 5px;

    overflow: hidden;

    color: var(--dark);

    font-size: 14px;

    font-weight: 700;

    text-overflow: ellipsis;

    white-space: nowrap;

}


.certification-info span {

    display: block;

    max-width: 300px;

    overflow: hidden;

    color: var(--muted);

    font-size: 12px;

    font-weight: 400;

    text-overflow: ellipsis;

    white-space: nowrap;

}


/* =========================================================
   ORGANISME
========================================================= */

.organization {

    display: inline-flex;

    align-items: center;

    gap: 7px;

    padding: 7px 10px;

    border-radius: 8px;

    background: #f5f8f6;

    color: var(--text);

    font-size: 12px;

    font-weight: 600;

    white-space: nowrap;

}


.organization i {

    color: var(--green);

    font-size: 14px;

}


/* =========================================================
   DATE OBTENTION
========================================================= */

.certification-date {

    min-width: 120px;

}


.date-obtention {

    color: var(--text);

    font-size: 13px;

    font-weight: 700;

}


.date-label {

    margin-top: 4px;

    color: var(--muted);

    font-size: 11px;

}


/* =========================================================
   PERIODE
========================================================= */

.certification-period {

    min-width: 130px;

}


.period-start {

    color: var(--text);

    font-size: 13px;

    font-weight: 700;

}


.period-end {

    margin-top: 4px;

    color: var(--muted);

    font-size: 11px;

}


.period-current {

    display: inline-flex;

    align-items: center;

    gap: 5px;

    margin-top: 6px;

    padding: 5px 9px;

    border-radius: 20px;

    background: var(--green-light);

    color: var(--green-dark);

    font-size: 10px;

    font-weight: 800;

}


.period-current i {

    font-size: 6px;

}


/* =========================================================
   DOCUMENTS
========================================================= */

.documents {

    display: flex;

    align-items: center;

    gap: 7px;

}


.document-btn {

    width: 35px;

    height: 35px;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 9px;

    text-decoration: none;

    transition: all .2s ease;

}


.document-btn:hover {

    transform: translateY(-2px);

}


.document-image {

    background: #ecfeff;

    color: #0891b2;

}


.document-image:hover {

    background: #cffafe;

    color: #0e7490;

}


.document-pdf {

    background: #fef2f2;

    color: #dc2626;

}


.document-pdf:hover {

    background: #fee2e2;

    color: #b91c1c;

}


.document-link {

    background: #eff6ff;

    color: #2563eb;

}


.document-link:hover {

    background: #dbeafe;

    color: #1d4ed8;

}


/* =========================================================
   ACTIONS
========================================================= */

.certification-actions {

    display: flex;

    align-items: center;

    gap: 7px;

}


.certification-action {

    width: 36px;

    height: 36px;

    display: flex;

    align-items: center;

    justify-content: center;

    padding: 0;

    border: none;

    border-radius: 9px;

    cursor: pointer;

    text-decoration: none;

    transition: all .2s ease;

}


.certification-action:hover {

    transform: translateY(-2px);

}


.view {

    background: #f3f4f6;

    color: #4b5563;

}


.view:hover {

    background: #e5e7eb;

    color: #374151;

}


.edit {

    background: #eff6ff;

    color: #2563eb;

}


.edit:hover {

    background: #dbeafe;

    color: #1d4ed8;

}


.delete {

    background: #fef2f2;

    color: #dc2626;

}


.delete:hover {

    background: #fee2e2;

    color: #b91c1c;

}


.delete-form {

    margin: 0;

}


/* =========================================================
   EMPTY STATE
========================================================= */

.cert-empty {

    text-align: center;

    padding: 80px 25px;

}


.cert-empty-icon {

    width: 85px;

    height: 85px;

    margin: 0 auto 20px;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 25px;

    background: var(--green-light);

    color: var(--green);

    font-size: 38px;

}


.cert-empty h3 {

    margin: 0 0 8px;

    color: var(--dark);

    font-size: 20px;

    font-weight: 800;

}


.cert-empty p {

    max-width: 450px;

    margin: 0 auto 25px;

    color: var(--muted);

    font-size: 14px;

    line-height: 1.7;

}


/* =========================================================
   ANIMATION
========================================================= */

@keyframes certFadeIn {

    from {

        opacity: 0;

        transform: translateY(-5px);

    }

    to {

        opacity: 1;

        transform: translateY(0);

    }

}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 900px) {

    .certification-stats {

        grid-template-columns: 1fr;

    }


    .cert-page-header {

        align-items: flex-start;

    }

}


@media (max-width: 600px) {

    .cert-page-header {

        flex-direction: column;

    }


    .cert-page-title-icon {

        width: 50px;

        height: 50px;

    }


    .cert-page-title h1 {

        font-size: 23px;

    }


    .cert-action-bar {

        flex-direction: column;

        align-items: stretch;

    }


    .cert-add-btn {

        width: 100%;

    }


    .stat-card {

        padding: 18px;

    }


    .cert-empty {

        padding: 60px 20px;

    }

}

</style>

<div class="certifications-page">

```
{{-- =========================================================
     EN-TÊTE
========================================================== --}}

<div class="cert-page-header">

    <div class="cert-page-title">

        <div class="cert-page-title-icon">

            <i class="bi bi-award"></i>

        </div>

        <div>

            <h1>
                Mes certifications
            </h1>

            <p>
                Gérez vos certificats, attestations et formations certifiantes.
            </p>

        </div>

    </div>


    <a
        href="{{ route('admin.certifications.create') }}"
        class="cert-add-btn"
    >

        <i class="bi bi-plus-lg"></i>

        Ajouter une certification

    </a>

</div>


{{-- =========================================================
     MESSAGE DE SUCCÈS
========================================================== --}}

@if(session('success'))

    <div class="cert-alert">

        <i class="bi bi-check-circle-fill"></i>

        <span>
            {{ session('success') }}
        </span>

    </div>

@endif


{{-- =========================================================
     ERREURS
========================================================== --}}

@if($errors->any())

    <div class="cert-error-alert">

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


{{-- =========================================================
     STATISTIQUES
========================================================== --}}

<div class="certification-stats">


    {{-- TOTAL --}}

    <div class="stat-card">

        <div class="stat-icon">

            <i class="bi bi-award"></i>

        </div>

        <div class="stat-info">

            <span>
                Total certifications
            </span>

            <strong>
                {{ $certifications->count() }}
            </strong>

        </div>

    </div>


    {{-- PDF --}}

    <div class="stat-card">

        <div class="stat-icon pdf">

            <i class="bi bi-file-earmark-pdf"></i>

        </div>

        <div class="stat-info">

            <span>
                Documents PDF
            </span>

            <strong>
                {{ $certifications->whereNotNull('document')->count() }}
            </strong>

        </div>

    </div>


    {{-- IMAGES --}}

    <div class="stat-card">

        <div class="stat-icon image">

            <i class="bi bi-image"></i>

        </div>

        <div class="stat-info">

            <span>
                Certifications illustrées
            </span>

            <strong>
                {{ $certifications->whereNotNull('image')->count() }}
            </strong>

        </div>

    </div>

</div>


{{-- =========================================================
     BARRE D'ACTION
========================================================== --}}

<div class="cert-action-bar">

    <div class="certification-count">

        <strong>
            {{ $certifications->count() }}
        </strong>

        certification(s) enregistrée(s)

    </div>


    <a
        href="{{ route('admin.certifications.create') }}"
        class="cert-add-btn"
    >

        <i class="bi bi-plus-lg"></i>

        Nouvelle certification

    </a>

</div>


{{-- =========================================================
     TABLEAU
========================================================== --}}

<div class="cert-table-card">


    @if($certifications->count())


        <div class="cert-table-container">

            <table class="cert-table">

                <thead>

                    <tr>

                        <th>
                            Certification
                        </th>

                        <th>
                            Organisme
                        </th>

                        <th>
                            Obtention
                        </th>

                        <th>
                            Période
                        </th>

                        <th>
                            Documents
                        </th>

                        <th>
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody>


                    @foreach($certifications as $certification)

                        <tr>


                            {{-- =================================================
                                 CERTIFICATION
                            ================================================== --}}

                            <td>

                                <div class="certification-item">

                                    <div class="certification-icon">

                                        @if($certification->image)

                                            <img
                                                src="{{ asset('storage/' . $certification->image) }}"
                                                alt="{{ $certification->titre }}"
                                            >

                                        @else

                                            <i class="bi bi-award"></i>

                                        @endif

                                    </div>


                                    <div class="certification-info">

                                        <strong>
                                            {{ $certification->titre }}
                                        </strong>


                                        @if($certification->description)

                                            <span>

                                                {{ \Illuminate\Support\Str::limit(
                                                    $certification->description,
                                                    70
                                                ) }}

                                            </span>

                                        @else

                                            <span>
                                                Certification professionnelle
                                            </span>

                                        @endif

                                    </div>

                                </div>

                            </td>


                            {{-- =================================================
                                 ORGANISME
                            ================================================== --}}

                            <td>

                                @if($certification->organisme)

                                    <div class="organization">

                                        <i class="bi bi-building"></i>

                                        {{ $certification->organisme }}

                                    </div>

                                @else

                                    <span style="color:#9aa69f;">
                                        —
                                    </span>

                                @endif

                            </td>


                            {{-- =================================================
                                 OBTENTION
                            ================================================== --}}

                            <td>

                                <div class="certification-date">

                                    @if($certification->date_obtention)

                                        <div class="date-obtention">

                                            {{ $certification->date_obtention->format('d/m/Y') }}

                                        </div>

                                        <div class="date-label">
                                            Date d'obtention
                                        </div>

                                    @else

                                        <span style="color:#9aa69f;">
                                            Non renseignée
                                        </span>

                                    @endif

                                </div>

                            </td>


                            {{-- =================================================
                                 PERIODE
                            ================================================== --}}

                            <td>

                                <div class="certification-period">

                                    @if($certification->date_debut)

                                        <div class="period-start">

                                            {{ $certification->date_debut->format('d/m/Y') }}

                                        </div>

                                    @endif


                                    @if($certification->date_fin)

                                        <div class="period-end">

                                            au
                                            {{ $certification->date_fin->format('d/m/Y') }}

                                        </div>

                                    @elseif($certification->date_debut)

                                        <div class="period-current">

                                            <i class="bi bi-circle-fill"></i>

                                            En cours

                                        </div>

                                    @else

                                        <span style="color:#9aa69f;">
                                            —
                                        </span>

                                    @endif

                                </div>

                            </td>


                            {{-- =================================================
                                 DOCUMENTS
                            ================================================== --}}

                            <td>

                                <div class="documents">


                                    {{-- IMAGE --}}

                                    @if($certification->image)

                                        <a
                                            href="{{ asset('storage/' . $certification->image) }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            class="document-btn document-image"
                                            title="Voir l'image"
                                        >

                                            <i class="bi bi-image"></i>

                                        </a>

                                    @endif


                                    {{-- PDF --}}

                                    @if($certification->document)

                                        <a
                                            href="{{ asset('storage/' . $certification->document) }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            class="document-btn document-pdf"
                                            title="Voir le document PDF"
                                        >

                                            <i class="bi bi-file-earmark-pdf"></i>

                                        </a>

                                    @endif


                                    {{-- LIEN --}}

                                    @if($certification->lien)

                                        <a
                                            href="{{ $certification->lien }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            class="document-btn document-link"
                                            title="Vérifier la certification"
                                        >

                                            <i class="bi bi-link-45deg"></i>

                                        </a>

                                    @endif


                                    @if(
                                        !$certification->image &&
                                        !$certification->document &&
                                        !$certification->lien
                                    )

                                        <span style="color:#9aa69f;">
                                            —
                                        </span>

                                    @endif

                                </div>

                            </td>


                            {{-- =================================================
                                 ACTIONS
                            ================================================== --}}

                            <td>

                                <div class="certification-actions">


                                    {{-- VOIR --}}

                                    <a
                                        href="{{ route('admin.certifications.show', $certification) }}"
                                        class="certification-action view"
                                        title="Voir les détails"
                                    >

                                        <i class="bi bi-eye"></i>

                                    </a>


                                    {{-- MODIFIER --}}

                                    <a
                                        href="{{ route('admin.certifications.edit', $certification) }}"
                                        class="certification-action edit"
                                        title="Modifier"
                                    >

                                        <i class="bi bi-pencil"></i>

                                    </a>


                                    {{-- SUPPRIMER --}}

                                    <form
                                        action="{{ route('admin.certifications.destroy', $certification) }}"
                                        method="POST"
                                        class="delete-form"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="certification-action delete"
                                            title="Supprimer"
                                        >

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>


    @else


        {{-- =================================================
             AUCUNE CERTIFICATION
        ================================================== --}}

        <div class="cert-empty">

            <div class="cert-empty-icon">

                <i class="bi bi-award"></i>

            </div>


            <h3>
                Aucune certification
            </h3>


            <p>
                Vous n'avez pas encore ajouté de certification,
                attestation ou formation certifiante.
            </p>


            <a
                href="{{ route('admin.certifications.create') }}"
                class="cert-add-btn"
            >

                <i class="bi bi-plus-lg"></i>

                Ajouter ma première certification

            </a>

        </div>

    @endif

</div>
```

</div>

{{-- =========================================================
JAVASCRIPT
========================================================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    const deleteForms =
        document.querySelectorAll('.delete-form');


    deleteForms.forEach(function (form) {

        form.addEventListener('submit', function (event) {

            const confirmation = confirm(
                'Voulez-vous vraiment supprimer cette certification ? Cette action est irréversible.'
            );


            if (!confirmation) {

                event.preventDefault();

            }

        });

    });

});

</script>

@endsection
