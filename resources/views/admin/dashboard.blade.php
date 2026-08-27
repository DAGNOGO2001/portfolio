@extends('layouts.admin')

@section('title', 'Tableau de bord | Administration')

@section('page-title', 'Tableau de bord')

@section('content')

<style>

/* =========================================================
   DASHBOARD GLOBAL
========================================================= */

.dashboard {
    width: 100%;
}

.dashboard-welcome {
    margin-bottom: 30px;
}

.dashboard-welcome h2 {
    font-size: 28px;
    font-weight: 800;
    color: #17221b;
    margin: 0 0 8px;
    letter-spacing: -0.5px;
}

.dashboard-welcome p {
    color: #7c8a82;
    font-size: 14px;
    margin: 0;
}


/* =========================================================
   STATISTIQUES
========================================================= */

.stats-grid {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    gap: 18px;
    margin-bottom: 30px;
}

.stat-link {
    text-decoration: none;
    color: inherit;
    display: block;
}

.stat-card {
    position: relative;
    background: #ffffff;
    border: 1px solid #e8eee9;
    border-radius: 18px;
    padding: 20px;
    min-height: 105px;

    display: flex;
    align-items: center;
    gap: 15px;

    box-shadow: 0 5px 20px rgba(0, 0, 0, .035);

    transition:
        transform .25s ease,
        box-shadow .25s ease,
        border-color .25s ease;
}

.stat-card::after {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    width: 0;
    height: 3px;
    background: #16a34a;
    border-radius: 0 5px 0 0;
    transition: width .25s ease;
}

.stat-link:hover .stat-card {
    transform: translateY(-5px);
    border-color: #bbf7d0;
    box-shadow: 0 15px 35px rgba(22, 163, 74, .10);
}

.stat-link:hover .stat-card::after {
    width: 100%;
}


/* =========================================================
   ICÔNE STAT
========================================================= */

.stat-icon {
    width: 53px;
    height: 53px;
    min-width: 53px;

    border-radius: 15px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #ecfdf3;
    color: #16a34a;

    font-size: 22px;

    transition: .25s ease;
}

.stat-link:hover .stat-icon {
    background: #16a34a;
    color: #ffffff;
    transform: scale(1.06) rotate(-3deg);
}


/* =========================================================
   INFOS STAT
========================================================= */

.stat-info span {
    display: block;
    color: #829087;
    font-size: 12px;
    margin-bottom: 6px;
}

.stat-info strong {
    display: block;
    color: #17221b;
    font-size: 25px;
    font-weight: 800;
    line-height: 1;
}


/* =========================================================
   CONTENU PRINCIPAL
========================================================= */

.dashboard-grid {
    display: grid;
    grid-template-columns: 1.45fr 1fr;
    gap: 25px;
}


/* =========================================================
   CARTES
========================================================= */

.dashboard-card {
    background: #ffffff;
    border: 1px solid #e8eee9;
    border-radius: 20px;
    overflow: hidden;

    box-shadow: 0 5px 20px rgba(0, 0, 0, .025);

    transition: .25s ease;
}

.dashboard-card:hover {
    box-shadow: 0 15px 35px rgba(0, 0, 0, .055);
}


/* =========================================================
   HEADER DES CARTES
========================================================= */

.dashboard-card-header {
    padding: 20px 22px;

    border-bottom: 1px solid #edf1ee;

    display: flex;
    align-items: center;
    justify-content: space-between;
}

.dashboard-card-header-left {
    display: flex;
    align-items: center;
    gap: 11px;
}

.dashboard-card-header-icon {
    width: 38px;
    height: 38px;

    border-radius: 11px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #ecfdf3;
    color: #16a34a;

    font-size: 17px;
}

.dashboard-card-header h3 {
    font-size: 17px;
    font-weight: 750;
    color: #17221b;
    margin: 0;
}


/* =========================================================
   CORPS
========================================================= */

.dashboard-card-body {
    padding: 22px;
}


/* =========================================================
   ACTIONS RAPIDES
========================================================= */

.quick-actions {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 13px;
}

.quick-action {
    position: relative;

    border: 1px solid #e7eee9;
    border-radius: 14px;

    padding: 17px;

    color: #26332b;
    text-decoration: none;

    background: #ffffff;

    display: block;

    transition: all .25s ease;
}

.quick-action:hover {
    border-color: #4ade80;
    background: #f0fdf4;

    transform: translateY(-3px);

    box-shadow: 0 10px 25px rgba(22, 163, 74, .08);
}

