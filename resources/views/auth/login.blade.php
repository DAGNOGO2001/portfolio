<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Connexion | Dagnogo Tchabouan</title>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        /* =========================
           RESET
        ========================= */

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
        ========================= */

        .login-page {
            min-height: 100vh;
            display: flex;
        }


        /* =========================
           PARTIE GAUCHE
        ========================= */

        .login-presentation {
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

        .login-presentation::before,
        .login-presentation::after {
            content: "";

            position: absolute;

            border-radius: 50%;

            background: rgba(74, 222, 128, 0.08);

            pointer-events: none;
        }

        .login-presentation::before {
            width: 400px;
            height: 400px;

            top: -150px;
            left: -150px;
        }

        .login-presentation::after {
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
        ========================= */

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
           TITRE GAUCHE
        ========================= */

        .presentation-content h1 {
            font-size: 52px;
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
        ========================= */

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
           PARTIE FORMULAIRE
        ========================= */

        .login-form-container {
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
        ========================= */

        .login-card {
            width: 100%;
            max-width: 460px;

            background: #ffffff;

            padding: 45px;

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
        ========================= */

        .login-header {
            margin-bottom: 35px;
        }

        .login-header h2 {
            color: #122018;

            font-size: 32px;

            margin-bottom: 8px;
        }

        .login-header p {
            color: #718078;

            font-size: 15px;
        }


        /* =========================
           ALERT
        ========================= */

        .alert {
            display: flex;
            align-items: center;

            gap: 8px;

            padding: 12px 15px;

            border-radius: 10px;

            margin-bottom: 20px;

            font-size: 14px;
        }

        .alert.success {
            background: #ecfdf3;

            color: #15803d;

            border: 1px solid #bbf7d0;
        }


        /* =========================
           FORM GROUP
        ========================= */

        .form-group {
            margin-bottom: 22px;
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
        ========================= */

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

            height: 52px;

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

            background: white;

            box-shadow:
                0 0 0 4px rgba(34, 197, 94, 0.10);
        }

        .input-container input::placeholder {
            color: #a4afa8;
        }


        /* =========================
           PASSWORD
        ========================= */

        .password-toggle {
            position: absolute;

            right: 15px;
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
        ========================= */

        .error-message {
            display: flex;

            align-items: center;

            gap: 6px;

            color: #dc2626;

            font-size: 13px;

            margin-top: 7px;
        }


        /* =========================
           OPTIONS
        ========================= */

        .form-options {
            display: flex;

            justify-content: space-between;

            align-items: center;

            margin: 5px 0 25px;

            font-size: 13px;
        }


        /* Remember */

        .remember {
            display: flex;

            align-items: center;

            gap: 8px;

            color: #65736b;

            cursor: pointer;
        }

        .remember input {
            display: none;
        }

        .remember span {
            width: 18px;
            height: 18px;

            border: 1px solid #cbd8cf;

            border-radius: 5px;

            position: relative;

            transition: 0.2s;
        }

        .remember input:checked + span {
            background: #16a34a;

            border-color: #16a34a;
        }

        .remember input:checked + span::after {
            content: "✓";

            position: absolute;

            color: white;

            font-size: 12px;

            left: 3px;
            top: -1px;
        }


        /* Mot de passe oublié */

        .forgot-password {
            color: #16a34a;

            text-decoration: none;

            font-weight: 600;

            transition: 0.2s;
        }

        .forgot-password:hover {
            color: #15803d;

            text-decoration: underline;
        }


        /* =========================
           BOUTON CONNEXION
        ========================= */

        .login-button {
            width: 100%;

            height: 54px;

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

        .login-button:hover {
            transform: translateY(-2px);

            box-shadow:
                0 15px 30px rgba(22, 163, 74, 0.35);
        }

        .login-button:active {
            transform: translateY(0);
        }


        /* =========================
           INSCRIPTION
        ========================= */

        .register-link {
            text-align: center;

            margin-top: 25px;

            color: #7a8780;

            font-size: 14px;
        }

        .register-link a {
            color: #16a34a;

            font-weight: 700;

            text-decoration: none;

            margin-left: 4px;
        }

        .register-link a:hover {
            text-decoration: underline;
        }


        /* =========================
           RETOUR PORTFOLIO
        ========================= */

        .back-home {
            text-align: center;

            margin-top: 30px;

            padding-top: 25px;

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
           LOGO MOBILE
        ========================= */

        .mobile-logo {
            display: none;
        }


        /* =========================
           LOADING
        ========================= */

        .login-button.loading {
            opacity: 0.85;

            pointer-events: none;
        }

        .login-button.loading i {
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
           RESPONSIVE TABLETTE
        ========================= */

        @media (max-width: 1000px) {

            .login-presentation {
                width: 50%;

                padding: 40px;
            }

            .login-form-container {
                width: 50%;

                padding: 25px;
            }

            .presentation-content h1 {
                font-size: 42px;
            }

            .login-card {
                padding: 35px;
            }

        }


        /* =========================
           RESPONSIVE MOBILE
        ========================= */

        @media (max-width: 800px) {

            .login-presentation {
                display: none;
            }

            .login-form-container {
                width: 100%;

                min-height: 100vh;

                padding: 20px;
            }

            .mobile-logo {
                display: flex;

                justify-content: center;
            }

            .mobile-logo .logo {
                margin-bottom: 25px;
            }

            .login-card {
                max-width: 500px;

                padding: 35px 30px;
            }

        }


        @media (max-width: 480px) {

            .login-form-container {
                padding: 12px;
            }

            .login-card {
                padding: 30px 20px;

                border-radius: 18px;
            }

            .login-header h2 {
                font-size: 27px;
            }

            .form-options {
                flex-direction: column;

                align-items: flex-start;

                gap: 12px;
            }

            .input-container input {
                height: 50px;
            }

            .login-button {
                height: 52px;
            }

        }

    </style>

</head>


<body>


<div class="login-page">


    <!-- =====================================================
         PARTIE GAUCHE
    ====================================================== -->

    <div class="login-presentation">

        <div class="presentation-content">


            <!-- LOGO -->

            <div class="logo">
                <span>D</span>
            </div>


            <!-- TITRE -->

            <h1>

                Bienvenue sur

                <span>
                    mon espace
                </span>

            </h1>


            <p>

                Connectez-vous à votre espace administrateur
                pour gérer facilement votre portfolio.

            </p>


            <!-- FONCTIONNALITÉS -->

            <div class="presentation-features">


                <div class="feature">

                    <div class="feature-icon">
                        <i class="bi bi-folder-check"></i>
                    </div>

                    <div>

                        <strong>
                            Gérer vos projets
                        </strong>

                        <p>
                            Ajoutez et modifiez vos réalisations.
                        </p>

                    </div>

                </div>


                <div class="feature">

                    <div class="feature-icon">
                        <i class="bi bi-code-slash"></i>
                    </div>

                    <div>

                        <strong>
                            Gérer vos compétences
                        </strong>

                        <p>
                            Présentez vos technologies et savoir-faire.
                        </p>

                    </div>

                </div>


                <div class="feature">

                    <div class="feature-icon">
                        <i class="bi bi-person-workspace"></i>
                    </div>

                    <div>

                        <strong>
                            Gérer votre parcours
                        </strong>

                        <p>
                            Ajoutez vos formations et expériences.
                        </p>

                    </div>

                </div>


                <div class="feature">

                    <div class="feature-icon">
                        <i class="bi bi-envelope-check"></i>
                    </div>

                    <div>

                        <strong>
                            Gérer vos messages
                        </strong>

                        <p>
                            Consultez les messages reçus depuis votre portfolio.
                        </p>

                    </div>

                </div>


            </div>

        </div>

    </div>



    <!-- =====================================================
         FORMULAIRE
    ====================================================== -->

    <div class="login-form-container">


        <div class="login-card">


            <!-- LOGO MOBILE -->

            <div class="mobile-logo">

                <div class="logo">
                    <span>D</span>
                </div>

            </div>



            <!-- HEADER -->

            <div class="login-header">

                <h2>
                    Connexion
                </h2>

                <p>
                    Accédez à votre espace administrateur
                </p>

            </div>



            <!-- MESSAGE SESSION -->

            @if (session('status'))

                <div class="alert success">

                    <i class="bi bi-check-circle"></i>

                    {{ session('status') }}

                </div>

            @endif



            <!-- FORMULAIRE -->

            <form method="POST"
                  action="{{ route('login') }}">

                @csrf



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
                            autofocus
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
                            autocomplete="current-password">


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



                <!-- OPTIONS -->

                <div class="form-options">


                    <label class="remember">

                        <input
                            type="checkbox"
                            name="remember"
                            id="remember_me">

                        <span></span>

                        Se souvenir de moi

                    </label>



                    @if (Route::has('password.request'))

                        <a
                            href="{{ route('password.request') }}"
                            class="forgot-password">

                            Mot de passe oublié ?

                        </a>

                    @endif


                </div>



                <!-- BOUTON -->

                <button
                    type="submit"
                    class="login-button"
                    id="loginButton">

                    <span>
                        Se connecter
                    </span>

                    <i class="bi bi-arrow-right"></i>

                </button>



                <!-- INSCRIPTION -->

                @if (Route::has('register'))

                    <div class="register-link">

                        <span>
                            Vous n'avez pas encore de compte ?
                        </span>

                        <a href="{{ route('register') }}">
                            Créer un compte
                        </a>

                    </div>

                @endif


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
       AFFICHER / MASQUER LE MOT DE PASSE
    ========================================== */

    const password =
        document.getElementById("password");

    const togglePassword =
        document.getElementById("togglePassword");

    const passwordIcon =
        document.getElementById("passwordIcon");


    if (togglePassword && password) {

        togglePassword.addEventListener(
            "click",
            function () {

                if (password.type === "password") {

                    password.type = "text";

                    passwordIcon.classList.remove(
                        "bi-eye"
                    );

                    passwordIcon.classList.add(
                        "bi-eye-slash"
                    );

                    togglePassword.setAttribute(
                        "aria-label",
                        "Masquer le mot de passe"
                    );

                } else {

                    password.type = "password";

                    passwordIcon.classList.remove(
                        "bi-eye-slash"
                    );

                    passwordIcon.classList.add(
                        "bi-eye"
                    );

                    togglePassword.setAttribute(
                        "aria-label",
                        "Afficher le mot de passe"
                    );

                }

            }
        );

    }



    /* ==========================================
       ANIMATION DU BOUTON
    ========================================== */

    const form =
        document.querySelector("form");

    const button =
        document.getElementById("loginButton");


    if (form && button) {

        form.addEventListener(
            "submit",
            function () {

                button.classList.add("loading");

                button.querySelector("span").textContent =
                    "Connexion...";

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