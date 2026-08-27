<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>
        {{ $title ?? 'Dagnogo Tchabouan | Développeur Web & Mobile' }}
    </title>


    <!-- =========================
         GOOGLE FONT
    ========================== -->

    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >


    <!-- =========================
         BOOTSTRAP ICONS
    ========================== -->

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >


    <!-- =========================
         CSS
    ========================== -->

    <link
        rel="stylesheet"
        href="{{ asset('css/style.css') }}"
    >

</head>


<body>


    <!-- =========================
         NAVIGATION
    ========================== -->

    <header class="header">

        <div class="container">

            <nav class="navbar">


                <!-- LOGO -->

                <a href="#accueil"
                   class="logo">

                    <span>DT</span>

                    <strong>
                        Dagnogo
                    </strong>

                </a>


                <!-- MENU -->

                <ul class="nav-menu"
                    id="nav-menu">

                    <li>

                        <a href="#accueil"
                           class="nav-link active">

                            Accueil

                        </a>

                    </li>


                    <li>

                        <a href="#apropos"
                           class="nav-link">

                            À propos

                        </a>

                    </li>


                    <li>

                        <a href="#competences"
                           class="nav-link">

                            Compétences

                        </a>

                    </li>


                    <li>

                        <a href="#projets"
                           class="nav-link">

                            Projets

                        </a>

                    </li>


                    <li>

                        <a href="#experiences"
                           class="nav-link">

                            Expériences

                        </a>

                    </li>


                    <li>

                        <a href="#formation"
                           class="nav-link">

                            Formation

                        </a>

                    </li>


                    <li>

                        <a href="#services"
                           class="nav-link">

                            Services

                        </a>

                    </li>


                    <li>

                        <a href="#contact"
                           class="nav-link">

                            Contact

                        </a>

                    </li>

                </ul>


                <!-- =========================
                     MENU MOBILE
                ========================== -->

                <button
                    type="button"
                    class="menu-toggle"
                    id="menu-toggle"
                    aria-label="Ouvrir le menu">

                    <i class="bi bi-list"></i>

                </button>

            </nav>

        </div>

    </header>


    <!-- =========================
         CONTENU DE LA PAGE
    ========================== -->

    <main>

        {{ $slot }}

    </main>


    <!-- =========================
         FOOTER
    ========================== -->

    <footer class="footer">

        <div class="container footer-container">

            <p>

                © {{ date('Y') }}

                <strong>
                    Dagnogo Tchabouan
                </strong>.

                Tous droits réservés.

            </p>


            <div class="footer-links">

                <a href="#accueil">
                    Accueil
                </a>

                <a href="#projets">
                    Projets
                </a>

                <a href="#contact">
                    Contact
                </a>

            </div>

        </div>

    </footer>


    <!-- =========================
         BOUTON RETOUR EN HAUT
    ========================== -->

    <button
        type="button"
        class="back-to-top"
        id="back-to-top"
        aria-label="Retour en haut">

        <i class="bi bi-arrow-up"></i>

    </button>


    <!-- =========================
         JAVASCRIPT
    ========================== -->

    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>