.quick-action i {
    width: 40px;
    height: 40px;

    border-radius: 11px;

    background: #ecfdf3;
    color: #16a34a;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 19px;

    margin-bottom: 12px;

    transition: .25s ease;
}

.quick-action:hover i {
    background: #16a34a;
    color: #ffffff;
    transform: scale(1.05);
}

.quick-action strong {
    display: block;

    font-size: 14px;
    font-weight: 700;

    color: #26332b;

    margin-bottom: 5px;
}

.quick-action span {
    display: block;

    color: #89958e;
    font-size: 12px;

    line-height: 1.5;
}


/* =========================================================
   PORTFOLIO
========================================================= */

.portfolio-description {
    color: #718078;
    line-height: 1.7;
    font-size: 14px;
    margin: 0 0 20px;
}

.portfolio-link {
    position: relative;

    border: 1px solid #e7eee9;
    border-radius: 15px;

    padding: 20px;

    color: #26332b;
    text-decoration: none;

    display: block;

    background: #ffffff;

    transition: all .25s ease;
}

.portfolio-link:hover {
    border-color: #4ade80;
    background: #f0fdf4;

    transform: translateY(-3px);

    box-shadow: 0 10px 25px rgba(22, 163, 74, .08);
}

.portfolio-link-icon {
    width: 46px;
    height: 46px;

    border-radius: 12px;

    background: #ecfdf3;
    color: #16a34a;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 21px;

    margin-bottom: 14px;

    transition: .25s ease;
}

.portfolio-link:hover .portfolio-link-icon {
    background: #16a34a;
    color: #ffffff;
}

.portfolio-link strong {
    display: block;

    font-size: 15px;
    font-weight: 700;

    color: #26332b;

    margin-bottom: 5px;
}

.portfolio-link span:not(.link-arrow) {
    color: #89958e;
    font-size: 12px;
}

.link-arrow {
    position: absolute;

    top: 20px;
    right: 20px;

    color: #16a34a;

    font-size: 18px;

    transition: .25s ease;
}

.portfolio-link:hover .link-arrow {
    transform: translate(4px, -4px);
}


/* =========================================================
   BOUTON VOIR TOUT
========================================================= */

.view-all {
    color: #16a34a;
    font-size: 12px;
    font-weight: 700;

    text-decoration: none;

    transition: .2s ease;
}

.view-all:hover {
    color: #15803d;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media(max-width: 1400px) {

    .stats-grid {
        grid-template-columns: repeat(3, 1fr);
    }

}

@media(max-width: 1050px) {

    .dashboard-grid {
        grid-template-columns: 1fr;
    }

}

@media(max-width: 750px) {

    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .quick-actions {
        grid-template-columns: 1fr;
    }

    .dashboard-welcome h2 {
        font-size: 24px;
    }

}

@media(max-width: 500px) {

    .stats-grid {
        grid-template-columns: 1fr;
    }

    .dashboard-card-body {
        padding: 16px;
    }

    .dashboard-card-header {
        padding: 17px;
    }

    .stat-card {
        padding: 18px;
    }

}

</style>


