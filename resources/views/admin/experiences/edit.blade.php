```blade
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Modifier une expérience | Administration</title>

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

        /* SIDEBAR */

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
            box-shadow: 0 8px 25px rgba(22, 163, 74, .3);
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

        /* MAIN */

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

        /* FORM CARD */

        .form-card {
            background: white;
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, .05);
            max-width: 900px;
        }

        .form-header {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #edf1ee;
        }

        .form-header h2 {
            font-size: 20px;
            margin-bottom: 6px;
        }

        .form-header p {
            color: #718078;
            font-size: 14px;
        }

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

        label {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
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
            background: #fff;
            outline: none;
            transition: .2s;
        }

        input:focus,
        textarea:focus {
            border-color: #16a34a;
            box-shadow: 0 0 0 3px rgba(22, 163, 74, .08);
        }

        textarea {
            min-height: 150px;
            resize: vertical;
        }

        .error {
            margin-top: 6px;
            color: #dc2626;
            font-size: 12px;
        }

        .form-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 30px;
            padding-top: 22px;
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

        .btn-primary {
            background: linear-gradient(
                135deg,
                #16a34a,
                #22c55e
            );
            color: white;
            box-shadow: 0 7px 18px rgba(22, 163, 74, .2);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(22, 163, 74, .3);
        }

        .btn-secondary {
            background: #f1f5f2;
            color: #53645a;
        }

        .btn-secondary:hover {
            background: #e5ebe7;
        }

        /* ALERT */

        .alert {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 25px;
            font-size: 14px;
        }

        .alert-danger {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
        }

        /* MOBILE */

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


<!-- SIDEBAR -->

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

        <a href="{{ route('admin.dashboard') }}">

            <i class="bi bi-grid-1x2"></i>

            <span>
                Tableau de bord
            </span>

        </a>


        <a href="{{ route('admin.projets.index') }}">

            <i class="bi bi-folder"></i>

            <span>
                Projets
            </span>

        </a>


        <a href="{{ route('admin.competences.index') }}">

            <i class="bi bi-code-slash"></i>

            <span>
                Compétences
            </span>

        </a>


        <a href="{{ route('admin.experiences.index') }}"
           class="active">

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


<!-- CONTENU -->

<main class="main">


    <!-- HEADER -->

    <div class="topbar">

        <div class="page-title">

            <h1>
                Modifier l'expérience
            </h1>

            <p>
                Modifiez les informations de cette expérience professionnelle.
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

    @if($errors->any())

        <div class="alert alert-danger">

            <i class="bi bi-exclamation-triangle-fill"></i>

            <div>

                <strong>
                    Vérifiez les informations saisies.
                </strong>

                <ul style="margin:5px 0 0 18px;">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        </div>

    @endif


    <!-- FORMULAIRE -->

    <div class="form-card">


        <div class="form-header">

            <h2>
                Informations de l'expérience
            </h2>

            <p>
                Modifiez les informations ci-dessous puis enregistrez les changements.
            </p>

        </div>


        <form
            action="{{ route('admin.experiences.update', $experience) }}"
            method="POST">

            @csrf

            @method('PUT')


            <div class="form-grid">


                <!-- POSTE -->

                <div class="form-group">

                    <label for="poste">
                        Poste <span>*</span>
                    </label>

                    <input
                        type="text"
                        id="poste"
                        name="poste"
                        value="{{ old('poste', $experience->poste) }}"
                        placeholder="Ex : Développeur Web"
                        required>

                    @error('poste')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <!-- ENTREPRISE -->

                <div class="form-group">

                    <label for="entreprise">
                        Entreprise <span>*</span>
                    </label>

                    <input
                        type="text"
                        id="entreprise"
                        name="entreprise"
                        value="{{ old('entreprise', $experience->entreprise) }}"
                        placeholder="Ex : Entreprise ABC"
                        required>

                    @error('entreprise')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <!-- DATE DEBUT -->

                <div class="form-group">

                    <label for="date_debut">
                        Date de début <span>*</span>
                    </label>

                    <input
                        type="date"
                        id="date_debut"
                        name="date_debut"
                        value="{{ old('date_debut', $experience->date_debut?->format('Y-m-d')) }}"
                        required>

                    @error('date_debut')

                        <div class="error">
                            {{ $message }}
                        </div>

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
                        value="{{ old('date_fin', $experience->date_fin?->format('Y-m-d')) }}">

                    @error('date_fin')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <!-- LIEU -->

                <div class="form-group full">

                    <label for="lieu">
                        Lieu
                    </label>

                    <input
                        type="text"
                        id="lieu"
                        name="lieu"
                        value="{{ old('lieu', $experience->lieu) }}"
                        placeholder="Ex : Abidjan, Côte d'Ivoire">

                    @error('lieu')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <!-- DESCRIPTION -->

                <div class="form-group full">

                    <label for="description">
                        Description <span>*</span>
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        placeholder="Décrivez vos missions et responsabilités..."
                        required>{{ old('description', $experience->description) }}</textarea>

                    @error('description')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


            </div>


            <!-- ACTIONS -->

            <div class="form-actions">


                <a
                    href="{{ route('admin.experiences.index') }}"
                    class="btn btn-secondary">

                    <i class="bi bi-arrow-left"></i>

                    Retour

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


<script>

document.addEventListener("DOMContentLoaded", function () {

    const buttons =
        document.querySelectorAll(".btn");

    buttons.forEach(function (button) {

        button.addEventListener("click", function () {

            button.style.transform = "scale(0.96)";

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
