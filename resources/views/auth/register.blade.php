<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Créer un compte | Dagnogo Tchabouan</title>

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
            background: #07130d;
            color: #ffffff;
            min-height: 100vh;
        }


        /* =========================
           PAGE
        ========================== */

        .register-page {
            min-height: 100vh;
            display: flex;
        }


        /* =========================
           PARTIE GAUCHE
        ========================== */

        .register-presentation {
            width: 55%;
            min-height: 100vh;

            background:
                radial-gradient(
                    circle at 20% 20%,
                    rgba(34, 197, 94, 0.25),
                    transparent 35%
                ),
                linear-gradient(
                    135deg,
                    #07130d,
                    #0b2115,
                    #12351f
                );

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 70px;

            position: relative;
            overflow: hidden;
        }


        /* Cercles décoratifs */

        .register-presentation::before,
        .register-presentation::after {
            content: "";

            position: absolute;

            border-radius: 50%;

            background: rgba(74, 222, 128, 0.08);

            pointer-events: none;
        }

        .register-presentation::before {
            width: 400px;
            height: 400px;

            top: -150px;
            left: -150px;
        }

        .register-presentation::after {
            width: 500px;
            height: 500px;

            right: -250px;
            bottom: -250px;
        }


        .presentation-content {
            max-width: 600px;

            position: relative;
            z-index: 2;
        }


        /* =========================
           LOGO
        ========================== */

        .logo {
            width: 64px;
            height: 64px;

            border-radius: 17px;

            background:
                linear-gradient(
                    135deg,
                    #16a34a,
                    #4ade80
                );

            display: flex;
            align-items: center;
            justify-content: center;

            box-shadow:
                0 12px 35px rgba(22, 163, 74, 0.35);

            margin-bottom: 35px;
        }

        .logo span {
            font-size: 31px;
            font-weight: 800;
            color: white;
        }


        /* =========================
           TITRE
        ========================== */

        .presentation-content h1 {
            font-size: 50px;
            line-height: 1.1;

            margin-bottom: 25px;

            letter-spacing: -1px;
        }

        .presentation-content h1 span {
            color: #4ade80;
        }

        .presentation-content > p {
            color: #b7c8bd;

            font-size: 18px;
            line-height: 1.7;

            max-width: 500px;

            margin-bottom: 45px;
        }


        /* =========================
           FEATURES
        ========================== */

        .presentation-features {
            display: flex;
            flex-direction: column;

            gap: 22px;
        }

        .feature {
            display: flex;
            align-items: center;

            gap: 18px;
        }

        .feature-icon {
            width: 50px;
            height: 50px;

            flex-shrink: 0;

            border-radius: 14px;

            background: rgba(74, 222, 128, 0.12);

            border: 1px solid rgba(74, 222, 128, 0.12);

            display: flex;
            align-items: center;
            justify-content: center;

            color: #4ade80;

            font-size: 21px;
        }

        .feature strong {
            display: block;

            margin-bottom: 5px;

            font-size: 15px;
        }

        .feature p {
            color: #94a99c;

            font-size: 14px;
        }


        /* =========================
           FORMULAIRE
        ========================== */

        .register-form-container {
            width: 45%;

            background:
                linear-gradient(
                    135deg,
                    #f5f8f6,
                    #eef5f0
                );

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 40px;
        }


        /* =========================
           CARD
        ========================== */

        .register-card {
            width: 100%;
            max-width: 480px;

            background: #ffffff;

            padding: 40px 45px;

            border-radius: 24px;

            box-shadow:
                0 25px 70px rgba(0, 0, 0, 0.12);

            animation: slideUp 0.6s ease;
        }


        @keyframes slideUp {

            from {
                opacity: 0;
                transform: translateY(25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }

        }


        /* =========================
           HEADER
        ========================== */

        .register-header {
            margin-bottom: 28px;
        }

        .register-header h2 {
            color: #122018;

            font-size: 31px;

            margin-bottom: 8px;
        }

        .register-header p {
            color: #718078;

            font-size: 15px;
        }


        /* =========================
           FORM GROUP
        ========================== */

        .form-group {
            margin-bottom: 19px;
        }

        .form-group label {
            display: block;

            color: #25332b;

            font-size: 14px;

            font-weight: 600;

            margin-bottom: 8px;
        }


        /* =========================
           INPUT
        ========================== */

        .input-container {
            position: relative;
        }

        .input-container > i:first-child {
            position: absolute;

            left: 16px;
            top: 50%;

            transform: translateY(-50%);

            color: #7c8c83;

            font-size: 18px;

            pointer-events: none;
        }

        .input-container input {
            width: 100%;

            height: 50px;

            border: 1px solid #dbe5de;

            border-radius: 12px;

            padding: 0 48px;

            font-size: 15px;

            outline: none;

            background: #fafcfb;

            transition: all 0.25s ease;
        }

        .input-container input:hover {
            border-color: #b8cabe;
        }

        .input-container input:focus {
            border-color: #22c55e;

            background: #ffffff;

            box-shadow:
                0 0 0 4px rgba(34, 197, 94, 0.10);
        }

        .input-container input::placeholder {
            color: #a4afa8;
        }


        /* =========================
           PASSWORD TOGGLE
        ========================== */

        .password-toggle {
            position: absolute;

            right: 12px;
            top: 50%;

            transform: translateY(-50%);

            width: 35px;
            height: 35px;

            border: none;

            border-radius: 8px;

            background: transparent;

            color: #7c8c83;

            cursor: pointer;

            font-size: 18px;

            display: flex;
            align-items: center;
            justify-content: center;

            transition: 0.2s;
        }

        .password-toggle:hover {
            background: #eef8f1;

            color: #16a34a;
        }


        /* =========================
           ERREURS
        ========================== */

        .error-message {
            display: flex;

            align-items: center;

            gap: 6px;

            color: #dc2626;

            font-size: 13px;

            margin-top: 7px;
        }


        /* =========================
           BOUTON
        ========================== */

        .register-button {
            width: 100%;

            height: 53px;

            border: none;

            border-radius: 12px;

            background:
                linear-gradient(
                    135deg,
                    #16a34a,
                    #22c55e
                );

            color: white;

            font-size: 15px;

            font-weight: 700;

            cursor: pointer;

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 12px;

            box-shadow:
                0 10px 25px rgba(22, 163, 74, 0.25);

            transition: all 0.25s ease;
        }

        .register-button:hover {
            transform: translateY(-2px);

            box-shadow:
                0 15px 30px rgba(22, 163, 74, 0.35);
        }

        .register-button:active {
            transform: translateY(0);
        }


        /* =========================
           LOADING
        ========================== */

        .register-button.loading {
            opacity: 0.85;

            pointer-events: none;
        }

        .register-button.loading i {
            animation: rotate 0.8s linear infinite;
        }

        @keyframes rotate {

            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }

        }


        /* =========================
           CONNEXION
        ========================== */

        .login-link {
            text-align: center;

            margin-top: 22px;

            color: #7a8780;

            font-size: 14px;
        }

        .login-link a {
            color: #16a34a;

            font-weight: 700;

            text-decoration: none;

            margin-left: 4px;
        }

        .login-link a:hover {
            text-decoration: underline;
        }


        /* =========================
           RETOUR
        ========================== */

        .back-home {
            text-align: center;

            margin-top: 25px;

            padding-top: 22px;

            border-top: 1px solid #edf1ee;
        }

        .back-home a {
            color: #718078;

            text-decoration: none;

            font-size: 14px;

            transition: 0.2s;

            display: inline-flex;

            align-items: center;

            gap: 7px;
        }

        .back-home a:hover {
            color: #16a34a;
        }


        /* =========================
           MOBILE LOGO
        ========================== */

        .mobile-logo {
            display: none;
        }


        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 1000px) {

            .register-presentation {
                width: 50%;

                padding: 40px;
            }

            .register-form-container {
                width: 50%;

                padding: 25px;
            }

            .presentation-content h1 {
                font-size: 40px;
            }

            .register-card {
                padding: 35px;
            }

        }


        @media (max-width: 800px) {

            .register-presentation {
                display: none;
            }

            .register-form-container {
                width: 100%;

                min-height: 100vh;

                padding: 20px;
            }

            .mobile-logo {
                display: flex;

                justify-content: center;
            }

            .mobile-logo .logo {
                margin-bottom: 20px;
            }

            .register-card {
                max-width: 500px;

                padding: 35px 30px;
            }

        }


        @media (max-width: 480px) {

            .register-form-container {
                padding: 12px;
            }

            .register-card {
                padding: 30px 20px;

                border-radius: 18px;
            }

            .register-header h2 {
                font-size: 27px;
            }

        }

    </style>

