@extends('listetudiants.layout')

@section('content')


<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
    <div class="container-fluid">
        <a class="navbar-brand" href="matieretudiants"> Matière </a>

        <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="listetudiants">Liste étudiants</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="container">

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-5"> Matiere </h3>

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="d-flex justify-content-end">
                    <a class="btn btn-primary" href="{{ route('matieretudiants.create') }}"> Ajouter une matière</a>
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
                <th scope="col">Matières</th>
                <th scope="col">Coefficient</th>
                <th scope="col">Action</th>
            </tr>

            </thead>
            <tbody>

            @foreach ($matieres as $matiere)
                <tr>
                    <th scope="row">{{ $matiere->id }}</th>
                    <td>{{ $matiere->matiere }}</td>
                    <td>{{ $matiere->coef }}</td>
                    <td>
                        <form action="{{ route('matieretudiants.destroy',$matiere->id) }}" method="POST">
                           
                            <a class="btn btn-primary" href="{{ route('matieretudiants.edit',$matiere->id) }}">Editer</a>

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
        {{ $matieres->links() }}
    </div>


@endsection
