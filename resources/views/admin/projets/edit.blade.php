```blade
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Modifier le projet | Administration</title>

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
        ========================= */

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
            overflow-y: auto;
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

        /* =========================
           MAIN
        ========================= */

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

        /* =========================
           USER
        ========================= */

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

        /* =========================
           FORMULAIRE
        ========================= */

        .form-card {
            background: white;
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, .05);
        }

        .form-header {
            display: flex;
            justify-content: space-between;
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
            line-height: 1.5;
        }

        /* =========================
           IMAGE
        ========================= */

        .current-image {
            width: 220px;
            height: 145px;
            object-fit: cover;
            border-radius: 12px;
            border: 1px solid #e1e9e3;
            display: block;
        }

        .image-section {
            display: grid;
            grid-template-columns: 220px 1fr;
            gap: 25px;
            align-items: center;
        }

        .image-preview-empty {
            width: 220px;
            height: 145px;
            background: #eef3ef;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #9aa69f;
            font-size: 40px;
        }

        /* =========================
           APK
        ========================= */

        .apk-current {
            display: flex;
            align-items: center;
            gap: 15px;
            background: #ecfdf3;
            border: 1px solid #bbf7d0;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 15px;
        }

        .apk-current i {
            font-size: 35px;
            color: #16a34a;
        }

        .apk-current strong {
            display: block;
            color: #166534;
            margin-bottom: 5px;
        }

        .apk-current a {
            color: #15803d;
            font-size: 13px;
            font-weight: 600;
        }

        .apk-current a:hover {
            text-decoration: underline;
        }

        .apk-box {
            border: 2px dashed #cfe3d5;
            border-radius: 14px;
            padding: 20px;
            background: #f9fcfa;
        }

        .apk-url-box {
            margin-bottom: 18px;
        }

        .apk-separator {
            text-align: center;
            color: #8a9890;
            font-size: 12px;
            margin: 12px 0;
        }

        /* =========================
           MESSAGES ERREUR
        ========================= */

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
           SUCCÈS
        ========================= */

        .success {
            background: #ecfdf3;
            border: 1px solid #bbf7d0;
            color: #166534;
            border-radius: 12px;
            padding: 15px 18px;
            margin-bottom: 25px;
            font-size: 14px;
        }

        /* =========================
           ACTIONS
        ========================= */

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
            background: #e4ebe6;
        }

        .btn-primary {
            background: linear-gradient(135deg, #16a34a, #22c55e);
            color: white;
            box-shadow: 0 7px 18px rgba(22, 163, 74, .2);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
        }

        /* =========================
           RESPONSIVE
        ========================= */

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

            .image-section {
                grid-template-columns: 1fr;
            }

        }

        @media (max-width: 600px) {

            .main {
                padding: 20px 12px;
            }

            .topbar {
                align-items: flex-start;
            }

            .page-title h1 {
                font-size: 24px;
            }

            .form-card {
                padding: 20px;
            }

            .current-image,
            .image-preview-empty {
                width: 100%;
                max-width: 300px;
                height: 180px;
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

<!-- =========================
     SIDEBAR
========================= -->

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

            <span>Tableau de bord</span>

        </a>

        <a href="{{ route('admin.projets.index') }}"
           class="active">

            <i class="bi bi-folder"></i>

            <span>Projets</span>

        </a>

        <a href="#">

            <i class="bi bi-code-slash"></i>

            <span>Compétences</span>

        </a>

        <a href="#">

            <i class="bi bi-briefcase"></i>

            <span>Expériences</span>

        </a>

        <a href="#">

            <i class="bi bi-mortarboard"></i>

            <span>Formations</span>

        </a>

    </nav>

    <div class="menu-title" style="margin-top:35px;">
        Compte
    </div>

    <nav class="menu">

        <a href="{{ route('profile.edit') }}">

            <i class="bi bi-person"></i>

            <span>Mon profil</span>

        </a>

        <a href="{{ url('/') }}" target="_blank">

            <i class="bi bi-globe"></i>

            <span>Voir le portfolio</span>

        </a>

        <a href="#"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

            <i class="bi bi-box-arrow-right"></i>

            <span>Déconnexion</span>

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
========================= -->

<main class="main">

    <!-- TOPBAR -->

    <div class="topbar">

        <div class="page-title">

            <h1>Modifier le projet</h1>

            <p>
                Modifiez les informations de votre projet.
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


    <!-- MESSAGE SUCCÈS -->

    @if (session('success'))

        <div class="success">

            <i class="bi bi-check-circle"></i>

            {{ session('success') }}

        </div>

    @endif


    <!-- FORMULAIRE -->

    <div class="form-card">

        <div class="form-header">

            <div>

                <h2>
                    {{ $projet->titre }}
                </h2>

                <p>
                    Modifiez les informations puis enregistrez.
                </p>

            </div>

        </div>


        <form action="{{ route('admin.projets.update', $projet) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            @method('PUT')


            <div class="form-grid">


                <!-- =========================
                     TITRE
                ========================= -->

                <div class="form-group">

                    <label for="titre">
                        Titre <span>*</span>
                    </label>

                    <input
                        type="text"
                        id="titre"
                        name="titre"
                        value="{{ old('titre', $projet->titre) }}"
                        placeholder="Nom du projet"
                        required>

                </div>


                <!-- =========================
                     SLUG
                ========================= -->

                <div class="form-group">

                    <label for="slug">
                        Slug
                    </label>

                    <input
                        type="text"
                        id="slug"
                        name="slug"
                        value="{{ old('slug', $projet->slug) }}"
                        placeholder="mon-projet">

                    <span class="help">
                        Le slug sera automatiquement généré à partir du titre.
                    </span>

                </div>


                <!-- =========================
                     DESCRIPTION
                ========================= -->

                <div class="form-group full">

                    <label for="description">
                        Description <span>*</span>
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        placeholder="Décrivez votre projet..."
                        required>{{ old('description', $projet->description) }}</textarea>

                </div>


                <!-- =========================
                     TECHNOLOGIES
                ========================= -->

                <div class="form-group full">

                    <label for="technologies">
                        Technologies
                    </label>

                    <input
                        type="text"
                        id="technologies"
                        name="technologies"
                        value="{{ old('technologies', $projet->technologies) }}"
                        placeholder="Laravel, PHP, MySQL, JavaScript">

                    <span class="help">
                        Séparez les technologies par des virgules.
                    </span>

                </div>


                <!-- =========================
                     GITHUB
                ========================= -->

                <div class="form-group">

                    <label for="github_url">
                        GitHub
                    </label>

                    <input
                        type="url"
                        id="github_url"
                        name="github_url"
                        value="{{ old('github_url', $projet->github_url) }}"
                        placeholder="https://github.com/...">

                </div>


                <!-- =========================
                     DEMO
                ========================= -->

                <div class="form-group">

                    <label for="demo_url">
                        Démo
                    </label>

                    <input
                        type="url"
                        id="demo_url"
                        name="demo_url"
                        value="{{ old('demo_url', $projet->demo_url) }}"
                        placeholder="https://...">

                </div>


                <!-- =========================
                     IMAGE
                ========================= -->

                <div class="form-group full">

                    <label>
                        Image du projet
                    </label>

                    <div class="image-section">

                        <div>

                            @if($projet->image)

                                <img
                                    src="{{ asset('storage/' . $projet->image) }}"
                                    alt="{{ $projet->titre }}"
                                    class="current-image">

                            @else

                                <div class="image-preview-empty">

                                    <i class="bi bi-image"></i>

                                </div>

                            @endif

                        </div>


                        <div>

                            <input
                                type="file"
                                name="image"
                                accept="image/jpeg,image/png,image/webp">

                            <span class="help">

                                Laissez vide pour conserver l'image actuelle.

                                <br>

                                JPG, JPEG, PNG ou WEBP — maximum 2 Mo.

                            </span>

                        </div>

                    </div>

                </div>


                <!-- =========================
                     APK
                ========================= -->

                <div class="form-group full">

                    <label>
                        Application Android APK
                    </label>


                    @if($projet->apk_url)

                        <div class="apk-current">

                            <i class="bi bi-android2"></i>

                            <div>

                                <strong>
                                    APK actuellement enregistré
                                </strong>

                                @if(filter_var($projet->apk_url, FILTER_VALIDATE_URL))

                                    <a
                                        href="{{ $projet->apk_url }}"
                                        target="_blank"
                                        rel="noopener noreferrer">

                                        <i class="bi bi-link-45deg"></i>
                                        Ouvrir le lien APK

                                    </a>

                                @else

                                    <a
                                        href="{{ asset('storage/' . $projet->apk_url) }}"
                                        target="_blank"
                                        rel="noopener noreferrer">

                                        <i class="bi bi-download"></i>
                                        Voir / télécharger l'APK actuel

                                    </a>

                                @endif

                            </div>

                        </div>

                    @endif


                    <!-- LIEN APK -->

                    <div class="apk-url-box">

                        <label for="apk_url">
                            Nouveau lien APK
                        </label>

                        <input
                            type="url"
                            id="apk_url"
                            name="apk_url"
                            value="{{ old('apk_url') }}"
                            placeholder="https://exemple.com/application.apk">

                        <span class="help">

                            Laissez vide si vous souhaitez conserver l'APK actuel
                            ou utiliser un nouveau fichier APK.

                        </span>

                    </div>


                    <div class="apk-box">

                        <label for="apk_file">
                            Nouveau fichier APK
                        </label>

                        <br><br>

                        <input
                            type="file"
                            id="apk_file"
                            name="apk_file"
                            accept=".apk,application/vnd.android.package-archive">

                        <span class="help">

                            Si vous sélectionnez un fichier APK,
                            celui-ci sera prioritaire sur le lien APK.

                            <br>

                            Format APK — maximum 50 Mo.

                        </span>

                    </div>

                </div>


            </div>


            <!-- =========================
                 BOUTONS
            ========================= -->

            <div class="form-actions">

                <a
                    href="{{ route('admin.projets.index') }}"
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

</main>


</body>

</html>
```