</head>


<body>


<div class="register-page">


    <!-- =====================================================
         PARTIE GAUCHE
    ====================================================== -->

    <div class="register-presentation">

        <div class="presentation-content">


            <!-- LOGO -->

            <div class="logo">
                <span>D</span>
            </div>


            <!-- TITRE -->

            <h1>

                Créez votre

                <span>
                    espace
                </span>

            </h1>


            <p>

                Créez votre compte administrateur
                pour accéder à la gestion de votre
                portfolio.

            </p>


            <!-- FONCTIONNALITÉS -->

            <div class="presentation-features">


                <div class="feature">

                    <div class="feature-icon">
                        <i class="bi bi-folder-plus"></i>
                    </div>

                    <div>

                        <strong>
                            Gérez vos projets
                        </strong>

                        <p>
                            Ajoutez et présentez vos réalisations.
                        </p>

                    </div>

                </div>


                <div class="feature">

                    <div class="feature-icon">
                        <i class="bi bi-code-square"></i>
                    </div>

                    <div>

                        <strong>
                            Organisez vos compétences
                        </strong>

                        <p>
                            Présentez vos technologies et savoir-faire.
                        </p>

                    </div>

                </div>


                <div class="feature">

                    <div class="feature-icon">
                        <i class="bi bi-briefcase"></i>
                    </div>

                    <div>

                        <strong>
                            Gérez votre parcours
                        </strong>

                        <p>
                            Ajoutez vos expériences et formations.
                        </p>

                    </div>

                </div>


                <div class="feature">

                    <div class="feature-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>

                    <div>

                        <strong>
                            Espace sécurisé
                        </strong>

                        <p>
                            Vos données sont protégées par Laravel.
                        </p>

                    </div>

                </div>


            </div>

        </div>

    </div>



    <!-- =====================================================
         FORMULAIRE
    ====================================================== -->

    <div class="register-form-container">


        <div class="register-card">


            <!-- LOGO MOBILE -->

            <div class="mobile-logo">

                <div class="logo">
                    <span>D</span>
                </div>

            </div>



            <!-- HEADER -->

            <div class="register-header">

                <h2>
                    Créer un compte
                </h2>

                <p>
                    Créez votre compte administrateur
                </p>

            </div>



            <!-- FORMULAIRE -->

            <form
                method="POST"
                action="{{ route('register') }}">

                @csrf



                <!-- NOM -->

                <div class="form-group">

                    <label for="name">
                        Nom complet
                    </label>


                    <div class="input-container">

                        <i class="bi bi-person"></i>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Dagnogo Tchabouan"
                            required
                            autofocus
                            autocomplete="name">

                    </div>


                    @error('name')

                        <span class="error-message">

                            <i class="bi bi-exclamation-circle"></i>

                            {{ $message }}

                        </span>

                    @enderror

                </div>



                <!-- EMAIL -->

                <div class="form-group">

                    <label for="email">
                        Adresse email
                    </label>


                    <div class="input-container">

                        <i class="bi bi-envelope"></i>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="exemple@email.com"
                            required
                            autocomplete="username">

                    </div>


                    @error('email')

                        <span class="error-message">

                            <i class="bi bi-exclamation-circle"></i>

                            {{ $message }}

                        </span>

                    @enderror

                </div>



                <!-- MOT DE PASSE -->

                <div class="form-group">

                    <label for="password">
                        Mot de passe
                    </label>


                    <div class="input-container">

                        <i class="bi bi-lock"></i>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="Votre mot de passe"
                            required
                            autocomplete="new-password">


                        <button
                            type="button"
                            class="password-toggle"
                            id="togglePassword"
                            aria-label="Afficher le mot de passe">

                            <i
                                class="bi bi-eye"
                                id="passwordIcon">
                            </i>

                        </button>

                    </div>


                    @error('password')

                        <span class="error-message">

                            <i class="bi bi-exclamation-circle"></i>

                            {{ $message }}

                        </span>

                    @enderror

                </div>



                <!-- CONFIRMATION -->

                <div class="form-group">

                    <label for="password_confirmation">
                        Confirmer le mot de passe
                    </label>


                    <div class="input-container">

                        <i class="bi bi-shield-lock"></i>

                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            placeholder="Confirmez votre mot de passe"
                            required
                            autocomplete="new-password">


                        <button
                            type="button"
                            class="password-toggle"
                            id="togglePasswordConfirmation"
                            aria-label="Afficher la confirmation">

                            <i
                                class="bi bi-eye"
                                id="confirmationIcon">
                            </i>

                        </button>

                    </div>


                    @error('password_confirmation')

                        <span class="error-message">

                            <i class="bi bi-exclamation-circle"></i>

                            {{ $message }}

                        </span>

                    @enderror

                </div>



                <!-- BOUTON -->

                <button
                    type="submit"
                    class="register-button"
                    id="registerButton">

                    <span>
                        Créer mon compte
                    </span>

                    <i class="bi bi-arrow-right"></i>

                </button>



                <!-- CONNEXION -->

                <div class="login-link">

                    <span>
                        Vous avez déjà un compte ?
                    </span>

                    <a href="{{ route('login') }}">
                        Se connecter
                    </a>

                </div>


            </form>



            <!-- RETOUR -->

            <div class="back-home">

                <a href="{{ url('/') }}">

                    <i class="bi bi-arrow-left"></i>

                    Retour au portfolio

                </a>

            </div>


        </div>

    </div>


