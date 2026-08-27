```blade
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ajouter un projet | Administration</title>

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

        /* ================================
           SIDEBAR
        ================================= */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: linear-gradient(160deg, #07130d, #0b2115, #12351f);
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
            background: linear-gradient(135deg, #16a34a, #4ade80);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: 800;
        }

        .logo-text strong {
            display: block;
            font-size: 16px;
        }

        .logo-text span {
            color: #8da497;
            font-size: 12px;
        }

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

        /* ================================
           MAIN
        ================================= */

        .main {
            margin-left: 250px;
            min-height: 100vh;
            padding: 35px;
        }

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

        /* ================================
           USER
        ================================= */

        .user {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: linear-gradient(135deg, #16a34a, #4ade80);
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

        /* ================================
           FORM CARD
        ================================= */

        .form-card {
            background: white;
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, .05);
        }

        .form-header {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #edf1ee;
        }

        .form-header h2 {
            font-size: 20px;
        }

        .form-header p {
            color: #718078;
            font-size: 13px;
            margin-top: 5px;
        }

        /* ================================
           FORM
        ================================= */

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
        textarea {
            width: 100%;
            border: 1px solid #dce5df;
            border-radius: 10px;
            padding: 12px 14px;
            font-family: inherit;
            font-size: 14px;
            color: #17231c;
            background: #fbfdfc;
            outline: none;
        }

        input:focus,
        textarea:focus {
            border-color: #16a34a;
            background: white;
            box-shadow: 0 0 0 3px rgba(22, 163, 74, .08);
        }

        textarea {
            min-height: 150px;
            resize: vertical;
        }

        .help {
            color: #8a9890;
            font-size: 12px;
        }

        /* ================================
           FILE IMAGE
        ================================= */

        .file-box {
            border: 2px dashed #cfe3d5;
            border-radius: 14px;
            padding: 25px;
            background: #f9fcfa;
        }

        .file-icon {
            font-size: 40px;
            color: #16a34a;
            margin-bottom: 10px;
        }

        .file-box input {
            background: white;
            margin-top: 12px;
        }

        /* ================================
           APK
        ================================= */

        .apk-box {
            border: 2px dashed #cfe3d5;
            border-radius: 14px;
            padding: 25px;
            background: #f9fcfa;
        }

        .apk-icon {
            font-size: 45px;
            color: #16a34a;
            margin-bottom: 10px;
        }

        .apk-title {
            font-weight: 700;
            margin-bottom: 5px;
        }

        .apk-box input {
            background: white;
            margin-top: 12px;
        }

        .apk-divider {
            display: flex;
            align-items: center;
            gap: 15px;
            margin: 20px 0;
            color: #9aa69f;
            font-size: 12px;
        }

        .apk-divider::before,
        .apk-divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: #dce5df;
        }

        /* ================================
           ERRORS
        ================================= */

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

        /* ================================
           ACTIONS
        ================================= */

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
            background: linear-gradient(135deg, #16a34a, #22c55e);
            color: white;
            box-shadow: 0 7px 18px rgba(22, 163, 74, .2);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
        }

        /* ================================
           RESPONSIVE
        ================================= */

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

            .form-card {
                padding: 20px;
            }

            .form-actions {
                flex-direction: column-reverse;
                gap: 12px;
            }

            .form-actions .btn {
                width: 100%;
            }
        }

    </style>

</head>


<body>


<!-- ==========================================
     SIDEBAR
=========================================== -->

<aside class="sidebar">

    <div class="logo">

        <div class="logo-icon">
            D
        </div>

        <div class="logo-text">

            <strong>Dagnogo</strong>

            <span>Administration</span>

        </div>

    </div>


    <div class="menu-title">
        Menu
    </div>


    <nav class="menu">

        <a href="{{ route('admin.dashboard') }}">

            <i class="bi bi-grid-1x2"></i>

            <span>
                Tableau de bord
            </span>

        </a>


        <a href="{{ route('admin.projets.index') }}"
           class="active">

            <i class="bi bi-folder"></i>

            <span>
                Projets
            </span>

        </a>


        <a href="#">

            <i class="bi bi-code-slash"></i>

            <span>
                Compétences
            </span>

        </a>


        <a href="#">

            <i class="bi bi-briefcase"></i>

            <span>
                Expériences
            </span>

        </a>


        <a href="#">

            <i class="bi bi-mortarboard"></i>

            <span>
                Formations
            </span>

        </a>

    </nav>


    <div class="menu-title" style="margin-top:35px;">
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


<!-- ==========================================
     MAIN
=========================================== -->

<main class="main">


    <!-- TOPBAR -->

    <div class="topbar">

        <div class="page-title">

            <h1>
                Ajouter un projet
            </h1>

            <p>
                Ajoutez une nouvelle réalisation à votre portfolio.
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
                Informations du projet
            </h2>

            <p>
                Remplissez les informations de votre projet.
            </p>

        </div>


        <form action="{{ route('admin.projets.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf


            <div class="form-grid">


                <!-- TITRE -->

                <div class="form-group">

                    <label for="titre">

                        Titre

                        <span>*</span>

                    </label>


                    <input
                        type="text"
                        id="titre"
                        name="titre"
                        value="{{ old('titre') }}"
                        placeholder="Ex : Mobilité Verte"
                        required>

                </div>


                <!-- SLUG -->

                <div class="form-group">

                    <label for="slug">
                        Slug
                    </label>


                    <input
                        type="text"
                        id="slug"
                        name="slug"
                        value="{{ old('slug') }}"
                        placeholder="mobilite-verte">

                    <span class="help">

                        Le slug sera généré automatiquement à partir du titre.

                    </span>

                </div>


                <!-- DESCRIPTION -->

                <div class="form-group full">

                    <label for="description">

                        Description

                        <span>*</span>

                    </label>


                    <textarea
                        id="description"
                        name="description"
                        placeholder="Décrivez votre projet..."
                        required>{{ old('description') }}</textarea>

                </div>


                <!-- TECHNOLOGIES -->

                <div class="form-group full">

                    <label for="technologies">

                        Technologies

                    </label>


                    <input
                        type="text"
                        id="technologies"
                        name="technologies"
                        value="{{ old('technologies') }}"
                        placeholder="Laravel, PHP, MySQL, Bootstrap, JavaScript">


                    <span class="help">

                        Séparez les technologies par des virgules.

                    </span>

                </div>


                <!-- GITHUB -->

                <div class="form-group">

                    <label for="github_url">

                        GitHub

                    </label>


                    <input
                        type="url"
                        id="github_url"
                        name="github_url"
                        value="{{ old('github_url') }}"
                        placeholder="https://github.com/...">

                </div>


                <!-- DEMO -->

                <div class="form-group">

                    <label for="demo_url">

                        Démo

                    </label>


                    <input
                        type="url"
                        id="demo_url"
                        name="demo_url"
                        value="{{ old('demo_url') }}"
                        placeholder="https://...">

                </div>


                <!-- IMAGE -->

                <div class="form-group full">

                    <label for="image">

                        Image du projet

                    </label>


                    <div class="file-box">

                        <div class="file-icon">

                            <i class="bi bi-image"></i>

                        </div>


                        <strong>
                            Ajouter une image
                        </strong>


                        <p class="help">

                            Ajoutez une capture d'écran ou une image représentant votre projet.

                        </p>


                        <input
                            type="file"
                            id="image"
                            name="image"
                            accept="image/jpeg,image/png,image/webp">


                        <p class="help"
                           style="margin-top:10px;">

                            JPG, JPEG, PNG ou WEBP — maximum 2 Mo.

                        </p>

                    </div>

                </div>


                <!-- APK -->

                <div class="form-group full">

                    <label>

                        Application Android APK

                    </label>


                    <div class="apk-box">


                        <div class="apk-icon">

                            <i class="bi bi-android2"></i>

                        </div>


                        <div class="apk-title">

                            Ajouter votre application Android

                        </div>


                        <p class="help">

                            Vous pouvez envoyer directement votre fichier APK.

                        </p>


                        <!-- FICHIER APK -->

                        <input
                            type="file"
                            id="apk_file"
                            name="apk_file"
                            accept=".apk,application/vnd.android.package-archive">


                        <p class="help"
                           style="margin-top:10px;">

                            APK uniquement — maximum 50 Mo.

                        </p>


                        <!-- SEPARATEUR -->

                        <div class="apk-divider">

                            OU

                        </div>


                        <!-- LIEN APK -->

                        <label for="apk_url">

                            Lien de téléchargement APK

                        </label>


                        <input
                            type="url"
                            id="apk_url"
                            name="apk_url"
                            value="{{ old('apk_url') }}"
                            placeholder="https://exemple.com/application.apk">


                        <p class="help"
                           style="margin-top:8px;">

                            Si vous ne téléversez pas de fichier APK,
                            vous pouvez fournir un lien de téléchargement.

                        </p>


                    </div>

                </div>


            </div>


            <!-- ACTIONS -->

            <div class="form-actions">


                <a href="{{ route('admin.projets.index') }}"
                   class="btn btn-secondary">

                    <i class="bi bi-arrow-left"></i>

                    Annuler

                </a>


                <button
                    type="submit"
                    class="btn btn-primary">

                    <i class="bi bi-check-lg"></i>

                    Enregistrer le projet

                </button>


            </div>


        </form>


    </div>


</main>


<!-- ==========================================
     SCRIPT
=========================================== -->

<script>

    /*
    |--------------------------------------------------------------------------
    | Génération automatique du slug
    |--------------------------------------------------------------------------
    */

    const titre = document.getElementById('titre');
    const slug = document.getElementById('slug');

    titre.addEventListener('input', function () {

        /*
        | Ne pas modifier le slug si
        | l'utilisateur l'a déjà personnalisé.
        */

        if (slug.dataset.modified === 'true') {
            return;
        }

        let valeur = this.value
            .toLowerCase()
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '')
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/^-+|-+$/g, '');

        slug.value = valeur;

    });


    slug.addEventListener('input', function () {

        this.dataset.modified = 'true';

    });

</script>


</body>

</html>
```
