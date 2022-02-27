@extends('listetudiants.layout')

@section('content')


<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
    <div class="container-fluid">
        <a class="navbar-brand" href="notetudiants">Note etudiants</a>

        <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="moyenne">Moyenne</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="autre">Autre</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="container">

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-5">Liste des notes d'étudiant </h3>

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="d-flex justify-content-end">
                    <a class="btn btn-primary" href="{{ route('notetudiants.create') }}"> Ajouter une novelle note </a>
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
                <th scope="col">Id étudiant</th>
                <th scope="col">Id matière</th>
                <th scope="col">Note</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($notes as $note)
                <tr>
                    <th scope="row">{{ $note->id }}</th>
                    <td>{{ $note->etudiant_id }}</td>
                    <td>{{ $note->matiere_id }}</td>
                    <td>{{ $note->note }}</td>
                    <td>
                        <form action="{{ route('notetudiants.destroy',$note->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('notetudiants.show',$note->id) }}">Voir</a>

                            <a class="btn btn-primary" href="{{ route('notetudiants.edit',$note->id) }}">Editer</a>

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
        {{ $notes->links() }}
    </div>


@endsection