</div>



<!-- =====================================================
     JAVASCRIPT
====================================================== -->

<script>

document.addEventListener("DOMContentLoaded", function () {


    /* ==========================================
       MOT DE PASSE
    ========================================== */

    function togglePasswordVisibility(
        inputId,
        buttonId,
        iconId
    ) {

        const input =
            document.getElementById(inputId);

        const button =
            document.getElementById(buttonId);

        const icon =
            document.getElementById(iconId);


        if (!input || !button || !icon) {
            return;
        }


        button.addEventListener(
            "click",
            function () {

                if (input.type === "password") {

                    input.type = "text";

                    icon.classList.remove(
                        "bi-eye"
                    );

                    icon.classList.add(
                        "bi-eye-slash"
                    );

                    button.setAttribute(
                        "aria-label",
                        "Masquer le mot de passe"
                    );

                } else {

                    input.type = "password";

                    icon.classList.remove(
                        "bi-eye-slash"
                    );

                    icon.classList.add(
                        "bi-eye"
                    );

                    button.setAttribute(
                        "aria-label",
                        "Afficher le mot de passe"
                    );

                }

            }
        );

    }


    togglePasswordVisibility(
        "password",
        "togglePassword",
        "passwordIcon"
    );


    togglePasswordVisibility(
        "password_confirmation",
        "togglePasswordConfirmation",
        "confirmationIcon"
    );



    /* ==========================================
       ANIMATION DU BOUTON
    ========================================== */

    const form =
        document.querySelector("form");

    const button =
        document.getElementById("registerButton");


    if (form && button) {

        form.addEventListener(
            "submit",
            function () {

                button.classList.add("loading");

                button.querySelector("span").textContent =
                    "Création du compte...";

                button.querySelector("i").className =
                    "bi bi-arrow-repeat";

            }
        );

    }



    /* ==========================================
       ANIMATION DES INPUTS
    ========================================== */

    const inputs =
        document.querySelectorAll(
            ".input-container input"
        );


    inputs.forEach(function (input) {

        input.addEventListener(
            "focus",
            function () {

                this.parentElement.classList.add(
                    "focused"
                );

            }
        );


        input.addEventListener(
            "blur",
            function () {

                this.parentElement.classList.remove(
                    "focused"
                );

            }
        );

    });


});

</script>


</body>

</html>