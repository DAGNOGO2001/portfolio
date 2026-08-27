<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Ajouter une expérience | Administration</title>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <style>

        /* =========================
           RESET
        ========================== */

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

            max-width: 1000px;

        }


        .form-header {

            display: flex;

            align-items: center;

            gap: 15px;

            margin-bottom: 30px;

            padding-bottom: 20px;

            border-bottom: 1px solid #edf1ee;

        }


        .form-header-icon {

            width: 52px;

            height: 52px;

            border-radius: 13px;

            background: #ecfdf3;

            color: #16a34a;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 24px;

        }


        .form-header h2 {

            font-size: 20px;

            margin-bottom: 4px;

        }


        .form-header p {

            color: #718078;

            font-size: 13px;

        }


        /* =========================
           FORM GRID
        ========================== */

        .form-grid {

            display: grid;

            grid-template-columns: repeat(2, 1fr);

            gap: 22px;

        }


        .form-group {

            display: flex;

            flex-direction: column;

        }


        .form-group.full {

            grid-column: 1 / -1;

        }


        .form-group label {

            margin-bottom: 8px;

            font-size: 14px;

            font-weight: 600;

            color: #34443a;

        }


        .required {

            color: #dc2626;

        }


        .form-group input,
        .form-group textarea {

            width: 100%;

            padding: 13px 15px;

            border: 1px solid #dce5df;

            border-radius: 10px;

            background: #fbfdfc;

            color: #17231c;

            font-family: inherit;

            font-size: 14px;

            outline: none;

            transition: .2s;

        }


        .form-group input:focus,
        .form-group textarea:focus {

            border-color: #16a34a;

            background: white;

            box-shadow:
                0 0 0 3px rgba(22, 163, 74, .08);

        }


        .form-group textarea {

            min-height: 160px;

            resize: vertical;

            line-height: 1.6;

        }


        .help-text {

            margin-top: 6px;

            color: #89958e;

            font-size: 12px;

        }


        /* =========================
           ERREURS
        ========================== */

        .error-message {

            margin-top: 6px;

            color: #dc2626;

            font-size: 12px;

        }


        .input-error {

            border-color: #dc2626 !important;

        }


        /* =========================
           ALERT
        ========================== */

        .alert {

            display: flex;

            align-items: flex-start;

            gap: 10px;

            padding: 14px 18px;

            border-radius: 12px;

            margin-bottom: 25px;

            font-size: 14px;

        }


        .alert.error {

            background: #fef2f2;

            border: 1px solid #fecaca;

            color: #b91c1c;

        }


        .alert ul {

            margin: 5px 0 0 18px;

        }


        /* =========================
           ACTIONS
        ========================== */

        .form-actions {

            display: flex;

            justify-content: flex-end;

            align-items: center;

            gap: 12px;

            margin-top: 30px;

            padding-top: 20px;

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

        }


        @media (max-width: 700px) {

            .main {

                padding: 20px 12px;

            }


            .page-title h1 {

                font-size: 24px;

            }


            .form-card {

                padding: 20px;

            }


            .form-grid {

                grid-template-columns: 1fr;

            }


            .form-group.full {

                grid-column: auto;

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

</head>


<body>


<!-- =========================
     SIDEBAR
========================== -->

<aside class="sidebar">


    <!-- LOGO -->

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


    <!-- MENU -->

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

        <a href="{{ route('admin.competences.index') }}">

            <i class="bi bi-code-slash"></i>

            <span>
                Compétences
            </span>

        </a>


        <!-- EXPERIENCES -->

        <a href="{{ route('admin.experiences.index') }}"
           class="active">

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


    <!-- COMPTE -->

    <div class="menu-title"
         style="margin-top:35px;">

        Compte

    </div>


    <nav class="menu">


        <!-- PROFIL -->

        <a href="{{ route('profile.edit') }}">

            <i class="bi bi-person"></i>

            <span>
                Mon profil
            </span>

        </a>


        <!-- PORTFOLIO -->

        <a href="{{ url('/') }}"
           target="_blank">

            <i class="bi bi-globe"></i>

            <span>
                Voir le portfolio
            </span>

        </a>


        <!-- DECONNEXION -->

        <a href="#"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

            <i class="bi bi-box-arrow-right"></i>

            <span>
                Déconnexion
            </span>

        </a>

    </nav>


    <!-- LOGOUT FORM -->

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
                Ajouter une expérience
            </h1>

            <p>
                Ajoutez une nouvelle expérience professionnelle à votre portfolio.
            </p>

        </div>


        <!-- UTILISATEUR -->

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



    <!-- =========================
         ERREURS DE VALIDATION
    ========================== -->

    @if($errors->any())

        <div class="alert error">

            <i class="bi bi-exclamation-circle-fill"></i>

            <div>

                <strong>
                    Veuillez corriger les erreurs suivantes :
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
    ========================== -->

    <div class="form-card">


        <div class="form-header">

            <div class="form-header-icon">

                <i class="bi bi-briefcase"></i>

            </div>

            <div>

                <h2>
                    Informations sur l'expérience
                </h2>

                <p>
                    Renseignez les informations professionnelles.
                </p>

            </div>

        </div>



        <form
            action="{{ route('admin.experiences.store') }}"
            method="POST">

            @csrf


            <div class="form-grid">


                <!-- POSTE -->

                <div class="form-group">

                    <label for="poste">

                        Poste

                        <span class="required">*</span>

                    </label>

                    <input
                        type="text"
                        id="poste"
                        name="poste"
                        value="{{ old('poste') }}"
                        placeholder="Ex : Développeur Web"
                        class="@error('poste') input-error @enderror"
                        required>

                    @error('poste')

                        <span class="error-message">
                            {{ $message }}
                        </span>

                    @enderror

                </div>



                <!-- ENTREPRISE -->

                <div class="form-group">

                    <label for="entreprise">

                        Entreprise

                        <span class="required">*</span>

                    </label>

                    <input
                        type="text"
                        id="entreprise"
                        name="entreprise"
                        value="{{ old('entreprise') }}"
                        placeholder="Ex : Entreprise XYZ"
                        class="@error('entreprise') input-error @enderror"
                        required>

                    @error('entreprise')

                        <span class="error-message">
                            {{ $message }}
                        </span>

                    @enderror

                </div>



                <!-- DATE DEBUT -->

                <div class="form-group">

                    <label for="date_debut">

                        Date de début

                        <span class="required">*</span>

                    </label>

                    <input
                        type="date"
                        id="date_debut"
                        name="date_debut"
                        value="{{ old('date_debut') }}"
                        class="@error('date_debut') input-error @enderror"
                        required>

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
                        value="{{ old('date_fin') }}"
                        class="@error('date_fin') input-error @enderror">

                    <span class="help-text">

                        Laissez vide si cette expérience est toujours en cours.

                    </span>

                    @error('date_fin')

                        <span class="error-message">
                            {{ $message }}
                        </span>

                    @enderror

                </div>



                <!-- LIEU -->

                <div class="form-group">

                    <label for="lieu">

                        Lieu

                    </label>

                    <input
                        type="text"
                        id="lieu"
                        name="lieu"
                        value="{{ old('lieu') }}"
                        placeholder="Ex : Abidjan, Côte d'Ivoire"
                        class="@error('lieu') input-error @enderror">

                    @error('lieu')

                        <span class="error-message">
                            {{ $message }}
                        </span>

                    @enderror

                </div>



                <!-- DESCRIPTION -->

                <div class="form-group full">

                    <label for="description">

                        Description

                        <span class="required">*</span>

                    </label>

                    <textarea
                        id="description"
                        name="description"
                        placeholder="Décrivez vos missions, responsabilités et réalisations..."
                        class="@error('description') input-error @enderror"
                        required>{{ old('description') }}</textarea>

                    <span class="help-text">

                        Décrivez brièvement les principales missions réalisées durant cette expérience.

                    </span>

                    @error('description')

                        <span class="error-message">
                            {{ $message }}
                        </span>

                    @enderror

                </div>


            </div>



            <!-- =========================
                 BOUTONS
            ========================== -->

            <div class="form-actions">


                <a
                    href="{{ route('admin.experiences.index') }}"
                    class="btn btn-secondary">

                    <i class="bi bi-arrow-left"></i>

                    Annuler

                </a>


                <button
                    type="submit"
                    class="btn btn-primary">

                    <i class="bi bi-check-lg"></i>

                    Enregistrer l'expérience

                </button>


            </div>


        </form>


    </div>


</main>


</body>

</html>