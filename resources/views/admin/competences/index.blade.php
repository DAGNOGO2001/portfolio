<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Gestion des compétences | Administration</title>

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
           ALERT
        ========================== */

        .alert {

            display: flex;

            align-items: center;

            gap: 10px;

            padding: 14px 18px;

            border-radius: 12px;

            margin-bottom: 25px;

            font-size: 14px;

        }


        .alert.success {

            background: #ecfdf3;

            border: 1px solid #bbf7d0;

            color: #15803d;

        }


        /* =========================
           ACTION BAR
        ========================== */

        .action-bar {

            background: white;

            border-radius: 18px;

            padding: 20px;

            margin-bottom: 25px;

            display: flex;

            justify-content: space-between;

            align-items: center;

            box-shadow:
                0 8px 30px rgba(0, 0, 0, .05);

        }


        .competence-count {

            color: #718078;

            font-size: 14px;

        }


        .competence-count strong {

            color: #17231c;

            font-size: 18px;

        }


        /* =========================
           BUTTONS
        ========================== */

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
           TABLE CARD
        ========================== */

        .table-card {

            background: white;

            border-radius: 18px;

            overflow: hidden;

            box-shadow:
                0 8px 30px rgba(0, 0, 0, .05);

        }


        .table-container {

            width: 100%;

            overflow-x: auto;

        }


        table {

            width: 100%;

            border-collapse: collapse;

            min-width: 800px;

        }


        thead {

            background: #f7faf8;

        }


        th {

            text-align: left;

            padding: 16px 20px;

            font-size: 12px;

            text-transform: uppercase;

            letter-spacing: .5px;

            color: #718078;

            border-bottom: 1px solid #edf1ee;

        }


        td {

            padding: 16px 20px;

            border-bottom: 1px solid #edf1ee;

            vertical-align: middle;

            font-size: 14px;

        }


        tbody tr {

            transition: .2s;

        }


        tbody tr:hover {

            background: #fbfdfc;

        }


        /* =========================
           NOM COMPETENCE
        ========================== */

        .competence-name {

            display: flex;

            align-items: center;

            gap: 12px;

            font-weight: 700;

            color: #17231c;

        }


        .competence-icon {

            width: 42px;

            height: 42px;

            border-radius: 10px;

            background: #ecfdf3;

            color: #16a34a;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 20px;

        }


        /* =========================
           CATEGORIE
        ========================== */

        .category {

            display: inline-flex;

            align-items: center;

            padding: 6px 10px;

            border-radius: 7px;

            background: #f1f5f2;

            color: #53645a;

            font-size: 12px;

            font-weight: 600;

        }


        /* =========================
           NIVEAU
        ========================== */

        .level-container {

            min-width: 150px;

        }


        .level-text {

            display: flex;

            justify-content: space-between;

            margin-bottom: 6px;

            font-size: 12px;

            color: #718078;

        }


        .level-text strong {

            color: #15803d;

        }


        .progress {

            width: 100%;

            height: 7px;

            background: #e8eee9;

            border-radius: 20px;

            overflow: hidden;

        }


        .progress-bar {

            height: 100%;

            background: linear-gradient(
                90deg,
                #16a34a,
                #4ade80
            );

            border-radius: 20px;

            transition: width .5s ease;

        }


        /* =========================
           ACTIONS
        ========================== */

        .actions {

            display: flex;

            gap: 7px;

        }


        .action-btn {

            width: 36px;

            height: 36px;

            border: none;

            border-radius: 8px;

            display: flex;

            align-items: center;

            justify-content: center;

            cursor: pointer;

            transition: .2s;

        }


        .edit {

            background: #eff6ff;

            color: #2563eb;

        }


        .edit:hover {

            background: #dbeafe;

        }


        .delete {

            background: #fef2f2;

            color: #dc2626;

        }


        .delete:hover {

            background: #fee2e2;

        }


        /* =========================
           EMPTY
        ========================== */

        .empty {

            text-align: center;

            padding: 70px 20px;

            color: #718078;

        }


        .empty > i {

            display: block;

            font-size: 50px;

            color: #b7c8bd;

            margin-bottom: 15px;

        }


        .empty h3 {

            color: #34443a;

            margin-bottom: 7px;

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


        @media (max-width: 600px) {

            .main {

                padding: 20px 12px;

            }


            .page-title h1 {

                font-size: 24px;

            }


            .action-bar {

                flex-direction: column;

                align-items: flex-start;

                gap: 15px;

            }


            .btn-primary {

                width: 100%;

                justify-content: center;

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
                Mes compétences
            </h1>

            <p>
                Gérez les compétences présentées sur votre portfolio.
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
         MESSAGE DE SUCCÈS
    ========================== -->

    @if(session('success'))

        <div class="alert success">

            <i class="bi bi-check-circle-fill"></i>

            {{ session('success') }}

        </div>

    @endif



    <!-- =========================
         BARRE D'ACTION
    ========================== -->

    <div class="action-bar">


        <div class="competence-count">

            <strong>

                {{ $competences->count() }}

            </strong>

            compétence(s) enregistrée(s)

        </div>


        <a href="{{ route('admin.competences.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-lg"></i>

            Ajouter une compétence

        </a>

    </div>



    <!-- =========================
         TABLEAU
    ========================== -->

    <div class="table-card">


        @if($competences->count())


            <div class="table-container">


                <table>


                    <thead>

                        <tr>

                            <th>
                                Compétence
                            </th>

                            <th>
                                Catégorie
                            </th>

                            <th>
                                Niveau
                            </th>

                            <th>
                                Actions
                            </th>

                        </tr>

                    </thead>



                    <tbody>


                        @foreach($competences as $competence)


                            <tr>


                                <!-- =========================
                                     COMPETENCE
                                ========================== -->

                                <td>


                                    <div class="competence-name">


                                        <div class="competence-icon">


                                            @if($competence->icone)

                                                <i class="{{ $competence->icone }}"></i>

                                            @else

                                                <i class="bi bi-code-square"></i>

                                            @endif


                                        </div>


                                        <span>

                                            {{ $competence->nom }}

                                        </span>


                                    </div>


                                </td>



                                <!-- =========================
                                     CATEGORIE
                                ========================== -->

                                <td>


                                    @if($competence->categorie)

                                        <span class="category">

                                            {{ $competence->categorie }}

                                        </span>

                                    @else

                                        <span style="color:#9aa69f;">
                                            —
                                        </span>

                                    @endif


                                </td>



                                <!-- =========================
                                     NIVEAU
                                ========================== -->

                                <td>


                                    @if($competence->niveau)

                                        @php

                                            /*
                                             * On accepte par exemple :
                                             * 80
                                             * 80%
                                             */

                                            $niveau =
                                                (int) str_replace(
                                                    '%',
                                                    '',
                                                    $competence->niveau
                                                );

                                            $niveau =
                                                max(
                                                    0,
                                                    min(
                                                        100,
                                                        $niveau
                                                    )
                                                );

                                        @endphp


                                        <div class="level-container">


                                            <div class="level-text">

                                                <span>
                                                    Niveau
                                                </span>

                                                <strong>
                                                    {{ $competence->niveau }}
                                                </strong>

                                            </div>


                                            <div class="progress">

                                                <div
                                                    class="progress-bar"
                                                    style="width: {{ $niveau }}%;">

                                                </div>

                                            </div>


                                        </div>


                                    @else

                                        <span style="color:#9aa69f;">
                                            —
                                        </span>

                                    @endif


                                </td>



                                <!-- =========================
                                     ACTIONS
                                ========================== -->

                                <td>


                                    <div class="actions">


                                        <!-- MODIFIER -->

                                        <a
                                            href="{{ route('admin.competences.edit', $competence) }}"
                                            class="action-btn edit"
                                            title="Modifier">

                                            <i class="bi bi-pencil"></i>

                                        </a>



                                        <!-- SUPPRIMER -->

                                        <form
                                            action="{{ route('admin.competences.destroy', $competence) }}"
                                            method="POST"
                                            class="delete-form">

                                            @csrf

                                            @method('DELETE')


                                            <button
                                                type="submit"
                                                class="action-btn delete"
                                                title="Supprimer">

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


            <!-- =========================
                 AUCUNE COMPETENCE
            ========================== -->

            <div class="empty">


                <i class="bi bi-code-square"></i>


                <h3>
                    Aucune compétence
                </h3>


                <p>
                    Vous n'avez pas encore ajouté de compétence.
                </p>


                <br>


                <a
                    href="{{ route('admin.competences.create') }}"
                    class="btn btn-primary">

                    <i class="bi bi-plus-lg"></i>

                    Ajouter ma première compétence

                </a>


            </div>


        @endif


    </div>


</main>



<!-- =========================
     JAVASCRIPT
========================== -->

<script>

document.addEventListener("DOMContentLoaded", function () {


    /*
    |--------------------------------------------------------------------------
    | CONFIRMATION SUPPRESSION
    |--------------------------------------------------------------------------
    */

    const deleteForms =
        document.querySelectorAll(".delete-form");


    deleteForms.forEach(function (form) {


        form.addEventListener("submit", function (event) {


            const confirmation = confirm(
                "Voulez-vous vraiment supprimer cette compétence ?"
            );


            if (!confirmation) {

                event.preventDefault();

            }


        });


    });



    /*
    |--------------------------------------------------------------------------
    | ANIMATION DES BOUTONS
    |--------------------------------------------------------------------------
    */

    const buttons =
        document.querySelectorAll(
            ".btn, .action-btn"
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


</body>

</html>