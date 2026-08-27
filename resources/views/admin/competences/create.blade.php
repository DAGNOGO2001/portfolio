```blade
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Ajouter une compétence | Administration</title>

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f4f8f5;
            color: #17231c;
        }

        a {
            text-decoration: none;
        }


        /* =========================
           SIDEBAR
        ========================== */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;

            width: 250px;
            height: 100vh;

            background: linear-gradient(
                160deg,
                #07130d,
                #0b2115,
                #12351f
            );

            padding: 25px 18px;

            color: white;

            z-index: 1000;
        }


        .logo {
            display: flex;
            align-items: center;
            gap: 12px;

            padding: 10px;
            margin-bottom: 40px;
        }


        .logo-icon {
            width: 48px;
            height: 48px;

            border-radius: 14px;

            background: linear-gradient(
                135deg,
                #16a34a,
                #4ade80
            );

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 24px;
            font-weight: 800;

            box-shadow:
                0 8px 25px rgba(22, 163, 74, .3);
        }


        .logo-text strong {
            display: block;
            font-size: 16px;
        }


        .logo-text span {
            color: #8da497;
            font-size: 12px;
        }


        /* =========================
           MENU
        ========================== */

        .menu-title {
            color: #718078;

            font-size: 11px;
            font-weight: 700;

            text-transform: uppercase;

            padding: 0 12px;
            margin-bottom: 10px;
        }


        .menu {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }


        .menu a {
            display: flex;
            align-items: center;

            gap: 13px;

            padding: 13px 14px;

            border-radius: 11px;

            color: #b8c8be;

            font-size: 14px;

            transition: .25s;
        }


        .menu a i {
            font-size: 18px;
        }


        .menu a:hover,
        .menu a.active {
            background: rgba(74, 222, 128, .12);
            color: #4ade80;
        }


        /* =========================
           MAIN
        ========================== */

        .main {
            margin-left: 250px;

            min-height: 100vh;

            padding: 35px;
        }


        /* =========================
           HEADER
        ========================== */

        .topbar {
            display: flex;

            align-items: center;
            justify-content: space-between;

            margin-bottom: 30px;
        }


        .page-title h1 {
            font-size: 30px;
            margin-bottom: 5px;
        }


        .page-title p {
            color: #718078;
            font-size: 14px;
        }


        .user {
            display: flex;
            align-items: center;

            gap: 12px;
        }


        .user-avatar {
            width: 42px;
            height: 42px;

            border-radius: 50%;

            background: linear-gradient(
                135deg,
                #16a34a,
                #4ade80
            );

            display: flex;
            align-items: center;
            justify-content: center;

            color: white;

            font-weight: 700;
        }


        .user-info strong {
            display: block;
            font-size: 14px;
        }


        .user-info span {
            color: #7b8981;
            font-size: 12px;
        }


        /* =========================
           FORM CARD
        ========================== */

        .form-card {
            background: white;

            border-radius: 18px;

            padding: 30px;

            box-shadow:
                0 8px 30px rgba(0, 0, 0, .05);
        }


        .form-header {
            margin-bottom: 30px;

            padding-bottom: 20px;

            border-bottom: 1px solid #edf1ee;
        }


        .form-header h2 {
            font-size: 20px;
            color: #17231c;
        }


        .form-header p {
            color: #718078;
            font-size: 13px;
            margin-top: 5px;
        }


        /* =========================
           FORM
        ========================== */

        .form-grid {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 22px;
        }


        .form-group {
            display: flex;

            flex-direction: column;

            gap: 8px;
        }


        .form-group.full {
            grid-column: 1 / -1;
        }


        label {
            font-size: 13px;

            font-weight: 700;

            color: #34443a;
        }


        label span {
            color: #dc2626;
        }


        input,
        select {
            width: 100%;

            border: 1px solid #dce5df;

            border-radius: 10px;

            padding: 12px 14px;

            font-family: inherit;

            font-size: 14px;

            color: #17231c;

            background: #fbfdfc;

            outline: none;

            transition: .2s;
        }


        input:focus,
        select:focus {
            border-color: #16a34a;

            background: white;

            box-shadow:
                0 0 0 3px rgba(22, 163, 74, .08);
        }


        .help {
            color: #8a9890;
            font-size: 12px;
        }


        /* =========================
           ICONE
        ========================== */

        .icon-preview {
            width: 55px;
            height: 55px;

            border-radius: 12px;

            background: #ecfdf3;

            color: #16a34a;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 26px;

            margin-top: 5px;
        }


        /* =========================
           ERREURS
        ========================== */

        .errors {
            background: #fef2f2;

            border: 1px solid #fecaca;

            color: #b91c1c;

            border-radius: 12px;

            padding: 15px 18px;

            margin-bottom: 25px;

            font-size: 14px;
        }


        .errors ul {
            margin-left: 20px;
            margin-top: 8px;
        }


        /* =========================
           ACTIONS
        ========================== */

        .form-actions {
            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-top: 30px;

            padding-top: 25px;

            border-top: 1px solid #edf1ee;
        }


        .btn {
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
        }


        .btn-secondary {
            background: #f1f5f2;

            color: #53645a;
        }


        .btn-secondary:hover {
            background: #e5ebe7;
        }


        .btn-primary {
            background: linear-gradient(
                135deg,
                #16a34a,
                #22c55e
            );

            color: white;

            box-shadow:
                0 7px 18px rgba(22, 163, 74, .2);
        }


        .btn-primary:hover {
            transform: translateY(-2px);

            box-shadow:
                0 12px 25px rgba(22, 163, 74, .3);
        }


        /* =========================
           MOBILE
        ========================== */

        @media (max-width: 900px) {

            .sidebar {
                width: 70px;

                padding: 20px 10px;
            }


            .logo-text,
            .menu-title,
            .menu a span {
                display: none;
            }


            .logo {
                justify-content: center;
            }


            .menu a {
                justify-content: center;
            }


            .main {
                margin-left: 70px;

                padding: 25px 18px;
            }


            .user-info {
                display: none;
            }


            .form-grid {
                grid-template-columns: 1fr;
            }


            .form-group.full {
                grid-column: auto;
            }
        }


        @media (max-width: 600px) {

            .main {
                padding: 20px 12px;
            }


            .page-title h1 {
                font-size: 24px;
            }


            .form-card {
                padding: 20px;
            }


            .form-actions {
                flex-direction: column-reverse;

                gap: 12px;

                align-items: stretch;
            }


            .form-actions .btn {
                width: 100%;
            }
        }

    </style>

</head>


<body>


<!-- =========================
     SIDEBAR
========================== -->

<aside class="sidebar">


    <div class="logo">

        <div class="logo-icon">
            D
        </div>


        <div class="logo-text">

            <strong>
                Dagnogo
            </strong>

            <span>
                Administration
            </span>

        </div>

    </div>


    <div class="menu-title">
        Menu
    </div>


    <nav class="menu">


        <!-- DASHBOARD -->

        <a href="{{ route('admin.dashboard') }}">

            <i class="bi bi-grid-1x2"></i>

            <span>
                Tableau de bord
            </span>

        </a>


        <!-- PROJETS -->

        <a href="{{ route('admin.projets.index') }}">

            <i class="bi bi-folder"></i>

            <span>
                Projets
            </span>

        </a>


        <!-- COMPETENCES -->

        <a href="{{ route('admin.competences.index') }}"
           class="active">

            <i class="bi bi-code-slash"></i>

            <span>
                Compétences
            </span>

        </a>


        <!-- EXPERIENCES -->

        <a href="#">

            <i class="bi bi-briefcase"></i>

            <span>
                Expériences
            </span>

        </a>


        <!-- FORMATIONS -->

        <a href="#">

            <i class="bi bi-mortarboard"></i>

            <span>
                Formations
            </span>

        </a>

    </nav>


    <div class="menu-title"
         style="margin-top:35px;">

        Compte

    </div>


    <nav class="menu">


        <a href="{{ route('profile.edit') }}">

            <i class="bi bi-person"></i>

            <span>
                Mon profil
            </span>

        </a>


        <a href="{{ url('/') }}"
           target="_blank">

            <i class="bi bi-globe"></i>

            <span>
                Voir le portfolio
            </span>

        </a>


        <a href="#"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

            <i class="bi bi-box-arrow-right"></i>

            <span>
                Déconnexion
            </span>

        </a>

    </nav>


    <form id="logout-form"
          action="{{ route('logout') }}"
          method="POST"
          style="display:none;">

        @csrf

    </form>

</aside>



<!-- =========================
     CONTENU PRINCIPAL
========================== -->

<main class="main">


    <!-- HEADER -->

    <div class="topbar">


        <div class="page-title">

            <h1>
                Ajouter une compétence
            </h1>

            <p>
                Ajoutez une nouvelle compétence à votre portfolio.
            </p>

        </div>


        <div class="user">


            <div class="user-avatar">

                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

            </div>


            <div class="user-info">

                <strong>
                    {{ auth()->user()->name }}
                </strong>

                <span>
                    Administrateur
                </span>

            </div>

        </div>

    </div>



    <!-- ERREURS -->

    @if ($errors->any())

        <div class="errors">

            <strong>
                Des erreurs sont survenues :
            </strong>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif



    <!-- FORMULAIRE -->

    <div class="form-card">


        <div class="form-header">

            <h2>
                Nouvelle compétence
            </h2>

            <p>
                Remplissez les informations ci-dessous.
            </p>

        </div>



        <form
            action="{{ route('admin.competences.store') }}"
            method="POST">

            @csrf


            <div class="form-grid">


                <!-- NOM -->

                <div class="form-group">

                    <label for="nom">

                        Nom de la compétence

                        <span>*</span>

                    </label>


                    <input
                        type="text"
                        id="nom"
                        name="nom"
                        value="{{ old('nom') }}"
                        placeholder="Ex : Laravel"
                        required>


                </div>



                <!-- CATEGORIE -->

                <div class="form-group">

                    <label for="categorie">
                        Catégorie
                    </label>


                    <input
                        type="text"
                        id="categorie"
                        name="categorie"
                        value="{{ old('categorie') }}"
                        placeholder="Ex : Backend">


                    <span class="help">
                        Exemple : Frontend, Backend, Mobile, Base de données...
                    </span>

                </div>



                <!-- NIVEAU -->

                <div class="form-group">

                    <label for="niveau">
                        Niveau
                    </label>


                    <select
                        id="niveau"
                        name="niveau">

                        <option value="">
                            Sélectionner un niveau
                        </option>

                        <option value="Débutant"
                            {{ old('niveau') == 'Débutant' ? 'selected' : '' }}>
                            Débutant
                        </option>

                        <option value="Intermédiaire"
                            {{ old('niveau') == 'Intermédiaire' ? 'selected' : '' }}>
                            Intermédiaire
                        </option>

                        <option value="Avancé"
                            {{ old('niveau') == 'Avancé' ? 'selected' : '' }}>
                            Avancé
                        </option>

                        <option value="Expert"
                            {{ old('niveau') == 'Expert' ? 'selected' : '' }}>
                            Expert
                        </option>

                    </select>

                </div>



                <!-- ICONE -->

                <div class="form-group">

                    <label for="icone">
                        Icône
                    </label>


                    <input
                        type="text"
                        id="icone"
                        name="icone"
                        value="{{ old('icone') }}"
                        placeholder="Ex : bi bi-code-slash">


                    <span class="help">
                        Utilisez une classe Bootstrap Icons.
                    </span>


                    <div class="icon-preview"
                         id="iconPreview">

                        <i class="bi bi-code-slash"></i>

                    </div>

                </div>


            </div>



            <!-- ACTIONS -->

            <div class="form-actions">


                <a
                    href="{{ route('admin.competences.index') }}"
                    class="btn btn-secondary">

                    <i class="bi bi-arrow-left"></i>

                    Annuler

                </a>


                <button
                    type="submit"
                    class="btn btn-primary">

                    <i class="bi bi-check-lg"></i>

                    Enregistrer la compétence

                </button>


            </div>


        </form>

    </div>

</main>



<!-- =========================
     JAVASCRIPT
========================== -->

<script>

document.addEventListener("DOMContentLoaded", function () {


    /*
    |----------------------------------------------------------------------
    | Aperçu dynamique de l'icône
    |----------------------------------------------------------------------
    */

    const iconInput =
        document.getElementById("icone");


    const iconPreview =
        document.getElementById("iconPreview");


    iconInput.addEventListener("input", function () {

        let iconClass =
            iconInput.value.trim();


        if (!iconClass) {

            iconClass =
                "bi bi-code-slash";

        }


        iconPreview.innerHTML =
            '<i class="' + iconClass + '"></i>';

    });


    /*
    |----------------------------------------------------------------------
    | Animation des boutons
    |----------------------------------------------------------------------
    */

    const buttons =
        document.querySelectorAll(".btn");


    buttons.forEach(function (button) {

        button.addEventListener("click", function () {

            button.style.transform =
                "scale(0.97)";


            setTimeout(function () {

                button.style.transform = "";

            }, 100);

        });

    });

});

</script>


</body>

</html>
```
