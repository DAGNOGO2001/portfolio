@extends('layouts.admin')

@section('title', 'Services | Administration')

@section('page-title', 'Gestion des services')

@section('content')

<style>

/* =========================================================
   EN-TÊTE
========================================================= */

.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    gap: 15px;
}

.page-header-text h2 {
    margin: 0 0 6px;
    font-size: 26px;
    font-weight: 700;
    color: #17221b;
}

.page-header-text p {
    margin: 0;
    color: #7c8a82;
    font-size: 14px;
}


/* =========================================================
   BOUTON AJOUTER
========================================================= */

.btn-add {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #16a34a;
    color: white;
    padding: 11px 18px;
    border-radius: 11px;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
    transition: .25s;
    border: none;
}

.btn-add:hover {
    background: #15803d;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(22, 163, 74, .18);
}


/* =========================================================
   MESSAGE SUCCÈS
========================================================= */

.alert-success {
    background: #ecfdf3;
    border: 1px solid #bbf7d0;
    color: #166534;
    padding: 13px 16px;
    border-radius: 11px;
    margin-bottom: 20px;
    font-size: 14px;
}


/* =========================================================
   CARTE PRINCIPALE
========================================================= */

.services-card {
    background: #ffffff;
    border: 1px solid #e8eee9;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0, 0, 0, .03);
}


/* =========================================================
   TABLEAU
========================================================= */

.table-wrapper {
    width: 100%;
    overflow-x: auto;
}

.services-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 750px;
}

.services-table thead {
    background: #f8faf9;
}

.services-table th {
    padding: 16px 18px;
    text-align: left;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: .5px;
    color: #718078;
    font-weight: 700;
    border-bottom: 1px solid #e8eee9;
}

.services-table td {
    padding: 17px 18px;
    border-bottom: 1px solid #edf1ee;
    vertical-align: middle;
    color: #26332b;
    font-size: 14px;
}

.services-table tbody tr {
    transition: .2s;
}

.services-table tbody tr:hover {
    background: #fafffb;
}

.services-table tbody tr:last-child td {
    border-bottom: none;
}


/* =========================================================
   ICÔNE
========================================================= */

.service-icon {
    width: 45px;
    height: 45px;
    border-radius: 12px;
    background: #ecfdf3;
    color: #16a34a;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
}

.icon-code {
    font-size: 12px;
    color: #16a34a;
    background: #f0fdf4;
    border: 1px solid #bbf7d0;
    padding: 5px 9px;
    border-radius: 7px;
}


/* =========================================================
   TITRE
========================================================= */

.service-title {
    font-weight: 700;
    color: #17221b;
    margin-bottom: 4px;
}

.service-description {
    color: #7c8a82;
    font-size: 13px;
    line-height: 1.5;
    max-width: 400px;
}


/* =========================================================
   ACTIONS
========================================================= */

.actions {
    display: flex;
    align-items: center;
    gap: 7px;
}

.action-btn {
    width: 36px;
    height: 36px;
    border-radius: 9px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    border: none;
    cursor: pointer;
    transition: .2s;
    font-size: 15px;
}

.btn-edit {
    background: #eff6ff;
    color: #2563eb;
}

.btn-edit:hover {
    background: #2563eb;
    color: white;
}

.btn-delete {
    background: #fef2f2;
    color: #dc2626;
}

.btn-delete:hover {
    background: #dc2626;
    color: white;
}


/* =========================================================
   AUCUN SERVICE
========================================================= */

.empty-state {
    text-align: center;
    padding: 60px 20px;
}

.empty-icon {
    width: 65px;
    height: 65px;
    border-radius: 18px;
    background: #ecfdf3;
    color: #16a34a;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 15px;
    font-size: 28px;
}

.empty-state h3 {
    margin: 0 0 7px;
    color: #26332b;
    font-size: 18px;
}

.empty-state p {
    margin: 0 0 20px;
    color: #89958e;
    font-size: 13px;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media(max-width: 700px) {

    .page-header {
        flex-direction: column;
        align-items: flex-start;
    }

    .btn-add {
        width: 100%;
        justify-content: center;
    }

}

</style>

<!-- =========================================================
     EN-TÊTE
========================================================= -->

<div class="page-header">

```
<div class="page-header-text">

    <h2>
        Mes services
    </h2>

    <p>
        Gérez les services présentés sur votre portfolio.
    </p>

</div>


<a href="{{ route('admin.services.create') }}"
   class="btn-add">

    <i class="bi bi-plus-circle"></i>

    Ajouter un service

</a>
```

</div>

<!-- =========================================================
     MESSAGE DE SUCCÈS
========================================================= -->

@if(session('success'))

```
<div class="alert-success">

    <i class="bi bi-check-circle-fill"></i>

    {{ session('success') }}

</div>
```

@endif

<!-- =========================================================
     LISTE DES SERVICES
========================================================= -->

<div class="services-card">

```
@if($services->count() > 0)

    <div class="table-wrapper">

        <table class="services-table">

            <thead>

                <tr>

                    <th>
                        Icône
                    </th>

                    <th>
                        Service
                    </th>

                    <th>
                        Description
                    </th>

                    <th>
                        Code icône
                    </th>

                    <th>
                        Actions
                    </th>

                </tr>

            </thead>


            <tbody>

                @foreach($services as $service)

                    <tr>

                        <!-- =================================================
                             ICÔNE
                        ================================================== -->

                        <td>

                            <div class="service-icon">

                                @if($service->icone)

                                    <i class="{{ $service->icone }}"></i>

                                @else

                                    <i class="bi bi-tools"></i>

                                @endif

                            </div>

                        </td>


                        <!-- =================================================
                             TITRE
                        ================================================== -->

                        <td>

                            <div class="service-title">

                                {{ $service->titre }}

                            </div>

                        </td>


                        <!-- =================================================
                             DESCRIPTION
                        ================================================== -->

                        <td>

                            <div class="service-description">

                                {{ Str::limit($service->description, 100) }}

                            </div>

                        </td>


                        <!-- =================================================
                             ICÔNE EN TEXTE
                        ================================================== -->

                        <td>

                            @if($service->icone)

                                <span class="icon-code">

                                    {{ $service->icone }}

                                </span>

                            @else

                                <span class="icon-code">

                                    Aucune

                                </span>

                            @endif

                        </td>


                        <!-- =================================================
                             ACTIONS
                        ================================================== -->

                        <td>

                            <div class="actions">


                                <!-- MODIFIER -->

                                <a href="{{ route('admin.services.edit', $service->id) }}"
                                   class="action-btn btn-edit"
                                   title="Modifier">

                                    <i class="bi bi-pencil-fill"></i>

                                </a>


                                <!-- SUPPRIMER -->

                                <form action="{{ route('admin.services.destroy', $service->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Voulez-vous vraiment supprimer ce service ?');">

                                    @csrf

                                    @method('DELETE')

                                    <button type="submit"
                                            class="action-btn btn-delete"
                                            title="Supprimer">

                                        <i class="bi bi-trash-fill"></i>

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


    <!-- =====================================================
         AUCUN SERVICE
    ====================================================== -->

    <div class="empty-state">

        <div class="empty-icon">

            <i class="bi bi-briefcase-fill"></i>

        </div>

        <h3>
            Aucun service
        </h3>

        <p>
            Vous n'avez pas encore ajouté de service à votre portfolio.
        </p>

        <a href="{{ route('admin.services.create') }}"
           class="btn-add">

            <i class="bi bi-plus-circle"></i>

            Ajouter mon premier service

        </a>

    </div>

@endif
```

</div>

@endsection
