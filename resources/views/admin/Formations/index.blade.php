@extends('layouts.admin')

@section('title', 'Gestion des formations | Administration')

@section('page-title', 'Formations')

@section('content')

<style>

/* =========================================================
   FORMATIONS
========================================================= */

.formations-header {
    margin-bottom: 25px;
}

.formations-header h2 {
    font-size: 27px;
    font-weight: 700;
    color: #17221b;
    margin: 0 0 7px;
}

.formations-header p {
    color: #718078;
    font-size: 14px;
    margin: 0;
}


/* =========================================================
   ACTION BAR
========================================================= */

.action-bar {
    background: #ffffff;
    border: 1px solid #e8eee9;
    border-radius: 18px;
    padding: 20px;
    margin-bottom: 25px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    box-shadow: 0 5px 20px rgba(0, 0, 0, .03);
}

.formation-count {
    color: #718078;
    font-size: 14px;
}

.formation-count strong {
    color: #17221b;
    font-size: 20px;
}


/* =========================================================
   BOUTON
========================================================= */

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
    text-decoration: none;

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


/* =========================================================
   MESSAGE DE SUCCÈS
========================================================= */

.alert-success {
    display: flex;
    align-items: center;
    gap: 10px;

    padding: 14px 18px;

    border-radius: 12px;

    margin-bottom: 25px;

    background: #ecfdf3;

    border: 1px solid #bbf7d0;

    color: #15803d;

    font-size: 14px;
}


/* =========================================================
   TABLE
========================================================= */

.table-card {
    background: #ffffff;

    border-radius: 18px;

    border: 1px solid #e8eee9;

    overflow: hidden;

    box-shadow:
        0 5px 20px rgba(0, 0, 0, .03);
}

.table-container {
    width: 100%;
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;

    min-width: 850px;
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
    padding: 17px 20px;

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


/* =========================================================
   FORMATION
========================================================= */

.formation-name {
    display: flex;
    align-items: center;
    gap: 13px;

    font-weight: 700;

    color: #17221b;
}

.formation-icon {
    width: 44px;
    height: 44px;

    min-width: 44px;

    border-radius: 11px;

    background: #ecfdf3;

    color: #16a34a;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 20px;
}

.formation-school {
    color: #34443a;
    font-weight: 600;
}

.formation-description {
    color: #718078;

    max-width: 320px;

    line-height: 1.5;

    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;

    overflow: hidden;
}


/* =========================================================
   DATES
========================================================= */

.date-badge {
    display: inline-flex;

    align-items: center;

    gap: 6px;

    padding: 7px 10px;

    border-radius: 8px;

    background: #f1f5f2;

    color: #53645a;

    font-size: 12px;

    font-weight: 600;

    white-space: nowrap;
}


/* =========================================================
   ACTIONS
========================================================= */

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

    text-decoration: none;
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


/* =========================================================
   EMPTY
========================================================= */

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


/* =========================================================
   RESPONSIVE
========================================================= */

@media(max-width: 700px) {

    .action-bar {
        flex-direction: column;

        align-items: flex-start;

        gap: 15px;
    }

    .btn-primary {
        width: 100%;
    }

}

</style>

<!-- =========================================================
     EN-TÊTE
========================================================= -->

<div class="formations-header">

```
<h2>
    Mes formations
</h2>

<p>
    Gérez les formations présentées sur votre portfolio.
</p>
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
     BARRE D'ACTION
========================================================= -->

<div class="action-bar">

```
<div class="formation-count">

    <strong>
        {{ $formations->count() }}
    </strong>

    formation(s) enregistrée(s)

</div>


<a
    href="{{ route('admin.formations.create') }}"
    class="btn btn-primary">

    <i class="bi bi-plus-lg"></i>

    Ajouter une formation

</a>
```

</div>

<!-- =========================================================
     TABLEAU
========================================================= -->

<div class="table-card">

```
@if($formations->count())

    <div class="table-container">

        <table>

            <thead>

                <tr>

                    <th>
                        Diplôme
                    </th>

                    <th>
                        Établissement
                    </th>

                    <th>
                        Description
                    </th>

                    <th>
                        Période
                    </th>

                    <th>
                        Actions
                    </th>

                </tr>

            </thead>


            <tbody>

                @foreach($formations as $formation)

                    <tr>

                        <!-- =================================================
                             DIPLÔME
                        ================================================== -->

                        <td>

                            <div class="formation-name">

                                <div class="formation-icon">

                                    <i class="bi bi-mortarboard-fill"></i>

                                </div>

                                <span>

                                    {{ $formation->diplome }}

                                </span>

                            </div>

                        </td>


                        <!-- =================================================
                             ÉTABLISSEMENT
                        ================================================== -->

                        <td>

                            <span class="formation-school">

                                {{ $formation->etablissement }}

                            </span>

                        </td>


                        <!-- =================================================
                             DESCRIPTION
                        ================================================== -->

                        <td>

                            @if($formation->description)

                                <div class="formation-description">

                                    {{ $formation->description }}

                                </div>

                            @else

                                <span style="color:#9aa69f;">
                                    —
                                </span>

                            @endif

                        </td>


                        <!-- =================================================
                             PÉRIODE
                        ================================================== -->

                        <td>

                            <span class="date-badge">

                                <i class="bi bi-calendar3"></i>

                                @if($formation->date_debut)

                                    {{ $formation->date_debut->format('Y') }}

                                @else

                                    ?

                                @endif


                                –


                                @if($formation->date_fin)

                                    {{ $formation->date_fin->format('Y') }}

                                @else

                                    Aujourd'hui

                                @endif

                            </span>

                        </td>


                        <!-- =================================================
                             ACTIONS
                        ================================================== -->

                        <td>

                            <div class="actions">


                                <!-- MODIFIER -->

                                <a
                                    href="{{ route('admin.formations.edit', $formation) }}"
                                    class="action-btn edit"
                                    title="Modifier">

                                    <i class="bi bi-pencil"></i>

                                </a>


                                <!-- SUPPRIMER -->

                                <form
                                    action="{{ route('admin.formations.destroy', $formation) }}"
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

    <!-- =====================================================
         AUCUNE FORMATION
    ====================================================== -->

    <div class="empty">

        <i class="bi bi-mortarboard"></i>

        <h3>
            Aucune formation
        </h3>

        <p>
            Vous n'avez pas encore ajouté de formation.
        </p>

        <br>

        <a
            href="{{ route('admin.formations.create') }}"
            class="btn btn-primary">

            <i class="bi bi-plus-lg"></i>

            Ajouter ma première formation

        </a>

    </div>

@endif
```

</div>

<!-- =========================================================
     JAVASCRIPT
========================================================= -->

<script>

document.addEventListener("DOMContentLoaded", function () {

    const deleteForms =
        document.querySelectorAll(".delete-form");


    deleteForms.forEach(function (form) {

        form.addEventListener("submit", function (event) {

            const confirmation = confirm(
                "Voulez-vous vraiment supprimer cette formation ?"
            );

            if (!confirmation) {

                event.preventDefault();

            }

        });

    });


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

@endsection
