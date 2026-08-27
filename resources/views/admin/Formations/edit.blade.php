@extends('layouts.admin')

@section('title', 'Modifier une formation | Administration')

@section('page-title', 'Modifier une formation')

@section('content')

<style>

/* =========================================================
   FORMULAIRE
========================================================= */

.form-page {
    max-width: 900px;
    margin: 0 auto;
}


/* =========================================================
   EN-TÊTE
========================================================= */

.form-header {
    margin-bottom: 25px;
}

.form-header h2 {
    margin: 0 0 7px;
    font-size: 26px;
    color: #17221b;
}

.form-header p {
    margin: 0;
    color: #7c8a82;
    font-size: 14px;
}


/* =========================================================
   CARTE
========================================================= */

.form-card {
    background: #ffffff;
    border: 1px solid #e8eee9;
    border-radius: 18px;
    padding: 30px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, .04);
}


/* =========================================================
   FORM GROUP
========================================================= */

.form-group {
    margin-bottom: 22px;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    color: #26332b;
    font-size: 14px;
    font-weight: 600;
}

.form-group label span {
    color: #dc2626;
}


/* =========================================================
   INPUTS
========================================================= */

.form-control {
    width: 100%;
    padding: 13px 15px;

    border: 1px solid #dce5df;
    border-radius: 10px;

    background: #ffffff;
    color: #26332b;

    font-family: inherit;
    font-size: 14px;

    outline: none;

    transition: all .2s ease;
}

.form-control:focus {
    border-color: #4ade80;

    box-shadow:
        0 0 0 3px rgba(74, 222, 128, .12);
}

textarea.form-control {
    min-height: 150px;
    resize: vertical;
}


/* =========================================================
   ERREURS
========================================================= */

.input-error {
    border-color: #dc2626;
}

.error-message {
    display: block;
    margin-top: 6px;
    color: #dc2626;
    font-size: 12px;
}


/* =========================================================
   AIDE
========================================================= */

.form-help {
    display: block;
    margin-top: 6px;
    color: #8a978f;
    font-size: 12px;
}


/* =========================================================
   ACTIONS
========================================================= */

.form-actions {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 12px;

    padding-top: 10px;
    margin-top: 10px;

    border-top: 1px solid #edf1ee;
}

.btn {
    border: none;
    border-radius: 10px;

    padding: 12px 20px;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    gap: 8px;

    font-size: 14px;
    font-weight: 600;

    cursor: pointer;
    text-decoration: none;

    transition: all .25s ease;
}

.btn-primary {
    background: linear-gradient(
        135deg,
        #16a34a,
        #22c55e
    );

    color: white;

    box-shadow:
        0 7px 18px rgba(22, 163, 74, .18);
}

.btn-primary:hover {
    transform: translateY(-2px);

    box-shadow:
        0 12px 25px rgba(22, 163, 74, .25);
}

.btn-secondary {
    background: #f1f5f2;
    color: #53645a;
}

.btn-secondary:hover {
    background: #e7eee9;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media(max-width: 700px) {

    .form-card {
        padding: 20px;
    }

    .form-row {
        grid-template-columns: 1fr;
        gap: 0;
    }

    .form-actions {
        flex-direction: column-reverse;
        align-items: stretch;
    }

    .form-actions .btn {
        width: 100%;
    }

}

</style>


<!-- =========================================================
     PAGE
========================================================= -->

<div class="form-page">


    <!-- =====================================================
         EN-TÊTE
    ====================================================== -->

    <div class="form-header">

        <h2>
            Modifier une formation
        </h2>

        <p>
            Modifiez les informations de cette formation.
        </p>

    </div>



    <!-- =====================================================
         FORMULAIRE
    ====================================================== -->

    <div class="form-card">

        <form
            action="{{ route('admin.formations.update', $formation) }}"
            method="POST">

            @csrf

            @method('PUT')


            <!-- =================================================
                 DIPLÔME
            ================================================== -->

            <div class="form-group">

                <label for="diplome">
                    Diplôme <span>*</span>
                </label>

                <input
                    type="text"
                    id="diplome"
                    name="diplome"
                    class="form-control @error('diplome') input-error @enderror"
                    value="{{ old('diplome', $formation->diplome) }}"
                    placeholder="Exemple : Licence Professionnelle en Informatique"
                    required>

                @error('diplome')

                    <span class="error-message">
                        {{ $message }}
                    </span>

                @enderror

            </div>



            <!-- =================================================
                 ÉTABLISSEMENT
            ================================================== -->

            <div class="form-group">

                <label for="etablissement">
                    Établissement <span>*</span>
                </label>

                <input
                    type="text"
                    id="etablissement"
                    name="etablissement"
                    class="form-control @error('etablissement') input-error @enderror"
                    value="{{ old('etablissement', $formation->etablissement) }}"
                    placeholder="Exemple : Université de Technologie de Lomé"
                    required>

                @error('etablissement')

                    <span class="error-message">
                        {{ $message }}
                    </span>

                @enderror

            </div>



            <!-- =================================================
                 DATES
            ================================================== -->

            <div class="form-row">


                <!-- DATE DEBUT -->

                <div class="form-group">

                    <label for="date_debut">
                        Date de début
                    </label>

                    <input
                        type="date"
                        id="date_debut"
                        name="date_debut"
                        class="form-control @error('date_debut') input-error @enderror"
                        value="{{ old(
                            'date_debut',
                            $formation->date_debut?->format('Y-m-d')
                        ) }}">

                    @error('date_debut')

                        <span class="error-message">
                            {{ $message }}
                        </span>

                    @enderror

                </div>



                <!-- DATE FIN -->

                <div class="form-group">

                    <label for="date_fin">
                        Date de fin
                    </label>

                    <input
                        type="date"
                        id="date_fin"
                        name="date_fin"
                        class="form-control @error('date_fin') input-error @enderror"
                        value="{{ old(
                            'date_fin',
                            $formation->date_fin?->format('Y-m-d')
                        ) }}">

                    <span class="form-help">
                        Laissez vide si la formation est toujours en cours.
                    </span>

                    @error('date_fin')

                        <span class="error-message">
                            {{ $message }}
                        </span>

                    @enderror

                </div>


            </div>



            <!-- =================================================
                 DESCRIPTION
            ================================================== -->

            <div class="form-group">

                <label for="description">
                    Description
                </label>

                <textarea
                    id="description"
                    name="description"
                    class="form-control @error('description') input-error @enderror"
                    placeholder="Décrivez brièvement cette formation, les compétences acquises ou la spécialité...">{{ old('description', $formation->description) }}</textarea>

                @error('description')

                    <span class="error-message">
                        {{ $message }}
                    </span>

                @enderror

            </div>



            <!-- =================================================
                 ACTIONS
            ================================================== -->

            <div class="form-actions">

                <a
                    href="{{ route('admin.formations.index') }}"
                    class="btn btn-secondary">

                    <i class="bi bi-arrow-left"></i>

                    Annuler

                </a>


                <button
                    type="submit"
                    class="btn btn-primary">

                    <i class="bi bi-check-lg"></i>

                    Enregistrer les modifications

                </button>

            </div>


        </form>

    </div>


</div>

@endsection