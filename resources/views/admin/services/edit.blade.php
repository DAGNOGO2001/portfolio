@extends('layouts.admin')

@section('title', 'Modifier un service | Administration')

@section('page-title', 'Modifier un service')

@section('content')

<style>

/* =========================================================
   PAGE FORMULAIRE
========================================================= */

.form-container {
    max-width: 900px;
    margin: 0 auto;
}

.form-card {
    background: #ffffff;
    border: 1px solid #e8eee9;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0, 0, 0, .03);
}

.form-header {
    padding: 22px 25px;
    border-bottom: 1px solid #edf1ee;
    display: flex;
    align-items: center;
    gap: 12px;
}

.form-header-icon {
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

.form-header h2 {
    margin: 0;
    font-size: 20px;
    font-weight: 700;
    color: #17221b;
}

.form-header p {
    margin: 4px 0 0;
    color: #829087;
    font-size: 13px;
}

.form-body {
    padding: 25px;
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
    color: #26332b;
    font-size: 14px;
    font-weight: 600;
}

.form-label span {
    color: #16a34a;
}

.form-control {
    width: 100%;
    padding: 12px 14px;
    border: 1px solid #dfe7e1;
    border-radius: 11px;
    background: #ffffff;
    color: #26332b;
    font-size: 14px;
    outline: none;
    transition: all .2s ease;
    box-sizing: border-box;
}

.form-control:focus {
    border-color: #4ade80;
    box-shadow: 0 0 0 3px rgba(74, 222, 128, .12);
}

textarea.form-control {
    min-height: 150px;
    resize: vertical;
}

.form-help {
    display: block;
    margin-top: 6px;
    color: #89958e;
    font-size: 12px;
}


/* =========================================================
   ERREURS
========================================================= */

.form-error {
    margin-top: 6px;
    color: #dc2626;
    font-size: 12px;
}


/* =========================================================
   APERÇU ICÔNE
========================================================= */

.icon-preview {
    margin-top: 12px;
    display: flex;
    align-items: center;
    gap: 12px;
}

.icon-preview-box {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    background: #ecfdf3;
    color: #16a34a;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 23px;
}

.icon-preview-text {
    color: #718078;
    font-size: 12px;
}


/* =========================================================
   ACTIONS
========================================================= */

.form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 12px;
    padding-top: 10px;
    border-top: 1px solid #edf1ee;
}

.btn {
    border: none;
    border-radius: 11px;
    padding: 12px 20px;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all .2s ease;
}

.btn-secondary {
    background: #f3f6f4;
    color: #526158;
}

.btn-secondary:hover {
    background: #e8eeea;
}

.btn-primary {
    background: #16a34a;
    color: #ffffff;
}

.btn-primary:hover {
    background: #15803d;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(22, 163, 74, .18);
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media(max-width: 600px) {

    .form-body {
        padding: 18px;
    }

    .form-header {
        padding: 18px;
    }

    .form-actions {
        flex-direction: column-reverse;
    }

    .btn {
        width: 100%;
        justify-content: center;
    }

}

</style>

<div class="form-container">

```
<div class="form-card">

    <!-- =================================================
         EN-TÊTE
    ================================================== -->

    <div class="form-header">

        <div class="form-header-icon">

            <i class="bi bi-pencil-square"></i>

        </div>

        <div>

            <h2>
                Modifier le service
            </h2>

            <p>
                Modifiez les informations de ce service.
            </p>

        </div>

    </div>


    <!-- =================================================
         FORMULAIRE
    ================================================== -->

    <div class="form-body">

        <form action="{{ route('admin.services.update', $service->id) }}"
              method="POST">

            @csrf

            @method('PUT')


            <!-- =================================================
                 TITRE
            ================================================== -->

            <div class="form-group">

                <label for="titre" class="form-label">

                    Titre du service <span>*</span>

                </label>

                <input
                    type="text"
                    id="titre"
                    name="titre"
                    class="form-control"
                    value="{{ old('titre', $service->titre) }}"
                    placeholder="Exemple : Développement web"
                    required
                >

                @error('titre')

                    <div class="form-error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <!-- =================================================
                 DESCRIPTION
            ================================================== -->

            <div class="form-group">

                <label for="description" class="form-label">

                    Description <span>*</span>

                </label>

                <textarea
                    id="description"
                    name="description"
                    class="form-control"
                    placeholder="Décrivez votre service..."
                    required
                >{{ old('description', $service->description) }}</textarea>

                <span class="form-help">

                    Présentez brièvement ce que vous proposez avec ce service.

                </span>

                @error('description')

                    <div class="form-error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <!-- =================================================
                 ICÔNE
            ================================================== -->

            <div class="form-group">

                <label for="icone" class="form-label">

                    Icône

                </label>

                <input
                    type="text"
                    id="icone"
                    name="icone"
                    class="form-control"
                    value="{{ old('icone', $service->icone) }}"
                    placeholder="Exemple : bi bi-code-slash"
                >

                <span class="form-help">

                    Entrez la classe Bootstrap Icons.
                    Exemple : <strong>bi bi-code-slash</strong>

                </span>


                <!-- APERÇU -->

                <div class="icon-preview">

                    <div class="icon-preview-box">

                        @if($service->icone)

                            <i class="{{ $service->icone }}"></i>

                        @else

                            <i class="bi bi-tools"></i>

                        @endif

                    </div>

                    <div class="icon-preview-text">

                        Aperçu de l'icône actuelle

                    </div>

                </div>


                @error('icone')

                    <div class="form-error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <!-- =================================================
                 BOUTONS
            ================================================== -->

            <div class="form-actions">

                <a href="{{ route('admin.services.index') }}"
                   class="btn btn-secondary">

                    <i class="bi bi-arrow-left"></i>

                    Annuler

                </a>


                <button type="submit"
                        class="btn btn-primary">

                    <i class="bi bi-check-lg"></i>

                    Enregistrer les modifications

                </button>

            </div>

        </form>

    </div>

</div>
```

</div>

@endsection
