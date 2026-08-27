<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Administration | Dagnogo Tchabouan')
    </title>

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
            background: #f5f8f6;
            color: #17221b;
        }

        a {
            text-decoration: none;
        }


        /* =========================
           LAYOUT
        ========================= */

        .admin-layout {
            min-height: 100vh;
            display: flex;
        }


        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            width: 260px;
            min-height: 100vh;

            background:
                linear-gradient(
                    160deg,
                    #07130d,
                    #0b2115,
                    #12351f
                );

            color: white;

            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;

            z-index: 1000;

            padding: 25px 18px;

            transition: 0.3s;
        }


        /* LOGO */

        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 12px;

            padding: 5px 10px 30px;
        }

        .sidebar-logo-icon {
            width: 45px;
            height: 45px;

            border-radius: 13px;

            background:
                linear-gradient(
                    135deg,
                    #16a34a,
                    #4ade80
                );

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 22px;
            font-weight: 800;

            box-shadow:
                0 8px 25px rgba(22, 163, 74, .30);
        }

        .sidebar-logo-text strong {
            display: block;
            font-size: 16px;
        }

        .sidebar-logo-text span {
            color: #8fa99a;
            font-size: 12px;
        }


        /* =========================
           MENU
        ========================= */

        .menu-title {
            color: #6f8878;

            font-size: 11px;
            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: 1px;

            padding: 10px 12px;

            margin-bottom: 7px;
        }

        .sidebar-menu {
            list-style: none;

            display: flex;
            flex-direction: column;

            gap: 5px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;

            gap: 13px;

            padding: 12px 14px;

            color: #b9c9bf;

            border-radius: 10px;

            font-size: 14px;

            transition: .25s;
        }

        .sidebar-menu a i {
            width: 20px;

            font-size: 18px;

            text-align: center;
        }

        .sidebar-menu a:hover {
            color: white;

            background: rgba(74, 222, 128, .10);

            transform: translateX(3px);
        }

        .sidebar-menu a.active {
            color: white;

            background:
                linear-gradient(
                    135deg,
                    #16a34a,
                    #22c55e
                );

            box-shadow:
                0 8px 20px rgba(22, 163, 74, .20);
        }


        /* =========================
           SIDEBAR BOTTOM
        ========================= */

        .sidebar-bottom {
            position: absolute;

            left: 18px;
            right: 18px;
            bottom: 20px;

            border-top: 1px solid rgba(255,255,255,.08);

            padding-top: 15px;
        }

        .sidebar-bottom a {
            display: flex;

            align-items: center;

            gap: 13px;

            padding: 11px 14px;

            color: #9db0a3;

            font-size: 14px;

            border-radius: 10px;
        }

        .sidebar-bottom a:hover {
            background: rgba(255,255,255,.05);

            color: white;
        }


        /* =========================
           CONTENU
        ========================= */

        .admin-main {
            margin-left: 260px;

            width: calc(100% - 260px);

            min-height: 100vh;
        }


        /* =========================
           TOPBAR
        ========================= */

        .topbar {
            height: 75px;

            background: white;

            border-bottom: 1px solid #e5ece7;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 35px;

            position: sticky;

            top: 0;

            z-index: 500;
        }

        .topbar-left h1 {
            font-size: 20px;

            color: #17221b;
        }

        .topbar-left p {
            color: #829087;

            font-size: 13px;

            margin-top: 3px;
        }


        /* =========================
           USER
        ========================= */

        .admin-user {
            display: flex;

            align-items: center;

            gap: 11px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;

            border-radius: 50%;

            background:
                linear-gradient(
                    135deg,
                    #16a34a,
                    #4ade80
                );

            color: white;

            display: flex;
            align-items: center;
            justify-content: center;

            font-weight: 700;
        }

        .user-info strong {
            display: block;

            font-size: 13px;
        }

        .user-info span {
            color: #89958e;

            font-size: 11px;
        }


        /* =========================
           PAGE CONTENT
        ========================= */

        .admin-content {
            padding: 35px;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        .menu-toggle {
            display: none;

            border: none;

            background: #16a34a;

            color: white;

            width: 40px;
            height: 40px;

            border-radius: 9px;

            font-size: 20px;

            cursor: pointer;
        }


        @media (max-width: 900px) {

            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .admin-main {
                margin-left: 0;

                width: 100%;
            }

            .menu-toggle {
                display: flex;

                align-items: center;

                justify-content: center;
            }

            .topbar {
                padding: 0 20px;
            }

            .admin-content {
                padding: 25px 20px;
            }

        }


        @media (max-width: 500px) {

            .user-info {
                display: none;
            }

            .topbar-left h1 {
                font-size: 17px;
            }

        }

    </style>

    @stack('styles')

</head>


<body>

<div class="admin-layout">


    <!-- =========================
         SIDEBAR
    ========================== -->

    <aside class="sidebar" id="sidebar">

        <div class="sidebar-logo">

            <div class="sidebar-logo-icon">
                D
            </div>

            <div class="sidebar-logo-text">

                <strong>
                    Dagnogo Tchabouan
                </strong>

                <span>
                    Administration
                </span>

            </div>

        </div>


        <div class="menu-title">
            Menu principal
        </div>


        <ul class="sidebar-menu">

            <li>
                <a href="{{ route('admin.dashboard') }}"
                   class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                    <i class="bi bi-grid-1x2-fill"></i>

                    Tableau de bord

                </a>
            </li>


            <li>
                <a href="#">

                    <i class="bi bi-folder-fill"></i>

                    Projets

                </a>
            </li>


            <li>
                <a href="#">

                    <i class="bi bi-code-slash"></i>

                    Compétences

                </a>
            </li>


            <li>
                <a href="#">

                    <i class="bi bi-briefcase-fill"></i>

                    Expériences

                </a>
            </li>


            <li>
                <a href="#">

                    <i class="bi bi-mortarboard-fill"></i>

                    Formations

                </a>
            </li>


            <li>
                <a href="#">

                    <i class="bi bi-tools"></i>

                    Services

                </a>
            </li>


            <li>
                <a href="#">

                    <i class="bi bi-envelope-fill"></i>

                    Messages

                </a>
            </li>

        </ul>


        <div class="sidebar-bottom">

            <a href="{{ url('/') }}"
               target="_blank">

                <i class="bi bi-globe2"></i>

                Voir le portfolio

            </a>


            <a href="#"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">

                <i class="bi bi-box-arrow-right"></i>

                Déconnexion

            </a>

            <form id="logout-form"
                  method="POST"
                  action="{{ route('logout') }}"
                  style="display:none;">

                @csrf

            </form>

        </div>

    </aside>



    <!-- =========================
         CONTENU PRINCIPAL
    ========================== -->

    <main class="admin-main">


        <!-- TOPBAR -->

        <header class="topbar">

            <div class="topbar-left">

                <div style="display:flex;align-items:center;gap:12px;">

                    <button
                        class="menu-toggle"
                        id="menuToggle">

                        <i class="bi bi-list"></i>

                    </button>

                    <div>

                        <h1>
                            @yield('page-title', 'Tableau de bord')
                        </h1>

                        <p>
                            Gestion de votre portfolio
                        </p>

                    </div>

                </div>

            </div>


            <div class="admin-user">

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

        </header>


        <!-- CONTENU -->

        <div class="admin-content">

            @yield('content')

        </div>


    </main>

</div>


<script>

    const menuToggle =
        document.getElementById('menuToggle');

    const sidebar =
        document.getElementById('sidebar');

    if (menuToggle) {

        menuToggle.addEventListener('click', function () {

            sidebar.classList.toggle('open');

        });

    }

</script>


@stack('scripts')

</body>

</html>