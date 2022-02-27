@extends('listetudiants.layout')

@section('content')


<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
    <div class="container-fluid">
        <a class="navbar-brand" href="listetudiants">Liste etudiants</a>

        <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="notetudiants">Note</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Moyenne</a>
                </li>
            </ul>

            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="..." aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Rechercher</button>
            </form>

        </div>
    </div>
</nav>

<main class="container">

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-5">Liste des étudiants </h3>

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="d-flex justify-content-end">
                    <a class="btn btn-primary" href="{{ route('listetudiants.create') }}"> Ajouter un etudiant </a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered table-hover mt-2">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénoms</th>
                <th scope="col">Sexe</th>
                <th scope="col">Classe</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($etudiants as $etudiant)
                <tr>
                    <th scope="row">{{ $etudiant->id }}</th>
                    <td>{{ $etudiant->nom }}</td>
                    <td>{{ $etudiant->prenom }}</td>
                    <td>{{ $etudiant->sexe }}</td>
                    <td>{{ $etudiant->classe_id }}</td>
                    
                    <td>
                        <form action="{{ route('listetudiants.destroy',$etudiant->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('listetudiants.show',$etudiant->id) }}">Voir</a>

                            <a class="btn btn-primary" href="{{ route('listetudiants.edit',$etudiant->id) }}">Editer</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger"> Supprimer </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="container">
        {{ $etudiants->links() }}
    </div>


@endsection
