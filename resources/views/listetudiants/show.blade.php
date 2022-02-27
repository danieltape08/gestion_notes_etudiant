@extends('listetudiants.layout')

@section('content')

    <div class="row">
        <div class="container-fluid">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Vue étudiant </h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-info" href="{{ route('listetudiants.index') }}"> Retour </a>
                </div>
            </div>
        </div>
    </div>



        <header class="card-header">

            @csrf
                 
            
               @foreach ($etudiants as $etudiant)
    

                        <p class="card-header-title">Id : {{ $etudiant->id }}</p>

                                        <p> Nom : {{ $etudiant->nom }}</p>

                                        <p> Prénoms : {{ $etudiant->prenom }}</p>

                                        <p> Sexe : {{ $etudiant->sexe }}</p>

                                        <p> Classe : {{ $etudiant->classe_id }}</p>

                @endforeach    

        </header>
               



@endsection