<div class="dashboard">


    <!-- =====================================================
         BIENVENUE
    ====================================================== -->

    <div class="dashboard-welcome">

        <h2>
            Bonjour, {{ auth()->user()->name }} 👋
        </h2>

        <p>
            Bienvenue dans votre espace d'administration.
            Gérez facilement votre portfolio depuis cette interface.
        </p>

    </div>


    <!-- =====================================================
         STATISTIQUES
    ====================================================== -->

    <div class="stats-grid">


        <!-- =================================================
             PROJETS
        ================================================== -->

        <a href="{{ route('admin.projets.index') }}"
           class="stat-link">

            <div class="stat-card">

                <div class="stat-icon">
                    <i class="bi bi-folder-fill"></i>
                </div>

                <div class="stat-info">

                    <span>
                        Projets
                    </span>

                    <strong>
                        {{ \App\Models\Projet::count() }}
                    </strong>

                </div>

            </div>

        </a>


        <!-- =================================================
             COMPÉTENCES
        ================================================== -->

        <a href="{{ route('admin.competences.index') }}"
           class="stat-link">

            <div class="stat-card">

                <div class="stat-icon">
                    <i class="bi bi-code-slash"></i>
                </div>

                <div class="stat-info">

                    <span>
                        Compétences
                    </span>

                    <strong>
                        {{ \App\Models\Competence::count() }}
                    </strong>

                </div>

            </div>

        </a>


        <!-- =================================================
             EXPÉRIENCES
        ================================================== -->

        <a href="{{ route('admin.experiences.index') }}"
           class="stat-link">

            <div class="stat-card">

                <div class="stat-icon">
                    <i class="bi bi-briefcase-fill"></i>
                </div>

                <div class="stat-info">

                    <span>
                        Expériences
                    </span>

                    <strong>
                        {{ \App\Models\Experience::count() }}
                    </strong>

                </div>

            </div>

        </a>


        <!-- =================================================
             FORMATIONS
        ================================================== -->

        <a href="{{ route('admin.formations.index') }}"
           class="stat-link">

            <div class="stat-card">

                <div class="stat-icon">
                    <i class="bi bi-mortarboard-fill"></i>
                </div>

                <div class="stat-info">

                    <span>
                        Formations
                    </span>

                    <strong>
                        {{ \App\Models\Formation::count() }}
                    </strong>

                </div>

            </div>

        </a>


        <!-- =================================================
             CERTIFICATIONS
        ================================================== -->

        <a href="{{ route('admin.certifications.index') }}"
           class="stat-link">

            <div class="stat-card">

                <div class="stat-icon">
                    <i class="bi bi-award-fill"></i>
                </div>

                <div class="stat-info">

                    <span>
                        Certifications
                    </span>

                    <strong>
                        {{ \App\Models\Certification::count() }}
                    </strong>

                </div>

            </div>

        </a>


        <!-- =================================================
             SERVICES
        ================================================== -->

        <a href="{{ route('admin.services.index') }}"
           class="stat-link">

            <div class="stat-card">

                <div class="stat-icon">
                    <i class="bi bi-grid-fill"></i>
                </div>

                <div class="stat-info">

                    <span>
                        Services
                    </span>

                    <strong>
                        {{ \App\Models\Service::count() }}
                    </strong>

                </div>

            </div>

        </a>


        <!-- =================================================
             PARAMÈTRES
        ================================================== -->

        <a href="{{ route('admin.parametres.edit') }}"
           class="stat-link">

            <div class="stat-card">

                <div class="stat-icon">
                    <i class="bi bi-person-gear"></i>
                </div>

                <div class="stat-info">

                    <span>
                        Paramètres
                    </span>

                    <strong>
                        <i class="bi bi-gear"></i>
                    </strong>

                </div>

            </div>

        </a>


    </div>


    <!-- =====================================================
         CONTENU PRINCIPAL
    ====================================================== -->

    <div class="dashboard-grid">


        <!-- =================================================
             ACTIONS RAPIDES
        ================================================== -->

        <div class="dashboard-card">

            <div class="dashboard-card-header">

                <div class="dashboard-card-header-left">

                    <div class="dashboard-card-header-icon">
                        <i class="bi bi-lightning-charge-fill"></i>
                    </div>

                    <h3>
                        Actions rapides
                    </h3>

                </div>

            </div>


            <div class="dashboard-card-body">

                <div class="quick-actions">


                    <!-- =================================================
                         PROJET
                    ================================================== -->

                    <a href="{{ route('admin.projets.create') }}"
                       class="quick-action">

                        <i class="bi bi-plus-circle"></i>

                        <strong>
                            Ajouter un projet
                        </strong>

                        <span>
                            Créer une nouvelle réalisation
                        </span>

                    </a>


                    <!-- =================================================
                         COMPÉTENCE
                    ================================================== -->

                    <a href="{{ route('admin.competences.create') }}"
                       class="quick-action">

                        <i class="bi bi-code-square"></i>

                        <strong>
                            Ajouter une compétence
                        </strong>

                        <span>
                            Ajouter une technologie à votre profil
                        </span>

                    </a>


                    <!-- =================================================
                         EXPÉRIENCE
                    ================================================== -->

                    <a href="{{ route('admin.experiences.create') }}"
                       class="quick-action">

                        <i class="bi bi-briefcase"></i>

                        <strong>
                            Ajouter une expérience
                        </strong>

                        <span>
                            Ajouter une expérience professionnelle
                        </span>

                    </a>


                    <!-- =================================================
                         FORMATION
                    ================================================== -->

                    <a href="{{ route('admin.formations.create') }}"
                       class="quick-action">

                        <i class="bi bi-mortarboard"></i>

                        <strong>
                            Ajouter une formation
                        </strong>

                        <span>
                            Ajouter une formation académique
                        </span>

                    </a>


                    <!-- =================================================
                         CERTIFICATION
                    ================================================== -->

                    <a href="{{ route('admin.certifications.create') }}"
                       class="quick-action">

                        <i class="bi bi-award"></i>

                        <strong>
                            Ajouter une certification
                        </strong>

                        <span>
                            Ajouter une attestation ou un certificat
                        </span>

                    </a>


                    <!-- =================================================
                         GÉRER CERTIFICATIONS
                    ================================================== -->

                    <a href="{{ route('admin.certifications.index') }}"
                       class="quick-action">

                        <i class="bi bi-folder2-open"></i>

                        <strong>
                            Gérer mes certifications
                        </strong>

                        <span>
                            Voir, modifier ou supprimer vos certifications
                        </span>

                    </a>


                    <!-- =================================================
                         SERVICE
                    ================================================== -->

                    <a href="{{ route('admin.services.create') }}"
                       class="quick-action">

                        <i class="bi bi-grid"></i>

                        <strong>
                            Ajouter un service
                        </strong>

                        <span>
                            Ajouter un service proposé
                        </span>

                    </a>


                    <!-- =================================================
                         GÉRER SERVICES
                    ================================================== -->

                    <a href="{{ route('admin.services.index') }}"
                       class="quick-action">

                        <i class="bi bi-gear"></i>

                        <strong>
                            Gérer mes services
                        </strong>

                        <span>
                            Voir, modifier ou supprimer vos services
                        </span>

                    </a>


                    <!-- =================================================
                         PARAMÈTRES DU PORTFOLIO
                    ================================================== -->

                    <a href="{{ route('admin.parametres.edit') }}"
                       class="quick-action">

                        <i class="bi bi-person-gear"></i>

                        <strong>
                            Paramètres du portfolio
                        </strong>

                        <span>
                            Modifier la photo, l'e-mail, le CV et les informations publiques
                        </span>

                    </a>


                </div>

            </div>

        </div>


        <!-- =================================================
             MON PORTFOLIO
        ================================================== -->

        <div class="dashboard-card">

            <div class="dashboard-card-header">

                <div class="dashboard-card-header-left">

                    <div class="dashboard-card-header-icon">
                        <i class="bi bi-globe2"></i>
                    </div>

                    <h3>
                        Mon portfolio
                    </h3>

                </div>

                <a href="{{ route('home') }}"
                   target="_blank"
                   class="view-all">

                    Voir le site

                </a>

            </div>


            <div class="dashboard-card-body">

                <p class="portfolio-description">

                    Depuis cet espace, vous pouvez gérer
                    les informations affichées sur votre
                    portfolio public.

                </p>


                <!-- =================================================
                     PARAMÈTRES
                ================================================== -->

                <a href="{{ route('admin.parametres.edit') }}"
                   class="portfolio-link"
                   style="margin-bottom: 15px;">

                    <span class="link-arrow">

                        <i class="bi bi-arrow-right"></i>

                    </span>

                    <div class="portfolio-link-icon">

                        <i class="bi bi-person-gear"></i>

                    </div>

                    <strong>
                        Paramètres du portfolio
                    </strong>

                    <span>
                        Photo, e-mail professionnel, CV et informations publiques
                    </span>

                </a>


                <!-- =================================================
                     SITE PUBLIC
                ================================================== -->

                <a href="{{ route('home') }}"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="portfolio-link">

                    <span class="link-arrow">

                        <i class="bi bi-arrow-up-right"></i>

                    </span>


                    <div class="portfolio-link-icon">

                        <i class="bi bi-globe2"></i>

                    </div>


                    <strong>
                        Voir mon portfolio
                    </strong>


                    <span>
                        Ouvrir le site public dans un nouvel onglet
                    </span>

                </a>


                <!-- =================================================
                     CERTIFICATIONS
                ================================================== -->

                <a href="{{ route('admin.certifications.index') }}"
                   class="portfolio-link"
                   style="margin-top: 15px;">

                    <span class="link-arrow">

                        <i class="bi bi-arrow-right"></i>

                    </span>

                    <div class="portfolio-link-icon">

                        <i class="bi bi-award-fill"></i>

                    </div>

                    <strong>
                        Mes certifications
                    </strong>

                    <span>
                        Consulter mes certificats, attestations et permis
                    </span>

                </a>


            </div>

        </div>


    </div>


</div>

@endsection